<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$main = array_merge(
    require __DIR__ . '/main-local.php'
);

if (!YII_ENV_TEST) {
    $main['modules']['gii']['generators'] = [
        'whcCrud' => [
            'class' => 'backend\components\gii\crud\Generator',
            'templates' => [
                'whcCrud' => '@backend/components/gii/crud/whc',
            ]
        ],
        'whcModel' => [
            'class' => 'backend\components\gii\model\Generator',
            'templates' => [
                'whcModel' => '@backend/components/gii/model/whc',
            ]
        ],
    ];
}

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => array_merge(
        $main['modules'],
        ['v1' => [
            'class' => 'backend\modules\v1\Module'
        ]]
    ),
    'components' => [
        'request' => [
            'enableCsrfValidation' => false,
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
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => \yii\rest\UrlRule::class, 'controller' => ['thesis' => 'v1/thesis/thesis']]
            ],
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
        ]
    ],
    'params' => $params,
];