<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FollowerController extends Controller
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
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $followedId, 'modified_time' => '2016-03-03 12:00:00']
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
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $followedId, 'modified_time' => '2016-03-03 12:00:00']
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
        $output = [
            'result' => 'ok',
            'data' => [
                ['count' => 20]
            ]
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
        $output = [
            'result' => 'ok',
            'data' => [
                ['count' => 20]
            ]
        ];

        return new JsonResponse($output);
    }
}
