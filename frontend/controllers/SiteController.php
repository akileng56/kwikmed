<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

use backend\models\Configs;
use backend\models\Gallery;
use backend\models\News;
use backend\models\Partner;
use backend\models\Project;

use common\models\Membership;
use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use common\models\LoginForm;
use common\models\User;
use common\models\NogamuHelperMethods;

use frontend\models\SearchForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\httpclient\Client;


/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['index', 'login', 'home','signin', 'signup', 'logout','register','newmembership','membership',
                            'specialities','family','my-consultations','partners','about','services','blog','contact','cancel',
                            'cart','addtocart','removefromcart','updateitem','checkout','search','error','request-password-reset',
                            'reset-password' ],
                        'allow' => true
                    ],
                    [
                        'actions' => ['orders','cancel','logout','payment' ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function filters()
    {
        return [
            [
                'COutputCache',
                'duration' => 60,
                'varyByParam' => ['id'],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "front";
        return $this->redirect(Url::to(['site/home']));

    }


    /**
     * Loads home page
     *
     * @return mixed
     */
    public function actionHome()
    {
        $this->layout = "front";
        return $this->render('home');
    }

    /**
     * Loads home page
     *
     * @return mixed
     */
    public function actionContact()
    {
        $location = Configs::find()->where(['name' => 'location'])->one();
        return $this->render('contact',[
            'location' => $location
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = "main_signup";
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['site/index']));
        }

        return $this->redirect(Url::to(['site/home']));
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->redirect(Url::to(['site/signin']));
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                return $this->render('response');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
            Yii::$app->session->setFlash('error', "Invalid token. Please request a new one.");
            return $this->actionRequestPasswordReset();
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->redirect(Url::to(['site/signin']));
        }


        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        $model->category = 'user';

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->session->setFlash('success', 'Account created successfully...');
                return $this->redirect(Url::to(['site/signin']));
            } else {
                Yii::$app->session->setFlash('error', 'Registration Failed... Please try again');
                return $this->redirect(Url::to(['site/register']));
            }
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    public function actionNewmembership()
    {
        $model = new Membership();
        $model->membership_status = 'Pending';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Application created successfully.. 
            You will recieve an email once the application is approved ');
            return $this->redirect(Url::to(['site/membership']));
        } else {
            return $this->render('membership_form', [
                'model' => $model,
            ]);
        }

    }

    public function actionMembership()
    {
        $members = Membership::find()->where(['membership_status'=>'Approved'])->asArray()->all();

        return $this->render('membership', [
            'members' => $members,
        ]);
    }

    public function actionSignin() {
        $model = new LoginForm();

        //Check if a form has been submitted
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $username = $model->email;
            $user = User::findByUsername($username);
            if ($user) {
                if($model->login()){
                    if(Yii::$app->cart->count > 0){
                        return $this->redirect(Url::to(['site/cart']));
                    }else {
                        return $this->redirect(Url::to(['site/products']));
                    }
                } else {
                    Yii::$app->session->setFlash('failure', "Incorrect Email or Password");
                }
            } else {
                Yii::$app->session->setFlash('failure', "You have not yet registered to use this system.");
            }
            return $this->redirect(Url::to(['site/signin']));
        }else {
            return $this->render('signin', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionProducts() {
        $products = Product::find()->orderBy('created_at DESC')->asArray()->all();
        return $this->render('products',[
            'products' => $products,
        ]);
    }

    public function actionAddtocart($id) {
        $product = Product::findOne($id);
        $product->quantity = 1;

        Yii::$app->cart->put($product, 1);
        return $this->redirect(['site/cart']);
    }


    public function actionRemovefromcart($id)
    {
        $product = Product::findOne($id);
        Yii::$app->cart->remove($product);

        return $this->redirect(['site/cart']);
    }

    public function actionCart() {
        $cart = Yii::$app->cart;

        $products = $cart->getPositions();
        $total = $cart->getCost();

        return $this->render('cart',[
            'products' => $products,
            'total' => $total
        ]);
    }

    public function actionUpdateitem($id, $quantity2)
    {
        $product = Product::findOne($id);
        Yii::$app->cart->update($product, $quantity2);

        return $this->redirect(['site/cart']);

    }

    public function actionCheckout(){
        $user_id = Yii::$app->user->id;
        if($user_id){
            $model = new Order();
            if($model->load(Yii::$app->request->post()))
            {
                $cart = Yii::$app->cart;
                $products = $cart->getPositions();
                $total = $cart->getCost();

                $model->status = 'Pending';
                $model->user_id = $user_id;
                $model->amount = $total;
                $model->save();

                foreach($products as $product){
                    $item = new OrderItem();
                    $item->order_id = $model->id;
                    $item->product_id = $product->getId();
                    $item->price = $product->getPrice();
                    $item->quantity = $product->getQuantity();
                    $item->save();

                    $DBproduct = Product::findOne($product->getId());
                    $DBproduct->quantity = $DBproduct->quantity - $product->getQuantity();
                    $DBproduct->save();
                }
                $cart->removeAll();

                $user = User::findOne($model->user_id);
                if($user->email && Yii::$app->params['enableEmail']){
                    $orderItems =  OrderItem::find()->where(['order_id'=>$model->id])->all();
                    NogamuHelperMethods::sendOrderStatusEmail($user,$model,$orderItems,'Received and will be processed soon.');
                }
                Yii::$app->session->addFlash('success', 'Thanks for your order. We will contact you soon.');
                return $this->redirect(['site/orders']);
            } else {
                return $this->render('checkout', [
                    'model' => $model
                ]);
            }
        } else {
            return $this->redirect(['site/signin']);
        }

    }

    public function actionServices() {
        return $this->render('services');
    }

    public function actionOrders() {
        $user_id = Yii::$app->user->id;
        $products = OrderItem::find()
            ->innerJoin('order','order_item.order_id = order.id')
            ->where(['order.user_id' => $user_id])
            ->orderBy(['order_item.created_at'=> SORT_DESC ])
            ->all();

        return $this->render('orders',[
            'productItems' => $products
        ]);
    }

    public function actionSpecialities()
    {
        return $this->render('specialities');
    }

    public function actionProjects()
    {
        $projects = Project::find()->orderBy('created_at DESC')->asArray()->all();
        return $this->render('projects',[
            'projects' => $projects
        ]);
    }

    public function actionFamily()
    {
        return $this->render('family');
    }

    public function actionMyConsultations()
    {
        return $this->render('myconsultations');
    }

    public function actionSearch()
    {
        $model = new SearchForm();
        if($model->load(Yii::$app->request->post())){
            $search = $model->searchValue;
            $products = Product::find()->where(['like','name', '%'.$search. '%', false])
                ->orWhere(['like','description', '%'.$search. '%', false])->orderBy('created_at DESC')->asArray()->all();

            return $this->render('products',[
                'products' => $products,
            ]);
        }
    }

    public function actionCancel($id)
    {
        $orderItem = OrderItem::findOne($id);
        $product = Product::findOne($orderItem->product_id);
        $order = Order::findOne($orderItem->order_id);

        $product->quantity = $product->quantity + $orderItem->quantity;
        $product->save();

        $order->amount = $order->amount - ($orderItem->quantity * $orderItem->price);
        if ($order->amount == 0){
            $order->status = 'Cancelled';
        }
        $order->save();

        $orderItem->quantity = 0;
        $orderItem->status = 'Cancelled';
        $orderItem->save();

        return $this->redirect(['site/orders']);
    }

    public function actionPayment(){
        $token = $this->getToken();
        $referenceId = $this->GetReferenceID();
        $response = $this->RequestPayment($token,$referenceId);


        if($response->isOk){
            $newToken = $this->getToken();
            $this->paymentCallback($referenceId,$newToken);

            sleep(60);
            $newResponse = $this->paymentCallback($referenceId,$newToken);

            if($newResponse->isOk){
                $status = $newResponse->getData()['status'];
                if ($status == 'PENDING'){
                    //Retry checking the paying or maybe use a scheduled event
                    return $this->returnPage('PENDING',$newResponse,$referenceId);
                } else if ($status == 'SUCCESSFUL'){
                    //Go a head & send the order
                    return $this->returnPage('SUCCESSFUL',$newResponse,$referenceId);
                } else {
                    //Tell the customer to try again
                    return $this->returnPage($status,$newResponse,$referenceId);
                }

            } else { // Handle the callback for checking the token
                return $this->returnPage('Not Okay R2',$newResponse,$referenceId);
            }

        } else { // Check for other statuses when request to pay fails, tell customer to reply
            return $this->returnPage('notOkay',$response,$referenceId);
        }
    }

    public function getToken(){
        $accessToken = '';
        $client = new Client(['baseUrl' => 'https://sandbox.momodeveloper.mtn.com/collection/token/']);
        $response = $client->createRequest()
            ->setMethod('POST')
            ->addHeaders([
                'Ocp-Apim-Subscription-Key' => Yii::$app->params['Ocp-Apim-Subscription-Key'],
                'Authorization' => Yii::$app->params['Authorization'],
                'Content-Length' => 0
            ])
            ->send();

        if($response->isOk) {
            $responseData = $response->getData();
            $accessToken = $responseData['access_token'];

            return $accessToken;
        }

        return $accessToken;
    }


    public function RequestPayment($token,$referenceId){
        $client = new Client(['baseUrl' => 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay']);
        $response = $client->createRequest()
            ->setMethod('POST')
            ->addHeaders([
                'Authorization' => 'Bearer '.$token,
                'X-Reference-Id' => $referenceId,
                'X-Target-Environment' => Yii::$app->params['X-Target-Environment'],
                'Content-Type' => 'application/json',
                'Ocp-Apim-Subscription-Key' => Yii::$app->params['Ocp-Apim-Subscription-Key'],
            ])
            ->setFormat(Client::FORMAT_JSON)
            ->setData([
                'amount' => '20',
                'currency' => 'EUR',
                'externalId' => 'NOGAMU_'.$referenceId,
                'payer' => [
                    'partyIdType' => 'MSISDN',
                    'partyId' => Yii::$app->params['partyId']
                ],
                'payerMessage' => 'NOGOMU_PAYMENT',
                'payeeNote' => 'NOGOMU_PAYMENT',
            ])
            ->send();

        return $response;
    }

    public function GetReferenceID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function paymentCallback($referenceId,$token){
        $client = new Client(['baseUrl' => 'https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay/']);
        $response = $client->createRequest()
            ->setUrl($referenceId)
            ->setMethod('GET')
            ->addHeaders([
                'Ocp-Apim-Subscription-Key' => Yii::$app->params['Ocp-Apim-Subscription-Key'],
                'Authorization' => 'Bearer '.$token,
                'X-Target-Environment' => Yii::$app->params['X-Target-Environment'],
                'Content-Length' => 0
            ])
            ->send();

        return $response;
    }

    public function returnPage($responseType,$response,$referenceId){
        return $this->render('mobilemoney',[
            'responseType' => $responseType,
            'response' => $response->getData(),
            'referenceId' => $referenceId
        ]);
    }
}
