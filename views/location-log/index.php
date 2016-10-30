<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocationLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Location Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?= Html::a(Yii::t('app', 'Create Location Log'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'player_id',
            [
                'attribute' => 'player',
                'value' => function ($row) {
                    return Html::a($row['player']['name'], ['player/view', 'id' => $row['player_id']]);
                },
                'format' => 'raw',
            ],
            'location_id',
            'updated_at:date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ])?>
    <?php Pjax::end(); ?>
</div>
