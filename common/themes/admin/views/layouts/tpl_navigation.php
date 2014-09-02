<?php
    use albertborsos\yii2lib\helpers\Glyph;
    use albertborsos\yii2lib\helpers\S;
    use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin(
    [
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]
);
$menuItems = [
    ['label' => '<span class="glyphicon glyphicon-home"></span> Kezdőlap', 'url' => ['/']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Glyph::icon(Glyph::ICON_PLUS) . ' Regisztráció', 'url' => ['/users/register']];
    $menuItems[] = ['label' => Glyph::icon(Glyph::ICON_LOG_IN) . ' Bejelentkezés', 'url' => ['/users/login']];
} else {
    $menuItems[] = [
        'label' => Glyph::icon(Glyph::ICON_BOOK) . ' Tartalomkezelő',
        'items' => [
            ['label' => /*Glyph::icon(Glyph::ICON_FLAG) . */' Nyelvek', 'url' => ['/cms/languages/index']],
            ['label' => /*Glyph::icon(Glyph::ICON_FLAG) . */' Menüpontok', 'url' => ['/cms/posts/menu']],
            ['label' => /*Glyph::icon(Glyph::ICON_FLAG) . */' Blog Bejegyzések', 'url' => ['/cms/posts/blog']],
            ['label' => /*Glyph::icon(Glyph::ICON_FLAG) . */' Galéria', 'url' => ['/cms/galleries/index']],
            ['label' => /*Glyph::icon(Glyph::ICON_FLAG) . */' Téma Szerkesztő', 'url' => ['/cms/default/themeeditor']],
        ],
        'url' => '#',
        'linkOptions' => [
            'class' => 'dropdown-toggle',
            'data-toggle' => 'dropdown',
        ],
    ];
    $menuItems[] = [
        'label' => Glyph::icon(Glyph::ICON_USER) . ' ' . Yii::$app->user->identity->getFullname(),
        'items' => [
            ['label' => Glyph::icon(Glyph::ICON_FILE) . ' Profilom', 'url' => ['/users/profile']],
            ['label' => Glyph::icon(Glyph::ICON_COG) . ' Beállítások', 'url' => ['/users/settings']],
            ['label' => Glyph::icon(Glyph::ICON_COG) . ' Jogosultságok', 'url' => ['/users/rights/admin']],
            ['label' => '', 'options' => ['class' => 'divider']],
            ['label' => Glyph::icon(Glyph::ICON_LOG_OUT) . ' Kijelentkezés', 'url' => ['/users/logout'], 'linkOptions' => ['data-method' => 'post',]],
        ],
        'url' => '#',
        'linkOptions' => [
            'class' => 'dropdown-toggle',
            'data-toggle' => 'dropdown',
        ],
    ];
}
echo Nav::widget(
    [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]
);
NavBar::end();