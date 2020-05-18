<?php

namespace bot\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class TestController extends Controller {

    public $message;

    public function options($actionID) {
        return ['message'];
    }

    public function optionAliases() {
        return ['m' => 'message','d'=>'theid'];
    }

    public function actionIndex() {
        $users = User::findAll(['status' => 1]);
        foreach ($users AS $usr) {
            echo $usr->username . "\n";
        }
    }

}
