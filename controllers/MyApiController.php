<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\User;
use Yii;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Description of MyApiController
 *
 * @author user
 */
class MyApiController extends Controller {

    public function actionGetUserProfile() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post();
        $userId = Yii::$app->user->id;

        return User::find()
                        ->select('photo')
                        ->asArray()
                        ->where(['id' => $userId])
                        ->one();
    }

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
            $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId  WHERE subscriptions.r_type = $subscriptionType) subscriptions ";
        } else {
            $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId )subscriptions";
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
            $dataSubscriptions10 [] = intval($result10[$i]["count"]);
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

    public function actionGetUsersStatDashboard() {

        $month = date('m');
        $month = intval($month);

        $post = Yii::$app->request->post();
        $userId = $post["userId"];
        $from_date = $post["from_date"];
        $to_date = $post["to_date"];



        $subscriptionType = (isset($post["subscriptionType"])) ? $post["subscriptionType"] : 0;

        $subscTypeQuerymembers = "";
        if ($subscriptionType > 0) {
            $subscTypeQuerymembers = "(SELECT members.* FROM members JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = $subscriptionType) members ";
        } else {
            $subscTypeQuerymembers = "members";
        }

        $subscTypeQuerySubs = "";
        if ($subscriptionType > 0) {
            $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId WHERE subscriptions.r_type = $subscriptionType  ) subscriptions";
        } else {
            $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId )subscriptions";
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
LEFT JOIN $subscTypeQuerymembers ON DATE(`date`) = (DATE(NOW()) - INTERVAL `day` DAY) AND  members.r_user  = $userId
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

        //////////////////crypto members
        $cryptomembers = "(SELECT members.* FROM members JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '1'  AND members.r_user  = $userId) members ";
        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }







//        $rawSqlCrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
//FROM (
//    SELECT 0 AS `month`
//    $union
//) AS `week`
//LEFT JOIN $cryptomembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
//GROUP BY DayDate
//ORDER BY `dateWithputFormat` ASC";

        if ($from_date && $to_date) {
//            $rawSqlCrypto = "SELECT date_format(date, '%M %d') AS `DayDate`, COALESCE(count(`date`),0) AS `count`
//FROM members
//Left JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '1'
//And date >= '$from_date'
//    And date <= '$to_date'
//        GROUP BY date_format(date, '%M %y %d')
//ORDER BY `date` ASC";

            $rawSqlCrypto = "SELECT date_list.the_date as DayDate,
                (SELECT COUNT(mbs.id) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  AND subscriptions.r_type = '1'  AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSqlCrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %y') AS `DayDate`, COALESCE(count(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    $union
) AS `week`
LEFT JOIN $cryptomembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AND members.r_user  = $userId
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }


        $connectionCrypto = Yii::$app->getDb();
        $commandCrypto = $connectionCrypto->createCommand($rawSqlCrypto);
        $resultCrypto = $commandCrypto->queryAll();


        $CryptoMembers = [];
        $labelsCryptoMembers = [];
        for ($i = 0; $i < sizeof($resultCrypto); $i++) {
            $CryptoMembers [] = intval($resultCrypto[$i]["count"]);
            $labelsCryptoMembers [] = $resultCrypto[$i]["DayDate"];
        }



        ///////////
        //////////////////forex members
        $forexmembers = "(SELECT members.* FROM members JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '2' AND  members.r_user  = $userId) members ";
        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }

//        $rawSqlforex = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
//FROM (
//    SELECT 0 AS `month`
//    $union
//) AS `week`
//LEFT JOIN $forexmembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
//GROUP BY DayDate
//ORDER BY `dateWithputFormat` ASC";



        if ($from_date && $to_date) {
//            $rawSqlforex = "SELECT date_format(date, '%M %d') AS `DayDate`, COALESCE(count(`date`),0) AS `count`
//FROM members
//Left JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '2'
//
//And subscriptions.subscription_date >= '$from_date'
//    And subscriptions.subscription_date <= '$to_date'
//        GROUP BY date_format(date, '%M %y %d')
//ORDER BY `date` ASC";

            $rawSqlforex = "SELECT date_list.the_date as DayDate,
                (SELECT COUNT(mbs.id) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  AND subscriptions.r_type = '2'   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSqlforex = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %y') AS `DayDate`, COALESCE(count(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    $union
) AS `week`
LEFT JOIN $forexmembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')  AND members.r_user  = $userId
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }




        $connectionforex = Yii::$app->getDb();
        $commandforex = $connectionforex->createCommand($rawSqlforex);
        $resultforex = $commandforex->queryAll();

        $forexMembers = [];
        $labelsforexMembers = [];
        for ($i = 0; $i < sizeof($resultforex); $i++) {
            $forexMembers [] = intval($resultforex[$i]["count"]);
            $labelsforexMembers [] = $resultforex[$i]["DayDate"];
        }




        ///////////
        //////////////////forex members
        $forexandcryptomembers = "(SELECT members.* FROM members JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '3' AND  members.r_user  = $userId) members ";
        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }

