<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Friends;


class FriendsController extends Controller
{

    /**
     * @Route("/user/{userId}/friends",
     *        name = "api_friend_list",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="取得魅友列表",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="要操作的會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function friendListAction($userId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => '12345678', 'modified_time' => '2016-03-01 12:00:00'],
                ['user_id' => '13131312', 'modified_time' => '2016-03-02 12:00:00'],
                ['user_id' => '14232424', 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/friends/{friendId}",
     *        name = "api_invite_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="邀請加魅友",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="friendId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="魅友編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function inviteAction($userId, $friendId)
    {
        if ($userId == $friendId) {
            throw new \InvalidArgumentException('Invalid argument');
        }

        $userOneId = $this->getUserId($userId, $friendId);
        $userTwoId = $this->getUserId($userId, $friendId, false);

        $em = $this->getEntityManager();
        $friends = $em->find('AppBundle:Friends',
            ['userOneId' => $userOneId, 'userTwoId' => $userTwoId]);

        if (!$friends) {
            $friends = new friends($userOneId, $userTwoId, $userId);
            $em->persist($friends);
        }

        if ($friends->getStatus() === Friends::STATUS_PENDING) {
            throw new \RuntimeException('Request User have been invited');
        }

        if ($friends->getStatus() == Friends::STATUS_ACCEPTED) {
            throw new \RuntimeException('Being friends already');
        }

        $friends->setStatus(Friends::STATUS_PENDING)
            ->setModifiedTime(new \DateTime())
            ->setLastestEditor($userId);

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $friendId,
                'modified_time' => $friends->getModifiedTime()
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/friends/{friendId}",
     *        name = "api_accept_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"PUT"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="接受加魅友",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="friendId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="魅友編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function acceptAction($userId, $friendId)
    {
        if ($userId == $friendId) {
            throw new \InvalidArgumentException('Invalid argument');
        }

        $userOneId = $this->getUserId($userId, $friendId);
        $userTwoId = $this->getUserId($userId, $friendId, false);

        $em = $this->getEntityManager();
        $friends = $em->getRepository('AppBundle:Friends')->findOneBy([
            'userOneId' => $userOneId,
            'userTwoId' => $userTwoId,
            'status' => Friends::STATUS_PENDING
        ]);

        if (!$friends) {
            throw new \RuntimeException('No invitation found');
        }

        $friends->setStatus(Friends::STATUS_ACCEPTED)
            ->setActionUserId($userId)
            ->setLastestEditor($userId)
            ->setModifiedTime(new \DateTime());

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $friendId,
                'modified_time' => $friends->getModifiedTime()
            ]
        ];

        return new JsonResponse($output);

    }

    /**
     * @Route("/user/{userId}/friends_count",
     *        name = "api_friend_count",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="取得魅友數量",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function countFriendAction($userId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['count' => 20]
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * get user one/two id
     */
    private function getUserId($user1, $user2, $one = true)
    {
        if ($one) {
            return $user1 < $user2 ? $user1 : $user2;
        }

        return $user1 > $user2 ? $user1 : $user2;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}
