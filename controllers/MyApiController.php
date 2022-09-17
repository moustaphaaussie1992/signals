<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\rest\Controller;

/**
 * Description of MyApiController
 *
 * @author user
 */
class MyApiController extends Controller {

    public function actionGetUsersStat() {

        $post = Yii::$app->request->post();
        $userId = $post["userId"];



//        $rawSql = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COUNT(`id`) AS `count`
        $rawSql = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COUNT(`id`) AS `count`
FROM (
    SELECT 0 AS `day`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
    UNION SELECT 6
) AS `week`
LEFT JOIN `members` ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY)
GROUP BY `DayDate`
ORDER BY `DayDate` ASC";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($rawSql);
        $result = $command->queryAll();

        $data = [];
        $labels = [];
        for ($i = 0; $i < sizeof($result); $i++) {
            $data [] = $result[$i]["count"];
            $labels [] = $result[$i]["DayDate"];
        }


        if ($userId) {

            return [
                'status' => true,
                'message' => "",
                'data' => $data,
                'labels' => $labels
            ];
        }
        return [
            'status' => false,
            'message' => ''
        ];
    }

}
