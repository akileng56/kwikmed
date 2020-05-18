<?php

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <!-- start: HEAD -->
    <head>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | LegalCaseTracker</title>
        <link href="http://localhost:85/casetracker/client/frontend/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background:#fff;">
        <?php $this->beginBody() ?>
        <div>
            <?= $content ?>
        </div>
    </body>
</html>
<?php $this->endPage() ?>