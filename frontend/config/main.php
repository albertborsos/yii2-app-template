<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'hu',
    'homeUrl' => ['/'],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'users'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'c00k13V',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable' => 'auth_rule',
            'defaultRoles' => ['guest'],
        ],
        'user' => [
            'identityClass' => 'albertborsos\yii2user\models\Users',
            'enableAutoLogin' => false,
            'loginUrl' => ['/users/login'],
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
        'urlManager' => [
            'class'=>'yii\web\UrlManager', //Set class
            'baseUrl' => 'http://www.borsosalbert.hu',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''     => 'cms/default/blog',
                'blog' => 'cms/default/blog',

                'page/redirecttohome/from/<from:.*>' => 'cms/default/redirecttohome',
                'page/redirecttohome'                => 'cms/default/redirecttohome',

                'blog/<title:.*?>-<id:\d+>.html'     => 'cms/default/index',
                '<title:.*?>-<id:\d+>.html'          => 'cms/default/index',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'errorHandler' => [
            'errorAction' => '/cms/default/error',
        ],
        'view' => [
            'theme' => [
                'pathMap' =>[
                    '@app/views' => [
                        '@common/themes/admin/views',
                        '@common/themes/page/views',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'users' => [
            'class' => 'albertborsos\yii2user\Module',
        ],
        'cms' => [
            'class' => 'albertborsos\yii2cms\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ]
    ],
    'params' => $params,
];