//        $rawSqlforexandcrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
//FROM (
//    SELECT 0 AS `month`
//    $union
//) AS `week`
//LEFT JOIN $forexandcryptomembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
//GROUP BY DayDate
//ORDER BY `dateWithputFormat` ASC";




        if ($from_date && $to_date) {
//            $rawSqlforexandcrypto = "SELECT date_format(date, '%M %d') AS `DayDate`, COALESCE(count(`date`),0) AS `count`
//FROM members
//Left JOIN subscriptions ON subscriptions.member_id = members.id WHERE subscriptions.r_type = '3'
//And subscriptions.subscription_date >= '$from_date'
//    And subscriptions.subscription_date <= '$to_date'
//GROUP BY date_format(date, '%M %y %d')
//ORDER BY `date` ASC";

            $rawSqlforexandcrypto = "SELECT date_list.the_date as DayDate,
                (SELECT COUNT(mbs.id) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  AND subscriptions.r_type = '3'   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSqlforexandcrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %y') AS `DayDate`, COALESCE(count(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    $union
) AS `week`
LEFT JOIN $forexandcryptomembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')  AND members.r_user  = $userId
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }


        $connectionforexandcrypto = Yii::$app->getDb();
        $commandforexandcrypto = $connectionforexandcrypto->createCommand($rawSqlforexandcrypto);
        $resultforexandcrypto = $commandforexandcrypto->queryAll();

        $forexandcryptoMembers = [];
        $labelsforexandcryptoMembers = [];
        for ($i = 0; $i < sizeof($resultforexandcrypto); $i++) {
            $forexandcryptoMembers [] = intval($resultforexandcrypto[$i]["count"]);
            $labelsforexandcryptoMembers [] = $resultforexandcrypto[$i]["DayDate"];
        }






        ///////////


        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }
        if ($from_date && $to_date) {
//            $rawSql0 = "SELECT date_format(date, '%M %d') AS `DayDate`, COALESCE(count(`id`),0) AS `count`
//FROM members
//where date >= '$from_date'
//    And date <= '$to_date'
//GROUP BY date_format(date, '%M %y %d')
//ORDER BY `date` ASC";
            $rawSql0 = "SELECT date_list.the_date as DayDate,
                (SELECT COUNT(id) as count FROM members mbs WHERE date_format(mbs.registration_date, '%Y-%m-%d') = date_list.the_date   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSql0 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %y') AS `DayDate`, COALESCE(count(`id`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    $union
) AS `week`
LEFT JOIN $subscTypeQuerymembers  ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')  AND members.r_user  = $userId
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }



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


        $rawSql1leadschartProfitsFromCryptoMembers = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3

) AS `week`
LEFT JOIN
(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId WHERE subscriptions.r_type = '1'  ) subscriptions
ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";

        $connection1 = Yii::$app->getDb();
        $command1 = $connection1->createCommand($rawSql1leadschartProfitsFromCryptoMembers);
        $result1 = $command1->queryAll();

        $dataSubscriptionsleadschartProfitsFromCryptoMembers = [];
        $labelsubscriptionsleadschartProfitsFromCryptoMembers = [];
        for ($i = 0; $i < sizeof($result1); $i++) {
            $dataSubscriptionsleadschartProfitsFromCryptoMembers [] = $result1[$i]["count"];
            $labelsubscriptionsleadschartProfitsFromCryptoMembers [] = $result1[$i]["DayDate"];
        }




        $rawSql1leadschartProfitsFromForexMembers = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3

) AS `week`
LEFT JOIN
(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId WHERE subscriptions.r_type = '2'  ) subscriptions
ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";

        $connection1 = Yii::$app->getDb();
        $command1 = $connection1->createCommand($rawSql1leadschartProfitsFromForexMembers);
        $result1 = $command1->queryAll();

        $dataSubscriptionsleadschartProfitsFromForexMembers = [];
        $labelsubscriptionsleadschartProfitsFromForexMembers = [];
        for ($i = 0; $i < sizeof($result1); $i++) {
            $dataSubscriptionsleadschartProfitsFromForexMembers [] = $result1[$i]["count"];
            $labelsubscriptionsleadschartProfitsFromForexMembers [] = $result1[$i]["DayDate"];
        }





        $rawSql1leadschartProfitsFromCryptoForexMembers = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
    UNION SELECT 1
    UNION SELECT 2
    UNION SELECT 3

) AS `week`
LEFT JOIN
(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId WHERE subscriptions.r_type = '3'  ) subscriptions
ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";

        $connection1 = Yii::$app->getDb();
        $command1 = $connection1->createCommand($rawSql1leadschartProfitsFromCryptoForexMembers);
        $result1 = $command1->queryAll();

        $dataSubscriptionsleadschartProfitsFromCryptoForexMembers = [];
        $labelsubscriptionsleadschartProfitsFromCryptoForexMembers = [];
        for ($i = 0; $i < sizeof($result1); $i++) {
            $dataSubscriptionsleadschartProfitsFromCryptoForexMembers [] = $result1[$i]["count"];
            $labelsubscriptionsleadschartProfitsFromCryptoForexMembers [] = $result1[$i]["DayDate"];
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
        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }



        if ($from_date && $to_date) {
            $rawSql10 = "SELECT date_list.the_date as DayDate,
                (SELECT sum(fee) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date    AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSql10 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
  $union
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }




        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();

        $dataSubscriptions10 = [];
        $labelsubscriptions10 = [];
        for ($i = 0; $i < sizeof($result10); $i++) {
            $dataSubscriptions10 [] = intval($result10[$i]["count"]);
            $labelsubscriptions10 [] = $result10[$i]["DayDate"];
        }


        /////crypto member revenue
        $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId  WHERE subscriptions.r_type = '1' ) subscriptions ";

        if ($from_date && $to_date) {
            $rawSql10 = "SELECT date_list.the_date as DayDate,
                (SELECT sum(fee) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  and  subscriptions.r_type='1'   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSql10 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
  $union
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }

        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();

        $cryptomemberSubscriptions = [];

        for ($i = 0; $i < sizeof($result10); $i++) {
            $cryptomemberSubscriptions [] = intval($result10[$i]["count"]);
        }


        ////// forex members revenue
        $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId  WHERE subscriptions.r_type = '2') subscriptions ";

        if ($from_date && $to_date) {
            $rawSql10 = "SELECT date_list.the_date as DayDate,
                (SELECT sum(fee) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  and  subscriptions.r_type='2'   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSql10 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
  $union
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
ORDER BY `dateWithputFormat` ASC";
        }

        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();

        $forexmemberSubscriptions = [];

        for ($i = 0; $i < sizeof($result10); $i++) {
            $forexmemberSubscriptions [] = intval($result10[$i]["count"]);
        }

        ///// crypto and forex members revenue
        $subscTypeQuerySubs = "(SELECT subscriptions.* FROM subscriptions JOIN members ON members.id = subscriptions.member_id AND members.r_user = $userId  WHERE subscriptions.r_type = '3') subscriptions ";
        if ($from_date && $to_date) {
            $rawSql10 = "SELECT date_list.the_date as DayDate,
                (SELECT sum(fee) as count FROM members mbs
                JOIN subscriptions ON subscriptions.member_id = mbs.id
                WHERE date_format(subscriptions.subscription_date, '%Y-%m-%d') = date_list.the_date  and  subscriptions.r_type='3'   AND mbs.r_user  = $userId) AS count
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSql10 = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `DayDate`, COALESCE(sum(`fee`),0) AS `count`,(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
  $union
) AS `week`
LEFT JOIN $subscTypeQuerySubs ON date_format(subscription_date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y')
GROUP BY DayDate
    ORDER BY `dateWithputFormat` ASC";
        }

        $connection10 = Yii::$app->getDb();
        $command10 = $connection10->createCommand($rawSql10);
        $result10 = $command10->queryAll();

        $cryptoforexmemberSubscriptions = [];

        for ($i = 0; $i < sizeof($result10); $i++) {
            $cryptoforexmemberSubscriptions [] = intval($result10[$i]["count"]);
        }

        ////////////////////////signals ::::


        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }
        if ($from_date && $to_date) {
            $rawSqlCrypto = "SELECT date_list.the_date as MonthDate,
                (SELECT count(*) FROM crypto_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId ) AS count,
                (SELECT COALESCE(SUM(case when crypto_signals.result = 1 then percentage else -percentage end),0) FROM crypto_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS percentage,
                (SELECT COALESCE(SUM(case when crypto_signals.result = 1 then 1 else 0 end),0)  FROM crypto_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS countWin,
                (SELECT COALESCE(SUM(case when crypto_signals.result = 2 then 1 else 0 end),0) FROM crypto_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS countLoss,
                (SELECT COALESCE(SUM(case when crypto_signals.result = 1 then percentage else 0 end),0) FROM crypto_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS resultWin,
                (SELECT COALESCE(SUM(case when crypto_signals.result = 2 then -percentage else 0 end),0) FROM crypto_signals WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS resultLoss
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
            $rawSqlCrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `MonthDate`
            ,COALESCE(count(`id`),0) AS `count`,
            COALESCE(SUM(case when crypto_signals.result = 1 then percentage else -percentage end),0) as `percentage`,
            COALESCE(SUM(case when crypto_signals.result = 1 then 1 else 0 end),0) as countWin,
            COALESCE(SUM(case when crypto_signals.result = 2 then 1 else 0 end),0) as countLoss,
              COALESCE(SUM(case when crypto_signals.result = 1 then percentage else 0 end),0) as resultWin,
                COALESCE(SUM(case when crypto_signals.result = 2 then -percentage else 0 end),0) as resultLoss,


(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
$union
) AS `week`
LEFT JOIN crypto_signals ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AND  crypto_signals.user_id = $userId
GROUP BY MonthDate
ORDER BY `dateWithputFormat` ASC";
        }

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($rawSqlCrypto);
        $result = $command->queryAll();

        for ($i = 0; $i < sizeof($result); $i++) {
            $profitCrpto [] = $result[$i]["percentage"];
            $resultWinCrypto [] = $result[$i]["resultWin"];
            $resultLossCrypto [] = $result[$i]["resultLoss"];
            $resultSignals [] = $result[$i]["count"];
            $resultWonCryptoSignals [] = $result[$i]["countWin"];
            $resultLossCryptoSignals [] = $result[$i]["countLoss"];
            $labelsCryptoSignals [] = $result[$i]["MonthDate"];
        }

        if ($from_date && $to_date) {
            $rawSqlForex = "SELECT date_list.the_date as MonthDate,
                (SELECT count(*) FROM forex_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId ) AS count,
                (SELECT COALESCE(SUM(case when forex_signals.result = 1 then percentage else -percentage end),0) FROM forex_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS percentage,
                (SELECT COALESCE(SUM(case when forex_signals.result = 1 then 1 else 0 end),0)  FROM forex_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS countWin,
                (SELECT COALESCE(SUM(case when forex_signals.result = 2 then 1 else 0 end),0) FROM forex_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS countLoss,
                (SELECT COALESCE(SUM(case when forex_signals.result = 1 then percentage else 0 end),0) FROM forex_signals  WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS resultWinForex,
                (SELECT COALESCE(SUM(case when forex_signals.result = 2 then -percentage else 0 end),0) FROM forex_signals WHERE date_format(date, '%Y-%m-%d') = date_list.the_date AND user_id = $userId) AS resultLossForex
                FROM
(SELECT a.the_date
FROM (
    SELECT
		'$to_date' - INTERVAL ( a.a + (10 * b.a) ) DAY AS the_date
    FROM (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS a
	CROSS JOIN (
		SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
	) AS b
) a
WHERE a.the_date BETWEEN '$from_date' AND '$to_date') date_list


ORDER BY date_list.the_date ASC;
";
        } else {
//            COALESCE(sum(`percentage`),0) AS `percentage`,
            $rawSqlForex = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `MonthDate`
            ,COALESCE(count(`id`),0) AS `count`,
            COALESCE(SUM(case when forex_signals.result = 1 then percentage else -percentage end),0) as `percentage`,
            COALESCE(SUM(case when forex_signals.result = 1 then 1 else 0 end),0) as countWin,
            COALESCE(SUM(case when forex_signals.result = 2 then 1 else 0 end),0) as countLoss,
                 COALESCE(SUM(case when forex_signals.result = 1 then percentage else 0 end),0) as resultWinForex,
                COALESCE(SUM(case when forex_signals.result = 2 then -percentage else 0 end),0) as resultLossForex,


(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
  $union
) AS `week`
LEFT JOIN forex_signals ON date_format(date, '%M %Y') = date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AND  forex_signals.user_id = $userId
GROUP BY MonthDate
ORDER BY `dateWithputFormat` ASC";
        }
        $resultForex = Yii::$app->getDb()->createCommand($rawSqlForex)->queryAll();

        for ($i = 0; $i < sizeof($resultForex); $i++) {
            $profitForex [] = $resultForex[$i]["percentage"];
            $resultSignalsForex [] = $resultForex[$i]["count"];
            $resultWonForexSignals [] = $resultForex[$i]["countWin"];
            $resultLossForexSignals [] = $resultForex[$i]["countLoss"];
            $labelsForexSignals [] = $resultForex[$i]["MonthDate"];
            $resultWinForex [] = $resultForex[$i]["resultWinForex"];
            $resultLossForex [] = $resultForex[$i]["resultLossForex"];
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
                'labelsCryptoMembers' => $labelsCryptoMembers,
                'CryptoMembers' => $CryptoMembers,
                'labelsforexMembers' => $labelsforexMembers,
                'forexMembers' => $forexMembers,
                'labelsforexandcryptoMembers' => $labelsforexandcryptoMembers,
                'forexandcryptoMembers' => $forexandcryptoMembers,
                'cryptomemberSubscriptions' => $cryptomemberSubscriptions,
                'forexmemberSubscriptions' => $forexmemberSubscriptions,
                'cryptoforexmemberSubscriptions' => $cryptoforexmemberSubscriptions,
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
                'resultWinForex' => $resultWinForex,
                'resultLossForex' => $resultLossForex,
                'resultLossCrypto' => $resultLossCrypto,
                'resultWinCrypto' => $resultWinCrypto,
                'labelsubscriptionsleadschartProfitsFromCryptoMembers' => $labelsubscriptionsleadschartProfitsFromCryptoMembers,
                'dataSubscriptionsleadschartProfitsFromCryptoMembers' => $dataSubscriptionsleadschartProfitsFromCryptoMembers,
                'labelsubscriptionsleadschartProfitsFromForexMembers' => $labelsubscriptionsleadschartProfitsFromForexMembers,
                'dataSubscriptionsleadschartProfitsFromForexMembers' => $dataSubscriptionsleadschartProfitsFromForexMembers,
                'labelsubscriptionsleadschartProfitsFromCryptoForexMembers' => $labelsubscriptionsleadschartProfitsFromCryptoForexMembers,
                'dataSubscriptionsleadschartProfitsFromCryptoForexMembers' => $dataSubscriptionsleadschartProfitsFromCryptoForexMembers,
            ];
        }
        return [
            'status' => false,
            'message' => ''
        ];
    }

    public function actionGetSignalsStat() {
        $post = Yii::$app->request->post();
        $userId = $post["userId"];
        $month = date('m');
        $month = intval($month);
        $union = "";
        for ($i = 1; $i < $month; $i++) {
            $union = $union . "UNION SELECT $i ";
        }

        $rawSqlCrypto = "SELECT date_format((DATE(NOW()) - INTERVAL `month` MONTH), '%M %Y') AS `MonthDate`
            ,COALESCE(count(`id`),0) AS `count`,
            COALESCE(SUM(case when crypto_signals.result = 1 then percentage else -percentage end),0) as `percentage`,
            COALESCE(SUM(case when crypto_signals.result = 1 then 1 else 0 end),0) as countWin,
            COALESCE(SUM(case when crypto_signals.result = 2 then 1 else 0 end),0) as countLoss,


(DATE(NOW()) - INTERVAL `month` MONTH) as dateWithputFormat
FROM (
    SELECT 0 AS `month`
$union
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
$union
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
