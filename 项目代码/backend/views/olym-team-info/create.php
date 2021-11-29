<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OlymTeamInfo */

$this->title = 'Create Olym Team Info';
$this->params['breadcrumbs'][] = ['label' => 'Olym Team Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="olym-team-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
