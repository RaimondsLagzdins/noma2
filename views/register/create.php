<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\USER */

$this->title = 'Reģistrācija';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $i = 0;
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {

    } ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
