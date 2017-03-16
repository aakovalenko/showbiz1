<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfomance */


$this->title = 'Perfomance';
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="perfomance-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'perfomance_di',
            'name',
            'date',
            'artist.first_name',
            'place.name',

            'perfomance_status',
        ],
    ]) ?>

</div>
