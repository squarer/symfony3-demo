<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Entity\CollectUser;


class CollectUserController extends Controller
{
    /**
     * @Route("/user/{userId}/collect/{collectUserId}",
     *        name = "api_collect",
     *        requirements = {"userId" = "\d+", "collectUserId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  section="Collect User",
     *  description="收藏 (人)",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="collectUserId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="收藏會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function collectAction($userId, $collectUserId)
    {
        if ($userId == $collectUserId) {
            throw new \InvalidArgumentException('Invalid argument');
        }

        $em = $this->getEntityManager();
        $collectUser = $em->find('AppBundle:CollectUser',
            ['userId' => $userId, 'collectUserId' => $collectUserId]);

        if (!$collectUser) {
            $collectUser = new collectUser($userId, $collectUserId);
            $em->persist($collectUser);
        }

        if (!$collectUser->getIsValid()) {
            $collectUser->setIsValid(true)
                ->setModifiedTime(new \DateTime())
                ->setLastestEditor($userId);
        }

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $collectUser->getCollectUserId(),
                'modified_time' => $collectUser->getModifiedTime()
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/collect/{collectUserId}",
     *        name = "api_uncollect",
     *        requirements = {"userId" = "\d+", "collectUserId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *  section="Collect User",
     *  description="取消收藏 (人)",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="collectUserId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="取消收藏會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function unCollectAction($userId, $collectUserId)
    {
        $em = $this->getEntityManager();
        $collectUser = $em->find('AppBundle:CollectUser',
            ['userId' => $userId, 'collectUserId' => $collectUserId]);

        if (!$collectUser) {
            throw new \RuntimeException('No relation found');
        }

        if ($collectUser->getIsValid()) {
            $collectUser->setIsValid(false)
                ->setModifiedTime(new \DateTime())
                ->setLastestEditor($userId);
        }

        $em->flush();

        $output = [
            'result' => 'ok',
            'data' => [
                'user_id' => $collectUser->getCollectUserId(),
                'modified_time' => $collectUser->getModifiedTime()
            ]
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
