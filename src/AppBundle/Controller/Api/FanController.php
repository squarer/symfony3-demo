<?php

namespace AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class FanController extends Controller
{

    /**
     * @Route("/user/{userId}/fans",
     *        name = "api_fan_list",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Fans",
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
     * @Route("/user/{userId}/collect/{fanId}",
     *        name = "api_collect",
     *        requirements = {"userId" = "\d+", "fanId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  section="Fans",
     *  description="收藏",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="fanId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="收藏會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function collectAction($userId, $fanId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $fanId, 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/collect/{fanId}",
     *        name = "api_uncollect",
     *        requirements = {"userId" = "\d+", "fanId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *  section="Fans",
     *  description="取消收藏",
     *  requirements={
     *      {
     *          "name"="userId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="會員編號"
     *      },
     *      {
     *          "name"="fanId",
     *          "dataType"="integer",
     *          "requirement"="\d+",
     *          "description"="取消收藏會員編號"
     *      }
     *  })
     *
     * @return JsonResponse
     */
    public function unCollectAction($userId, $fanId)
    {
        $output = [
            'result' => 'ok',
            'data' => [
                ['user_id' => $fanId, 'modified_time' => '2016-03-03 12:00:00']
            ]
        ];

        return new JsonResponse($output);
    }

    /**
     * @Route("/user/{userId}/fans_count",
     *        name = "api_fan_count",
     *        requirements = {"userId" = "\d+", "_format" = "json"},
     *        defaults = {"_format" = "json"})
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Fans",
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
