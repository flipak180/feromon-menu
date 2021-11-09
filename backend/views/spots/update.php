<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Spot */

$this->title = 'Редактирование заведения: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="spot-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
