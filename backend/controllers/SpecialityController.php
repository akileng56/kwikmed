<?php

namespace backend\controllers;

use backend\models\SpecialitySymptom;
use backend\models\Symptom;
use Yii;
use backend\models\Speciality;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecialityController implements the CRUD actions for Speciality model.
 */
class SpecialityController extends Controller
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
     * Lists all Speciality models.
     * @return mixed
     */
    public function actionAll()
    {
        $Specialities =  Speciality::find()->asArray()->all();

        return $this->render('index', [
            'specialities' => $Specialities,
        ]);
    }

    /**
     * Displays a single Speciality model.
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
     * Creates a new Speciality model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Speciality();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveSpecialitySymptom($model);

            return $this->redirect(['all']);
        } else {
            $symptoms = Symptom::find()->asArray()->all();

            return $this->render('create', [
                'model' => $model,
                'symptoms' => $symptoms,
            ]);
        }
    }

    /**
     * Updates an existing Speciality model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            SpecialitySymptom::deleteAll(['speciality_id' => $model->speciality_id]);
            $this->saveSpecialitySymptom($model);

            return $this->redirect(['all']);
        } else {
            $array = SpecialitySymptom::find()
                ->select('symptom_id')
                ->where(['speciality_id' => $id])
                ->asArray()->all();

            $model->symptoms = $model->formatSymptomArray($array);
            $symptoms = Symptom::find()->asArray()->all();

            return $this->render('update', [
                'model' => $model,
                'symptoms' => $symptoms,
            ]);
        }
    }

    /**
     * Deletes an existing Speciality model.
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
     * Finds the Speciality model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Speciality the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Speciality::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function saveSpecialitySymptom($model){
        foreach($model->symptoms as $value){
            $specialitySymptom = new SpecialitySymptom();
            $specialitySymptom->speciality_id = $model->speciality_id;
            $specialitySymptom->symptom_id = $value;
            $specialitySymptom->save();
        }
    }
}
