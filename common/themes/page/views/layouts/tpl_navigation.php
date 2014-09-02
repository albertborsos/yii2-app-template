<?php
    use albertborsos\yii2cms\components\DataProvider;;
    use kartik\nav\NavX;
    use yii\bootstrap\NavBar;

NavBar::begin(
    [
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => [
            'class' => 'container-fluid',
        ],
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]
);
$menuItems = DataProvider::renderItems();
echo NavX::widget(
    [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'activateParents' => true,
        'encodeLabels' => false,
        'items' => $menuItems,
    ]
);
NavBar::end();