<?php
/* @var $this \yii\web\View */

$this->beginContent('@frontend/views/layouts/main.php') ?>
    <div class="container-fluid" style="padding-top: 70px;">
        <?php
        include '_content.php';
        ?>
    </div>
<?php $this->endContent() ?>