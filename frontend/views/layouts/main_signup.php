<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\FrontendAsset;
use yii\helpers\Url;
FrontendAsset::register($this);
?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>"> 
    <head>
        <meta charset="utf-8">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> NOGAMU | UGANDA </title>
        <link rel="icon" href="<?= Yii::$app->homeUrl ?>html/app/img/favicon.png">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!-- PRELOADER -->



        <section class="header-top-section">
            <div class="container">
                <div class="row">
                    <div  class="col-md-6">
                        <div class="header-top-content">
                            <ul class="nav nav-pills navbar-left">
                                <li><a href="#"><i class="pe-7s-call"></i><span>123-123456789</span></a></li>
                                <li><a href="#"><i class="pe-7s-mail"></i><span> info@nogamu.org</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="<?= Url::to(['site/register']); ?>">Create An Account</a></li>
                                <li><a href="<?= Url::to(['site/signin']); ?>">Login</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>NO</b>gamu</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= Url::to(['site/home']); ?>">Home</a></li>
                            <li><a href="<?= Url::to(['site/about']); ?>">About Us</a></li>
                            <li><a href="<?= Url::to(['site/services']); ?>">Services</a></li>
                            <li><a href="<?= Url::to(['site/products']); ?>">Products</a></li>
                            <li><a href="<?= Url::to(['site/membership']); ?>">Join us</a></li>
                            <li><a href="<?= Url::to(['site/contact']); ?>">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                            <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            <li><a href="#"><span> Cart - Ugx </span> <span class="shoping-cart">0</span></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Search...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->


        <div class="body-container">
            <?= $content; ?>
        </div>

        <!-- /Modal -->

        <footer class="footer footer-style">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="center">Designed by <a href="#">BelaCals</a>. All Rights Reserved</p>

                    </div>
                </div>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>

	</html>


<?php if (Yii::$app->session->hasFlash('failure')): ?>
    <script type="text/javascript">
        $(window).load(function(){
          $('#signin-modal').modal('show');
        });
    </script>
<?php endif; ?>
<?php $this->endPage() ?>
