<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Athletes;

?>
<h1>Athletes</h1>
<ul>
<?php foreach ($athletes as $athlete): ?>
    <li>
        <?= Html::encode("{$athlete->id} ({$athlete->name})") ?>:
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>