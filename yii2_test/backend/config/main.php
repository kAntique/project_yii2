<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')

);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
      'company' => [
            'class' => 'backend\modules\company\Module',
        ],
      'customer' => [
              'class' => 'backend\modules\customer\Module',
          ],

          'receipt' => [
            'class' => 'backend\modules\receipt\Module',
        ],
        'doing' => [
            'class' => 'backend\modules\receipt\doing\Module',
        ],
        'detail' => [
            'class' => 'backend\modules\detail\Module',
        ],
        'quotation' => [
           'class' => 'backend\modules\quotation\Module',
       ],
       'gridview' =>  [
           'class' => '\kartik\grid\Module'
           
       ],

       'pdfjs' => [
       'class' => '\yii2assets\pdfjs\Module',
        ],

   ],


    'components' => [
      'view' => [
       'theme' => [
           'pathMap' => [
              '@app/views' => '@backend/themes/themes_doc_manage/views'
           ],
       ],

  ],



        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

    ],

    'params' => $params,
];
