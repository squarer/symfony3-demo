<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FriendController extends Controller
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
     *        name = "api_add_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="加魅友",
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
    public function addFriendAction($userId, $friendId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $friendId, 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/friends/{friendId}",
     *        name = "api_cancel_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *  section="Friends",
     *  description="移除魅友",
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
    public function cancelFriendAction($userId, $friendId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $friendId, 'modified_time' => '2016-03-03 12:00:00']
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
}
