<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Spot */

$this->title = 'Добавление заведения';
$this->params['breadcrumbs'][] = ['label' => 'Заведения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="spot-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
