<?php
/**
 * @var yiiwebView $this
 * @var appmodelsMessage $message
 * @var yiidbActiveQuery $messagesQuery
 */
?>
<?php yii\widgets\Pjax::begin([
    'id' => 'list-messages',
    'enablePushState' => false,
    'formSelector' => false,
    'linkSelector' => false
]) ?>
<?= $this->render('_list', compact('messagesQuery')) ?>
<?php yii\widgets\Pjax::end() ?>
<?php yii\widgets\ActiveForm::begin(['options' => ['class' => 'pjax-form']]) ?>
<?= yii\bootstrap\Html::activeTextarea($message, 'text') ?>
<?= yii\helpers\Html::submitButton('Отправить') ?>
<?php yii\widgets\ActiveForm::end() ?>
