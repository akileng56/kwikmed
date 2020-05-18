<?php

namespace backend\controllers;

use common\models\ProductImage;
use common\models\ProductTrack;
use Yii;
use common\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionAll()
    {
        $products = Product::getAllProducts();

        return $this->render('index', [
            'products' => $products
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $productTracks = ProductTrack::find()->where(['product_id'=>$id])->orderBy(['created_at'=>SORT_DESC])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'productTracks' => $productTracks
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        //Uploaded File
        $attachment = new ProductImage();
        $attachment->setScenario(ProductImage::SCENARIO_UPLOAD);
        //get File uploaded
        $attachment_files = UploadedFile::getInstances($model, 'attachments');

        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            $results = $attachment->upload($attachment_files, $model->id);
            if($results['status'] === 'success'){
                Yii::$app->session->setFlash('success', 'Product successfully created');
                return $this->redirect(['view', 'id' => $model->id]);
            }else {
                $model->delete();
                Yii::$app->session->setFlash('error', "The product was not created because the following file(s) uploaded " .
                    "are eit-her corrupted or empty: " . implode(", ", $results['files']) .
                    "<br>Please verify that the files are valid before uploading.");
                return $this->goBack();
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd($id)
    {
        $product = $this->findModel($id);
        $model = new ProductTrack();

        $model->product_id = $product->id;
        $model->user_id = Yii::$app->user->id;
        $model->action = 'add stock';

        if ($model->load(Yii::$app->request->post())) {
            $product = $this->findModel($model->product_id);
            $product->quantity = $product->quantity + $model->quantity;
            $product->save();
            $model->save();
            Yii::$app->session->setFlash('success', 'Added successfully');
            return $this->redirect(['view', 'id' => $product->id]);
        } else {
            return $this->render('addstock', [
                'model' => $model,
                'product' => $product,
            ]);
        }
    }

    public function actionRemove($id)
    {
        $product = $this->findModel($id);

        $model = new ProductTrack();
        $model->product_id = $product->id;
        $model->user_id = Yii::$app->user->id;
        $model->action = 'remove stock';

        if ($model->load(Yii::$app->request->post())) {
            $product = $this->findModel($model->product_id);
            if($product->quantity < $model->quantity){
                Yii::$app->session->setFlash('error', 'Quanity to remove is more than available stock');
                return $this->redirect(['view', 'id' => $product->id]);
            }
            $product->quantity = $product->quantity - $model->quantity;
            $product->save();
            $model->save();
            Yii::$app->session->setFlash('success', 'Removed successfully');
            return $this->redirect(['view', 'id' => $product->id]);
        } else {
            return $this->render('removestock', [
                'model' => $model,
                'product' => $product
            ]);
        }
    }


    public function actionSupplies(){
        $productTracks = ProductTrack::find()->all();
        return $this->render('supplies', [
            'productTracks' => $productTracks,
        ]);
    }
}
