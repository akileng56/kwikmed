<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\FrontendAsset;
use yii\helpers\Html;
use frontend\models\SearchForm;


FrontendAsset::register($this);

$user = Yii::$app->user->identity;

$searchModel = new SearchForm();
?>
<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> QWIKMED | UGANDA </title>
    <link rel="icon" href="<?= Yii::$app->homeUrl ?>html/app/img/logo.png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-right">Call us +256 704 488 502</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="kwikmed-logo navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                    <img src="<?= Yii::$app->homeUrl ?>html/app/img/logo.png" alt="" width="100%"; height="45px"; />
                    <span class="kwikmed-logo-text"> QwiKMED </span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#intro">Home</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#doctor">Doctors</a></li>
                    <li><a href="#facilities">Facilities</a></li>
                    <li><a href="#signin">Login / Signup </a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Content section -->

    <div class="body-container">
        <?= $content; ?>
    </div>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5>About qwikmed</h5>
                            <p>
                                Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                            </p>
                        </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5>Information</h5>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Laboratory</a></li>
                                <li><a href="#">Medical treatment</a></li>
                                <li><a href="#">Terms & conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5>qwikmed center</h5>
                            <p>
                                Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                            </p>
                            <ul>
                                <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
                                </li>
                                <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
                                </li>
                                <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medicio.com
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5>Our location</h5>
                            <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

                        </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5>Follow us</h5>
                            <ul class="company-social">
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
