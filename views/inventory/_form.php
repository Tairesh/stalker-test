<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'player_id')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Player::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'using_count')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
