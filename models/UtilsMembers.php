<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of UtilsMembers
 *
 * @author user
 */
class UtilsMembers {

    public static function getMembersByUser() {

        $members = Members::find()
                ->select(['id', 'fullname'])
                ->where(['r_user' => \Yii::$app->user->id])
                ->asArray()
                ->all();


        return $members;
    }

    public static function getMemberById($memberId) {

        $members = Members::find()
                ->select(['id', 'fullname'])
                ->where(['r_user' => \Yii::$app->user->id, 'id' => $memberId])
                ->asArray()
                ->all();


        return $members;
    }

}
