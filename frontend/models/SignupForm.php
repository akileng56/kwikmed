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

    public $email;
    public $password;
    public $category;
    public $lastname;
    public $firstname;
    public $telephone;

	
	/* * *
     * Stations where I work from/Where a client is attached to
     */
    public $my_stations;
	
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['email'], 'trim'],
            [['email', 'password', 'category', 'firstname', 'lastname', 'telephone'], 'required'],
            [['lastname', 'firstname'], 'string', 'min' => 2, 'max' => 255],
            [['telephone'], 'string', 'min' => 10, 'max' => 25],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
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
        $user->setAttribute('category', $this->category);
        $user->setAttribute('lastname', $this->lastname);
        $user->setAttribute('firstname', $this->firstname);
        $user->setAttribute('telephone', $this->telephone);
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = time();
        $user->password_reset_token = '';

        if ($user->validate() && $user->save()) {
            return $user;
        } else {
            Yii::warning("loaded.." . print_r($user->getErrors(), true));
            return null;
        }
    }

}
