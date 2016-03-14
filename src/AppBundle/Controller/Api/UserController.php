<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/user/{userId}/friends")
     *        name = "api_user_friend_list",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        default = {"_format" = "json"})
     * @Method({"GET"})
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
     * @Route("/user/{userId}/friend/{friendId}/add")
     *        name = "api_user_add_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        default = {"_format" = "json"})
     * @Method({"PUT"})
     *
     * @return JsonResponse
     */
    public function addFriendAction($userId, $friendId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => '14232424', 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/friend/{friendId}/cancel")
     *        name = "api_user_cancel_friend",
     *        requirements = {"userId" = "\d+", "friendId" = "\d+", "_format" = "json"},
     *        default = {"_format" = "json"})
     * @Method({"PUT"})
     *
     * @return JsonResponse
     */
    public function cancelFriendAction($userId, $friendId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => '13131312', 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }
}
