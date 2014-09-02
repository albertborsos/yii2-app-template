<?php

$config = [
    'components' => [
        'urlManager' => [
            'class'=>'yii\web\UrlManager', //Set class
            'baseUrl' => 'http://localhost/dev/yii2-app-template',
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
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
}

return $config;
