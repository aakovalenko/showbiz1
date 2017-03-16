<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

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
            [
				'attribute' => 'date',
				'value' => 'date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
					'model' => $searchModel,
					'attribute' => 'date',
					'clientOptions' => [
						'autoclose' => true,
						'format' => 'yyyy-mm-dd'
                        ]
					])
            ],

            //'artist_id',
            [
              'attribute' => 'artist_id',
                'value' => 'artist.first_name'
            ],

            //'place_id',
			[
				'attribute' => 'place_id',
				'value' => 'place.name'
			],

            //'perfomance_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
