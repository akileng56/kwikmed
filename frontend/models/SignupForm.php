<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use backend\models\UserModule;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $password;
    public $phonenumber;
    public $email;

	
	/* * *
     * Stations where I work from/Where a client is attached to
     */
    public $my_stations;
	
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['phonenumber'], 'trim'],
            [['password', 'phonenumber'], 'required'],
            [['phonenumber', 'password'], 'string', 'min' => 2, 'max' => 255],
            [['phonenumber'], 'string', 'min' => 10, 'max' => 25],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->setAttribute('email', $this->email);
        $user->setAttribute('phonenumber', $this->phonenumber);
        $user->setAttribute('role', 'user');
        $user->setAttribute('created_at', time());
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->password_reset_token = '';

        if ($user->validate() && $user->save()) {
            return $user;
        } else {
            Yii::warning("loaded.." . print_r($user->getErrors(), true));
            return null;
        }
    }

}
