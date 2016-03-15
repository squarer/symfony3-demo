<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\Follow;


class FollowController extends Controller
{

    /**
     * @Route("/user/{userId}/followed",
     *        name = "api_followed_list",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="取得魅客列表",
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
    public function followedListAction($userId)
    {
        $em = $this->getEntityManager();
        $list = $em->getRepository('AppBundle:Follow')->getFollowed($userId);

        $output = [
            'result' => 'ok',
            'data' => $list
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/fans",
     *        name = "api_fan_list",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="取得魅粉列表",
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
    public function fanListAction($userId)
    {
        $em = $this->getEntityManager();
        $list = $em->getRepository('AppBundle:Follow')->getFans($userId);

        $output = [
            'result' => 'ok',
            'data' => $list
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/follow/{followedId}",
     *        name = "api_follow",
     *        requirements = {"userId" = "\d+", "followedId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="關注",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="followedId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="關注會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function followAction($userId, $followedId)
    {
        if ($userId == $followedId) {
            throw new \InvalidArgumentException('Invalid argument');
        }

        $em = $this->getEntityManager();
        $follow = $em->find('AppBundle:Follow',
            ['followerId' => $userId, 'followedId' => $followedId]);

        if (!$follow) {
            $follow = new Follow($userId, $followedId);
            $em->persist($follow);
        }

        if (!$follow->getIsValid()) {
            $follow->setIsValid(true)
                ->setModifiedTime(new \DateTime())
                ->setLastestEditor($userId);
        }

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $follow->getFollowedId(),
                'modified_time' => $follow->getModifiedTime()
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/follow/{followedId}",
     *        name = "api_unfollow",
     *        requirements = {"userId" = "\d+", "followedId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="取消關注",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="followedId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="取消關注會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function unFollowAction($userId, $followedId)
    {
        $em = $this->getEntityManager();
        $follow = $em->find('AppBundle:Follow',
            ['followerId' => $userId, 'followedId' => $followedId]);

        if (!$follow) {
            throw new \RuntimeException('No relation found');
        }

        if ($follow->getIsValid()) {
            $follow->setIsValid(false)
                ->setModifiedTime(new \DateTime())
                ->setLastestEditor($userId);
        }

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $follow->getFollowedId(),
                'modified_time' => $follow->getModifiedTime()
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/followed_count",
     *        name = "api_followed_count",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="取得魅客數量",
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
    public function countFollowedAction($userId)
    {
        $em = $this->getEntityManager();
        $count = $em->getRepository('AppBundle:Follow')->countFollowed($userId);

        $output = [
            'result' => 'ok',
            'data' => ['count' => $count]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/fans_count",
     *        name = "api_fans_count",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Follow",
     *  description="取得魅粉數量",
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
    public function countFanAction($userId)
    {
        $em = $this->getEntityManager();
        $count = $em->getRepository('AppBundle:Follow')->countFans($userId);

        $output = [
            'result' => 'ok',
            'data' => ['count' => $count]
        ];

        return new JsonResponse($output);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}
