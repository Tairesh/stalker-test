<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocationLog */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Location Log',
]) . $model->player_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->player_id, 'url' => ['view', 'player_id' => $model->player_id, 'location_id' => $model->location_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="location-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
