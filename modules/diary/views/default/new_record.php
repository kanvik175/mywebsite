<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 05.05.19
 * Time: 12:07
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="diary-default-new-record">
    <?php $form = ActiveForm::begin([
        'action' => ['/diary/default/create'],
        'options' => ['class' => 'form-group']
    ]); ?>

    <?= $form->field($model, 'name')->input('text') ?>
    <?= $form->field($model, 'date')->input('date') ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
</div>
