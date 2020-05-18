<?php

return [
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php 
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            //'suffix' => '.xhtml',
            'rules' => [
                //1. Homepage after logging in
                'dashboard' => 'site/index',
                //Password Reset
                'change-password' => 'site/request-password-reset',
                //Land Module
                //General Rules 
                '<action:\w+>' => 'site/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
        ]
?>