<?php

use kartik\datecontrol\DateControl;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'AOcpAcqlXVA_ln_97haZaFmtdG3QAZSX',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'htmlToPdf' => [
            'class' => 'boundstate\htmlconverter\HtmlToPdfConverter',
            'bin' => '/usr/bin/wkhtmltopdf',
            // global wkhtmltopdf command line options
// (see http://wkhtmltopdf.org/usage/wkhtmltopdf.txt)
            'options' => [
                'print-media-type',
                'disable-smart-shrinking',
                'no-outline',
                'page-size' => 'letter',
                'load-error-handling' => 'ignore',
                'load-media-error-handling' => 'ignore'
            ],
        ],
        'htmlToImage' => [
            'class' => 'boundstate\htmlconverter\HtmlToImageConverter',
            'bin' => '/usr/bin/wkhtmltoimage',
        ],
        'response' => [
            'formatters' => [
                'pdf' => [
                    'class' => 'boundstate\htmlconverter\PdfResponseFormatter',
                    // Set a filename to download the response as an attachments (instead of displaying in browser)
                    'filename' => 'attachment.pdf'
                ],
                'image' => [
                    'class' => 'boundstate\htmlconverter\ImageResponseFormatter',
                ],
            ]
        ],
//        'mailer' => [
//            'class' => \yii\symfonymailer\Mailer::class,
////            'viewPath' => '@app/mail',
////            // send all mails to a file by default.
////            'useFileTransport' => true,
////            'class' => 'yii\swiftmailer\Mailer',
//            'transport' => [
//                'scheme' => 'smtps',
////                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
//                'username' => 'moustaphaaussie@gmail.com',
//                'password' => 'mustafa1O',
//                'port' => '587', // Port 25 is a very common port too
//                'encryption' => 'tls', // It is often used, check your provider or mail server specs
//            ],
//        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            'useFileTransport' => false,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'encryption' => 'tls',
//                'host' => 'smtp.gmail.com',
////                'host' => 'smtp.gmail.com',
//                'port' => '587',
//                'username' => 'mortux313@gmail.com',
////                'username' => 'service.get4lessghana@gmail.com',
//                'password' => "123456:P",
////                'password' => 'G4L@gh91',
//            ],
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp-mail.outlook.com',
                'username' => 'supp-pro-labz@outlook.com', // SMTP username
                'password' => 'AA2092019support-pro-labz',
                'port' => '587',
                'encryption' => 'tls',
//                'encryption' => 'tls',
                'streamOptions' => [
                    'ssl' => [
                        'verify_peer' => false,
                        'allow_self_signed' => true
                    ],
                ],
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
          'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'rules' => [
          ],
          ],
         */
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>/<id:\d+>/<id1:\d+>/' => '<controller>/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
            'displaySettings' => [
                DateControl::FORMAT_DATE => 'l dd-MM-yyyy',
                DateControl::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                DateControl::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
                DateControl::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*',
            'site/logout',
            'site/login',
            'site/error',
            'user/sign-up',
            'user/verify-account',
            'user/check-email',
            'user/forget-password',
            'user/create-new-password',
            'user/check-email-to-reset-password',
            'admin/*',
            'crypto-signals/share',
            'forex-signals/share',
            'user/prolabz-users',
            'site/landing',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
