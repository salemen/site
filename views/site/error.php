<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
  
  <div id="brands_products1">
    <center><p>
     <a href="<?= \yii\helpers\Url::home() ?>"> <span><img class="animate1" src="/images/404/404-error.gif" alt=""></span></a>
									  
    </p></center>
   </div>
   
    <div id="brands_products2">
    <center><p>
     <a href="<?= \yii\helpers\Url::home() ?>"> <span><img class="animate1" src="/images/404/404.png" alt=""></span></a>
									  
    </p></center>
   </div>


</div>
