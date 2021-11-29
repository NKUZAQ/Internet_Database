<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OlymComment */

$this->title = 'Create Olym Comment';
$this->params['breadcrumbs'][] = ['label' => 'Olym Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="olym-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
