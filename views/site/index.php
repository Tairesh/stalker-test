<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Test');

?>

<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title?></h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?=Yii::t('app', 'Players')?></h2>
                <p>
                    <?=Html::a(Yii::t('app', 'Players list'), ['player/index'], ['class'=>'btn btn-default'])?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2><?=Yii::t('app', 'Inventory')?></h2>
                <p>
                    <?=Html::a(Yii::t('app', 'Inventory'), ['inventory/index'], ['class'=>'btn btn-default'])?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2><?=Yii::t('app', 'Locations')?></h2>
                <p>
                    <?=Html::a(Yii::t('app', 'Location log'), ['location-log/index'], ['class'=>'btn btn-default'])?>
                </p>
            </div>
        </div>

    </div>
</div>
