<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * DoctorController handles functions of a doctor on frontend.
 */
class DoctorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionConsultations()
    {
       return $this->render('myconsultations');
    }


    public function actionSchedule()
    {
        return $this->render('schedule');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }








}
