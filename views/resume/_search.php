<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResumeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resume-search">
    <?php //var_dump($model); die;?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'spec') ?>

    <?= $form->field($model, 'salary') ?>

    <?php  echo $form->field($model, 'experience') ?>

    <?php  echo $form->field($model, 'age') ?>

    <?php  echo $form->field($model, 'city') ?>

    <?php  echo $form->field($model, 'last') ?>

    <?php  echo $form->field($model, 'description') ?>

    <?php  echo $form->field($model, 'userid') ?>

    <?php  echo $form->field($model, 'otch') ?>

    <?php  echo $form->field($model, 'fam') ?>

    <?php  echo $form->field($model, 'name') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
