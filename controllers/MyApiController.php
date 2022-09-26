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



        $dataMembers = [];
        $labelsMembers = [];
        for ($i = 0; $i < sizeof($result); $i++) {
            $dataMembers [] = $result[$i]["count"];
            $labelsMembers [] = $result[$i]["DayDate"];
        }


        $union = "";
        for ($i = 1; $i < 30; $i++) {
            $union = $union . "UNION SELECT $i ";
        }

        $rawSql0 = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COUNT(`id`) AS `count`
FROM (
    SELECT 0 AS `day` 
    $union
) AS `week`
LEFT JOIN `members` ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY)
GROUP BY `DayDate`
ORDER BY `DayDate` ASC";

        $connection0 = Yii::$app->getDb();
        $command0 = $connection0->createCommand($rawSql0);
        $result0 = $command0->queryAll();



        $dataMembers0 = [];
        $labelsMembers0 = [];
        for ($i = 0; $i < sizeof($result0); $i++) {
            $dataMembers0 [] = $result0[$i]["count"];
            $labelsMembers0 [] = $result0[$i]["DayDate"];
        }


        $rawSql1 = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`
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
LEFT JOIN subscriptions ON subscriptions.member_id = members.id
GROUP BY `DayDate`
ORDER BY `DayDate` ASC";


        $connection1 = Yii::$app->getDb();
        $command1 = $connection1->createCommand($rawSql1);
        $result1 = $command1->queryAll();


        $dataSubscriptions = [];
        $labelsubscriptions = [];
        for ($i = 0; $i < sizeof($result1); $i++) {
            $dataSubscriptions [] = $result1[$i]["count"];
            $labelsubscriptions [] = $result1[$i]["DayDate"];
        }

        $rawSql10 = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`
FROM (
    SELECT 0 AS `day` 
    $union
) AS `week`
LEFT JOIN `members` ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY)
LEFT JOIN subscriptions ON subscriptions.member_id = members.id
GROUP BY `DayDate`
ORDER BY `DayDate` ASC";


        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();


        $dataSubscriptions10 = [];
        $labelsubscriptions10 = [];
        for ($i = 0; $i < sizeof($result10); $i++) {
            $dataSubscriptions10 [] = $result10[$i]["count"];
            $labelsubscriptions10 [] = $result10[$i]["DayDate"];
        }


        if ($userId) {

            return [
                'status' => true,
                'message' => "",
                'dataMembers' => $dataMembers,
                'labelsMembers' => $labelsMembers,
                'dataMembers0' => $dataMembers0,
                'labelsMembers0' => $labelsMembers0,
                'dataSubscriptions' => $dataSubscriptions,
                'labelsubscriptions' => $labelsubscriptions,
                'dataSubscriptions10' => $dataSubscriptions10,
                'labelsubscriptions10' => $labelsubscriptions10,
            ];
        }
        return [
            'status' => false,
            'message' => ''
        ];
    }

}
