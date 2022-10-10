<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;
use yii\helpers\VarDumper;

class ProfilePictureModel extends Model {

    public $file;

    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxFiles' => 1,
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'file' => 'File'
        ];
    }

    public function uploadFile($file, $userId) {
        if ($this->validate()) {
            $randomString = Yii::$app->security->generateRandomString();
            $imageName = $randomString . '.' . $file->extension;
            $user = User::findOne(["id" => $userId]);
            $oldImageName = $user->photo;
            $user->photo = $imageName;
            if ($user->save()) {
                $path = \Yii::getAlias('@webroot/profilePhotos/');
                $filePath = $path . $oldImageName;
                if (is_file($filePath) && file_exists($filePath)) {
                    unlink($filePath);
                } else {
//                    VarDumper::dump($filePath, 3, true);
//                    VarDumper::dump('error deleting image', 3, true);
//                    die();
                }
            } else {
                VarDumper::dump($user->getErrors(), 3, true);
                die();
            }
            $file->saveAs('profilePhotos/' . $imageName);

            return true;
        } else {
            return false;
        }
    }

}
