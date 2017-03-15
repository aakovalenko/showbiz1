<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;
use backend\models\Artist;
use backend\models\Place;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfomance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfomance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'date')->widget(
		DatePicker::className(), [
		// inline too, not bad
		'inline' => false,
		// modify template for custom rendering
		//'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'dd-M-yyyy'
		]
	]);?>

	<?= $form->field($model, 'artist_id')->dropDownList(
		ArrayHelper::map(Artist::find()->all(),'artist_id', 'first_name'),
		['prompt' => 'Select the artist']
	) ?>

	<?= $form->field($model, 'place_id')->dropDownList(
		ArrayHelper::map(Place::find()->all(),'place_id', 'name'),
		['prompt' => 'Select place!']
	) ?>

    <?= $form->field($model, 'perfomance_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
