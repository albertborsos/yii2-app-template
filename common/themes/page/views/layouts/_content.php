<?php
    use albertborsos\yii2lib\helpers\Widgets;
    use yii\widgets\Breadcrumbs;

/* @var $this yii/base/View */
?>

<?= Widgets::showBreadcrumbs($this->context->breadcrumbs) ?>

<?= Widgets::showAlerts() ?>

<?= $content ?>