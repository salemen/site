<?php


use yii\helpers\Url;

$this->title = 'Ваши объявления на сайте';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

::-webkit-input-placeholder{
  text-align:center;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div>
    <br>
    
                               <center>
                                   <font face="comic sans ms" >Категории с моими объявлениями </font>
                               </center>
     
       
          <center>
                  <a href="<?= Url::to(['/admin/avtoleg/index']) ?>" class="btn btn-default"><font face="comic sans ms" ><i class="fa fa-truck"></i> АвтоТехника и Автозапчасти</font></a>                       
                 <a href="<?= Url::to(['nedvigkvartiri/index']) ?>" class="btn btn-default"><font face="comic sans ms" ><i class="fa fa-hospital-o"></i> Недвижимость</font></a> 
                
                 <a href="<?= Url::to(['product/index']) ?>" class="btn btn-default"><font face="comic sans ms" ><i class="fa fa-pencil"></i> Другие Объявления</font></a> 
                                    </center>
    
    
<br><br>
   
   <?php
    $username = Yii::$app->user->identity['username'];
   
   ?>
   
   
 <form id="komment">   
<!-- <form method="get" action="<?= Url::to(['/komment/komment' ]) ?>"> -->
    <div class="komment">   
    <center><p><h5><span id='userlogin'><?= $username ?></span>, оставте Ваш отзыв о сайте</h5></p>
  <?php //$login = $users->username ?>
    <p><textarea placeholder = "напишите отзыв о сайте или Ваше пожелание" style="max-width:380px;height:60px;resize:vertical" maxlength="150" name="komment" id ="kom"></textarea></p>
	<!-- <label><h5><input type="radio" name="freq"  checked id="mobil"> <span>мобильная версия сайта</span></h5></label>
	<label><h5><input type="radio" name="freq"   id="dekstop"> <span>версия для компьютера</span></h5></label> -->
	
	
 <p> <input type = "submit" class="btn btn-default" value="Оставить отзыв" id="message"> </p></center>
    </div>
</form>               
<script type="text/javascript">
$(document ).ready(function() {
    $("#message").click(function(){
        $.ajax({
            type: 'POST',
            url: '/komment/komment',
            dataType: 'text',
            data: {
                komment:$('#kom').val(),
				login:$('#userlogin').text(),
                _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
            },
            success: function(rate) {
                alert("Спасибо за отзыв.");
            },
            error: function (exception) {
                console.log(exception);
            }
        });
      
    });
});                      
</script>   	

</div>

