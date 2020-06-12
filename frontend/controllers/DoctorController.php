<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Doctor;
use frontend\models\Schedule;
use backend\models\DoctorLanguage;

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
        $id = Yii::$app->user->id;
        $schedules = Schedule::find(['doctor_id'=>$id])->asArray()->all();

        return $this->render('schedule',[
            'schedules' => $schedules,
        ]);
    }

    public function actionProfile()
    {
        $id = Yii::$app->user->id;
        $model = Doctor::find()->where(['user_id'=>$id])->one();
        $languages = DoctorLanguage::find(['doctor_id' => $model->doctor_id])->asArray()->all();

        return $this->render('profile', [
            'model' => $model,
            'languages' => $languages
        ]);
    }

    public function actionNewschedule()
    {
        $model = new Schedule();
        if ($model->load(Yii::$app->request->post())) {
            $model->doctor_id = Yii::$app->user->id;
            $model->start_time = strtotime($model->start_time_holder);
            $model->break_start_time = strtotime($model->break_start_time_holder);
            $model->break_end_time = strtotime($model->break_end_time_holder);
            $model->end_time = strtotime($model->end_time_holder);

            $model->save();

            $this->redirect(['doctor/schedule']);
        } else {
            return $this->render('newschedule',[
                'model' => $model
            ]);
        }

    }

    public function actionEditSchedule($id)
    {
        $model = Schedule::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->start_time = strtotime($model->start_time_holder);
            $model->break_start_time = strtotime($model->break_start_time_holder);
            $model->break_end_time = strtotime($model->break_end_time_holder);
            $model->end_time = strtotime($model->end_time_holder);

            $model->save();
            $this->redirect(['doctor/schedule']);
        } else {
            $model->start_time_holder = date('h:i A', $model->start_time);
            $model->break_start_time_holder = date('h:i A', $model->break_start_time);
            $model->break_end_time_holder = date('h:i A', $model->break_end_time);
            $model->end_time_holder = date('h:i A', $model->end_time);

            return $this->render('editschedule',[
                'model' => $model
            ]);
        }
    }
}
