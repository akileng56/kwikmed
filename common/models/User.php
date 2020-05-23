<?php

namespace common\models;

use Yii;
use yii\base\InvalidParamException;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $otp
 * @property string $phonenumber
 * @property string $role
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 *
 */
class User extends ActiveRecord implements IdentityInterface {

	/***
     * Stations where I work from/Where a client is attached to
     *
     */
	
    /**
     * @inheritdoc
     */
    public $email;
    public $created_at;
    public $updated_at;

    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            [['auth_key', 'password_hash',  'role'], 'required'],
            [[ 'password_hash', 'password_reset_token','email'], 'string', 'max' => 255],
            [[ 'created_at', 'updated_at'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['phonenumber', 'role'], 'string', 'max' => 50],
            [['phonenumber','email'], 'unique'],
            [['email'], 'email'],
            [['password_reset_token'], 'unique'],
            [[ 'created_at', 'updated_at'], 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'otp' => 'OTP',
            'phonenumber' => 'Phone Number',
            'role' => 'User Role',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByPhoneNumber($phonenumber) {
        return static::findOne(['phonenumber' => $phonenumber]);
    }

    public static function findAdminUser($id) {
        return User::find()->where(['id' => $id])->andWhere(['role' => 'admin'])->one();
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }

        return static::findOne([
                    'password_reset_token' => $token
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public static function getAllRegisteredUsers() {
        return User::find()->all();
    }

    /**
     * Details of the currently logged in User
     * @return \common\models\User
     */
    public static function findLoggedInUser() {
        return self::findOne(Yii::$app->user->id);
    }
}
