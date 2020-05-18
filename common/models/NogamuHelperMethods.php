<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

/**
 * Dropdowns for the casetracker app
 */
class NogamuHelperMethods {

    /**
     * Welcome Email for Newly registsred Users
     * @return Boolean
     */
    public static function sendUserRegistrationWelcomeEmail($user, $pass) {
        return Yii::$app
                        ->mailer
                        ->compose(
                                ['html' => 'welcomeUserAfterRegistration-html', 'text' => 'welcomeUserAfterRegistration-text'], ['user' => $user, 'password' => $pass]
                        )
                        ->setFrom([Yii::$app->params['supportEmail'] => 'NOGAMU SERVICES'])
                        ->setTo($user->email)
                        ->setSubject('WELCOME TO NOGAMU')
                        ->send();
    }


    public static function sendNotificationEmail($member) {
        $title = 'NOGAMU MEMBERSHIP';
        //try to send the email
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'notification-html'], [
                    'member' => $member
                ]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => 'NOGAMU SERVICES'])
            ->setTo($member->email)
            ->setSubject($title)
            ->send();
    }

    public static function sendOrderStatusEmail($user,$order,$orderItems,$status) {
        $title = 'NOGAMU ORDER #'.$order->id ;
        //try to send the email
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'status-html'], [
                    'user' => $user,
                    'order' => $order,
                    'orderItems' => $orderItems,
                    'status' => $status
                ]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => 'NOGAMU SERVICES'])
            ->setTo($user->email)
            ->setSubject($title)
            ->send();
    }

}
