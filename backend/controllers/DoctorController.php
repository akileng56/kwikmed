<?php

namespace backend\controllers;

use backend\models\DoctorLanguage;
use backend\models\Language;
use backend\models\Speciality;
use common\models\User;
use frontend\models\SignupForm;
use Yii;
use backend\models\Doctor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\HelperMethods;

/**
 * DoctorController implements the CRUD actions for Doctor model.
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
    public function actionAll()
    {
        $doctors = Doctor::find()->asArray()->all();

        return $this->render('index', [
            'doctors' => $doctors,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();
        $userModel = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $userModel->load(Yii::$app->request->post())) {
            $user = $userModel->signup('doctor');

            $model->user_id = $user->id;
            $model->setScenario(Doctor::SCENARIO_UPLOAD);
            $attachment_files = UploadedFile::getInstances($model, 'attachments');
            $results = $model->upload($attachment_files, $model);

            if($results['status'] === 'success'){
                $this->saveDoctorLanguage($model);
                Yii::$app->session->setFlash('success', 'Doctor successfully created');
                return $this->redirect(['all']);
            }else {
                $model->delete();
                Yii::$app->session->setFlash('error', "Doctor was not created because the following file(s) uploaded " .
                    "are either corrupted or empty: " . implode(", ", $results['files']) .
                    "<br>Please verify that the files are valid before uploading.");
                return $this->goBack();
            }
        } else {
            $languages = Language::find()->asArray()->all();
            $specialities = Speciality::find()->asArray()->all();
            return $this->render('create', [
                'model' => $model,
                'languages' => $languages,
                'specialities' => $specialities,
                'userModel' => $userModel,
            ]);
        }
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userModel = User::findOne($model->user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            DoctorLanguage::deleteAll(['doctor_id' => $id]);
            $this->saveDoctorLanguage($model);
            $userModel->save();

            return $this->redirect(['all']);
        } else {
            $array = DoctorLanguage::find()
                ->select('language_id')
                ->where(['doctor_id' => $id])
                ->asArray()->all();

            $model->languages = HelperMethods::formatArray($array,'language_id');

            $languages = Language::find()->asArray()->all();
            $specialities = Speciality::find()->asArray()->all();

            return $this->render('update', [
                'model' => $model,
                'languages' => $languages,
                'specialities' => $specialities,
                'userModel' => $userModel,
            ]);
        }
    }

    /**
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['all']);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function saveDoctorLanguage($model){
        foreach($model->languages as $value){
            $doctorLanguage = new DoctorLanguage();
            $doctorLanguage->doctor_id = $model->doctor_id;
            $doctorLanguage->language_id = $value;
            $doctorLanguage->save();
        }
    }

    public function actionProfile($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // unlink(Yii::getAlias('@app').'/../../uploads/banners/' . $oldImage);
            return $this->redirect(['all']);
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }

    }
}
