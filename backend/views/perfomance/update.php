<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfomance */

$this->title = 'Update Perfomance: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfomances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->perfomance_di]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfomance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
