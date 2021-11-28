<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Taste */

$this->title = 'Добавление вкуса';
$this->params['breadcrumbs'][] = ['label' => 'Вкусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="taste-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
