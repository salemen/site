<?php
/**
 * @var yiiwebView $this
 * @var yiidbActiveQuery $messagesQuery
 */
?>
<?= yii\widgets\ListView::widget([
    'itemView' => '_row',
    'layout' => '{items}',
    'dataProvider' => new yii\data\ActiveDataProvider([
        'query' => $messagesQuery,
        'pagination' => false
    ])
]) ?>
