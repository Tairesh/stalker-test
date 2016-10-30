<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LocationLog */

$this->title = Yii::t('app', 'Create Location Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
