<?php
/**
 * Created by PhpStorm.
 * User: AKILENG
 * Date: 5/22/2020
 * Time: 7:25 PM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\models\SignupForm;
use yii\helpers\Html;
use common\models\LoginForm;

$user = new SignupForm();
$login = new LoginForm();
?>

<section id="signin" class="home-section paddingbot-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6 kwikmed-divider">
                    <?php
                    $form = ActiveForm::begin(['action'=>Url::to(['site/register']),'id' => 'form-signup']);
                    echo $form->errorSummary($user, ['header' => '<b>We found some errors. Please correct these:</b>']);
                    ?>
                    <table class="table">
                        <tr>
                            <td>
                                <?= $form->field($user, 'phonenumber')->label('Phone Number'); ?>
                            </td>

                        </tr>
                        <tr>
                            <td><?= $form->field($user, 'email')->label('Email (Optional)') ?></td>
                        </tr>
                        <tr>
                            <td><?= $form->field($user, 'password')->passwordInput()->label('Password') ?></td>
                        </tr>

                        <tr>
                            <td>
                                <?= Html::submitButton('Create my account', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </td>
                        </tr>
                    </table>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-sm-6">
                    <?php $form = ActiveForm::begin(['action'=>Url::to(['site/signin']),'id' => 'form-signin']); ?>

                    <?= $form->field($login, 'phonenumber')->textInput() ?>

                    <?= $form->field($login, 'password')->passwordInput() ?>

                    <div style="color:#999;margin:1em 0">
                        Forgot password? <?= Html::a('Reset it', ['site/request-password-reset']) ?>.
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>