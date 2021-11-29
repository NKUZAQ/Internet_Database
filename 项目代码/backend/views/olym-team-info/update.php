<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OlymTeamInfo */

$this->title = 'Update Olym Team Info: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Olym Team Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->stu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="olym-team-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
