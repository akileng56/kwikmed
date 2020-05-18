<?php

namespace backend\controllers;

use backend\models\Module;
use backend\models\UserModule;
use common\models\BusinessUnit;
use Yii;
use common\models\User;
use backend\models\SignupForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

class UserController extends \yii\web\Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return type
     */
    public function actionGroups() {
        $auth = Yii::$app->authManager;
        ;
        //Roles/Groups
        $groups = $auth->getRoles();
        return $this->render('groups', ['roles' => $groups]);
    }
    /**
     * All Users Registered
     * @return type
     */
    public function actionAllUsers() {
        $users = User::getAllRegisteredUsers();
        return $this->render('all-users', ['users' => $users]);
    }
    /**
     * Register a new System User
     * @return type
     */
    public function actionRegister() {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            //Pick The password
            $pass = $model->password;
            if ($user = $model->signup()) {
                //Welcome Message
                Yii::$app->session->setFlash('success', 'You have successfully registered a user');

                return $this->redirect(Url::to(['user/all-users']));
            }
        } else {
            $model->password = 'pass3@rd';
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Update details of user
     * @param type $id
     * @return type
     */
    public function actionUpdate($id) {
        $model = User::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'You have successfully updated user details');

            return $this->redirect(Url::to(['user/all-users']));
        } else {
            return $this->render('update' , [
                    'model' => $model
                ]
            );
        }
    }

}