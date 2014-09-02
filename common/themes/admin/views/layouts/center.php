<?php
/* @var $this \yii\web\View */

$this->beginContent('@frontend/views/layouts/main.php') ?>
    <div class="container" style="margin-top:60px;">
        <?php
        include '_content.php';
        ?>
    </div>
<?php $this->endContent() ?>