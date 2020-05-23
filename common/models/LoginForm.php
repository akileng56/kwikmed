<?php

namespace common\models;

use Yii;
use yii\base\Model;
//Login Attempt Behavior
//include_once Yii::getAlias('@vendor').'/ethercreative/yii2-login-attempts-behavior/src/LoginAttempt.php';
//include_once Yii::getAlias('@vendor').'/ethercreative/yii2-login-attempts-behavior/src/LoginAttemptBehavior.php';

/**
 * Login form
 */
class LoginForm extends Model {

    public $phonenumber;
    public $password;
    public $rememberMe = true;
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['phonenumber', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

	   public function behaviors()
{
    $behaviors = parent::behaviors();

    // $behaviors[] = [];

    return $behaviors;
}
  
	
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function AdminLogin() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getAdminUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = User::findByPhoneNumber($this->phonenumber);
        }

        return $this->_user;
    }

    protected function getAdminUser() {
        if ($this->_user === null) {
            $this->_user = User::findAdminUser($this->email);
        }

        return $this->_user;
    }
}
