<?php

namespace bot\models;

use Yii;
use yii\base\Model;
use yii\db\Query;


/**
 * Methods which are called in the background
 *
 * @author Okumu Francis
 */
class BackgroundTasks {

    /**
     * Send a test email, with an attachment & CC
     */
    public static function sendTestMail() {
//        Yii::$app->mailer->compose()
//                ->setFrom([\Yii::$app->params['adminEmail'] => \Yii::$app->name . ' Bot'])
//                ->setTo('okumfranq@gmail.com')
//                ->setCc(['okumu@outlook.com', 'fokumu@ura.go.ug'])
//                ->setTextBody('This is a sample message to one of the partners')
//                ->setSubject('SENDING EMAIL FROM CONSOLE WITH ATTACHMENT')
//                ->attach('/var/www/html/staticfiles/demo/19th-September-2016-events.pdf')
//                ->send();
    }

}
