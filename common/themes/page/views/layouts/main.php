<?php
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use frontend\assets\AppAsset;
    use frontend\widgets\Alert;

    /**
     * @var \yii\web\View $this
     * @var string $content
     */
    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <script type="text/javascript">
        var baseurl = '<?= Yii::$app->urlManager->getBaseUrl() ?>';
    </script>
    <link rel="stylesheet" href="<?= Yii::$app->urlManager->getBaseUrl() ?>/css/site.css" />
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-9">
                <?php include 'tpl_navigation.php'; ?>
                <?= $content ?>
        </div>
        <div class="col-md-3" id="sidebar">
            <div class="well">
                <?php
                    if (Yii::$app->user->isGuest){
                        // nincs belépve
                        echo \yii\helpers\Html::a('Belépés', ['/users/login'], ['class' => 'btn btn-success btn-block']);
                        echo \yii\helpers\Html::a('Regisztráció', ['/users/register'], ['class' => 'btn btn-info btn-block']);
                    }else{
                        ?>
                        <legend>Bejelentkezve:</legend>
                        <ul>
                            <li>Név: <b><i><?= Yii::$app->user->identity->getFullname(); ?></i></b></li>
                        </ul>
                        <?php
                        if (Yii::$app->user->can('admin')){
                            echo \yii\helpers\Html::a('Tartalomkezelés', ['/cms/posts/blog'], ['class' => 'btn btn-default btn-block']);
                        }
                        echo \yii\helpers\Html::a('Fiókom', ['/users/profile'], ['class' => 'btn btn-info btn-block']);
                        echo \yii\helpers\Html::a('Kijelentkezés', ['/users/logout'], ['class' => 'btn btn-danger btn-block', 'data-method' => 'post']);
                    }
                ?>
            </div>
            <?php include 'tpl_sidebar.php'; ?>
        </div>
    </div>
    <?php include 'tpl_footer.php'; ?>
</div>


<?php $this->endBody() ?>
</body>
<!-- Google Analitcs -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= \albertborsos\yii2lib\helpers\S::get(Yii::$app->params, 'analyticsID', 'N/A') ?>', 'auto');
    ga('send', 'pageview');

</script>
<!-- /Google Analitcs -->
</html>
<?php $this->endPage() ?>
