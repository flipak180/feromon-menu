<?php

use common\components\Helper;
use common\models\Category;
use common\models\Spot;
use kartik\editors\Summernote;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'image_field')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'browseLabel' => 'Выбрать',
                    'showPreview' => false,
                    'showUpload' => false,
                    'showRemove' => false,
                ]
            ]) ?>
            <?php if ($model->image): ?>
                <div class="image-preview">
                    <?= Helper::thumb($model->image, 100, 100) ?>
                    <p><?= Html::a('Удалить', ['delete-image', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger']) ?></p>
                </div>
            <?php endif ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image2_field')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'browseLabel' => 'Выбрать',
                    'showPreview' => false,
                    'showUpload' => false,
                    'showRemove' => false,
                ]
            ]) ?>
            <?php if ($model->image2): ?>
                <div class="image-preview">
                    <?= Helper::thumb($model->image2, 100, 100) ?>
                    <p><?= Html::a('Удалить', ['delete-image2', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger']) ?></p>
                </div>
            <?php endif ?>
        </div>
    </div>
    <?= $form->field($model, 'description')->widget(Summernote::class, [
        'autoFormatCode' => false,
    ]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::getList(), 'id', function($item) {
            return $item->getPath();
        }),
        'options' => ['placeholder' => 'Выберите категорию'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <hr>
    <div class="form-group spots-info">
        <?php foreach (Spot::getList() as $spot): ?>
            <div>
                <?= Html::activeCheckbox($model, 'spots_field['.$spot->id.'][active]', ['label' => $spot->title]) ?>
                <?= Html::activeTextInput($model, 'spots_field['.$spot->id.'][price]', ['class' => 'form-control']) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
