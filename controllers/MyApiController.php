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
        $subscriptionType = (isset($post["subscriptionType"])) ? $post["subscriptionType"] : 0;

        $subscTypeQuerymembers = "";
        if ($subscriptionType > 0) {
            $subscTypeQuerymembers = "(SELECT members.* FROM members JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = $subscriptionType) members ";
        } else {
            $subscTypeQuerymembers = "members";
        }

        $subscTypeQuerySubs = "";
        if ($subscriptionType > 0) {
            $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions WHERE subscriptions.r_type = $subscriptionType) subscriptions ";
        } else {
            $subscTypeQuerySubs = "subscriptions";
        }

        $rawSql = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COUNT(members.id) AS `count`
FROM (
    SELECT 0 AS `day`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
    UNION SELECT 6
) AS `week`
LEFT JOIN $subscTypeQuerymembers ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY)
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
        for ($i = 1; $i < 13; $i++) {
            $union = $union . "UNION SELECT $i ";
        }

        $rawSql0 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month` 
    $union
) AS `week`
LEFT JOIN $subscTypeQuerymembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";

        $connection0 = Yii::$app->getDb();
        $command0 = $connection0->createCommand($rawSql0);
        $result0 = $command0->queryAll();



        $dataMembers0 = [];
        $labelsMembers0 = [];
        for ($i = 0; $i < sizeof($result0); $i++) {
            $dataMembers0 [] = intval($result0[$i]["count"]);
            $labelsMembers0 [] = $result0[$i]["DayDate"];
        }

//        \yii\helpers\VarDumper::dump($labelsMembers0,3,3);
//        \yii\helpers\VarDumper::dump($dataMembers0,3,3);
//        die();



//        select date_format(subscription_date, '%M %Y'),sum(`fee`)
//       from `subscriptions`
//       group by year(subscription_date),month(subscription_date)
        $rawSql1 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
   
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";


        $connection1 = Yii::$app->getDb();
        $command1 = $connection1->createCommand($rawSql1);
        $result1 = $command1->queryAll();


        $dataSubscriptions = [];
        $labelsubscriptions = [];
        for ($i = 0; $i < sizeof($result1); $i++) {
            $dataSubscriptions [] = $result1[$i]["count"]; 
            $labelsubscriptions [] = $result1[$i]["DayDate"];
        }




//        $rawSql10 = "SELECT (DATE(NOW()) - INTERVAL `day` DAY) AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`
//FROM (
//    SELECT 0 AS `day` 
//    $union
//) AS `week`
//LEFT JOIN `members` ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY)
//LEFT JOIN subscriptions ON subscriptions.member_id = members.id
//GROUP BY `DayDate`
//ORDER BY `DayDate` ASC";
//        $rawSql10 = "select DayDate,count from (select date_format(subscription_date, '%M %Y') as DayDate,sum(`fee`) as count
//       from `subscriptions`
//       group by year(subscription_date),month(subscription_date) 
//       ORDER BY subscription_date DESC LIMIT 12) as t
//       ORDER BY DayDate ASC";

        $rawSql10 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
    UNION SELECT 6
    UNION SELECT 7
    UNION SELECT 8
    UNION SELECT 9
    UNION SELECT 10
    UNION SELECT 11
    UNION SELECT 12
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";


        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();


        $dataSubscriptions10 = [];
        $labelsubscriptions10 = [];
        for ($i = 0; $i < sizeof($result10); $i++) {
            $dataSubscriptions10 [] =  intval($result10[$i]["count"]);
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

    public function actionGetSignalsStat() {
        $post = Yii::$app->request->post();
        $userId = Yii::$app->user->id;


        $rawSqlCrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `MonthDate`
            ,COALESCE(count(`id`),0) AS `count`,
            COALESCE(SUM(case when crypto_signals.result = 1 then percentage else -percentage end),0) as `percentage`,
            COALESCE(SUM(case when crypto_signals.result = 1 then 1 else 0 end),0) as countWin,
            COALESCE(SUM(case when crypto_signals.result = 2 then 1 else 0 end),0) as countLoss,
            
            
(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
    UNION SELECT 6
    UNION SELECT 7
    UNION SELECT 8
    UNION SELECT 9
    UNION SELECT 10
    UNION SELECT 11
    UNION SELECT 12
) AS `week`
LEFT JOIN crypto_signals ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AND  crypto_signals.user_id = $userId
GROUP BY MonthDate
ORDER BY `dateWithputFormat` ASC";


        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($rawSqlCrypto);
        $result = $command->queryAll();


        for ($i = 0; $i < sizeof($result); $i++) {
            $profitCrpto [] = $result[$i]["percentage"];
            $resultSignals [] = $result[$i]["count"];
            $resultWonCryptoSignals [] = $result[$i]["countWin"];
            $resultLossCryptoSignals [] = $result[$i]["countLoss"];
            $labelsCryptoSignals [] = $result[$i]["MonthDate"];
        }

//            COALESCE(sum(`percentage`),0) AS `percentage`,
        $rawSqlForex = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `MonthDate`
            ,COALESCE(count(`id`),0) AS `count`,
            COALESCE(SUM(case when forex_signals.result = 1 then percentage else -percentage end),0) as `percentage`,
            COALESCE(SUM(case when forex_signals.result = 1 then 1 else 0 end),0) as countWin,
            COALESCE(SUM(case when forex_signals.result = 2 then 1 else 0 end),0) as countLoss,
            
            
(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3
    UNION SELECT 4
    UNION SELECT 5
    UNION SELECT 6
    UNION SELECT 7
    UNION SELECT 8
    UNION SELECT 9
    UNION SELECT 10
    UNION SELECT 11
    UNION SELECT 12
) AS `week`
LEFT JOIN forex_signals ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AND  forex_signals.user_id = $userId
GROUP BY MonthDate
ORDER BY `dateWithputFormat` ASC";


        $resultForex = Yii::$app->getDb()->createCommand($rawSqlForex)->queryAll();

        for ($i = 0; $i < sizeof($resultForex); $i++) {
            $profitForex [] = $resultForex[$i]["percentage"];
            $resultSignalsForex [] = $resultForex[$i]["count"];
            $resultWonForexSignals [] = $resultForex[$i]["countWin"];
            $resultLossForexSignals [] = $resultForex[$i]["countLoss"];
            $labelsForexSignals [] = $resultForex[$i]["MonthDate"];
        }


        if ($userId) {

            return [
                'status' => true,
                'message' => "",
                'profitCrpto' => $profitCrpto,
                'resultSignals' => $resultSignals,
                'resultWonCryptoSignals' => $resultWonCryptoSignals,
                'resultLossCryptoSignals' => $resultLossCryptoSignals,
                'labelsCryptoSignals' => $labelsCryptoSignals,
                'profitForex' => $profitForex,
                'resultSignalsForex' => $resultSignalsForex,
                'resultWonForexSignals' => $resultWonForexSignals,
                'resultLossForexSignals' => $resultLossForexSignals,
                'labelsForexSignals' => $labelsForexSignals,
            ];
        }
        return [
            'status' => false,
            'message' => ''
        ];
    }

}
