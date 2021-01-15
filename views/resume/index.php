<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php   echo $this->render('_search', ['model' => $model]); ?>
           
    <?php  ?>



               
            </div>




</div>
