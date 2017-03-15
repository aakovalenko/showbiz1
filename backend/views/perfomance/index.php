<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerfomanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfomances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfomance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perfomance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'perfomance_di',
            'name',
            'date',
            'artist_id',
            'place_id',
            // 'perfomance_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
