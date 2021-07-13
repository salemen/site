<script>
$(function(){
   $('select[name="raion"]').change(function(){
      alert($('select[name="raion"]').val());
   });
});

</script>

<?php

 if (isset ($_POST['id']) && !empty($_POST['id'])){
    $id = intval($_POST['id']);
    $query = goroda::find()->where(['id_oblast'=> $id])->all();
    echo '<select name="raion">';
    while ($row = mysql_fetch_array($query)) {
       echo "<option>{$row->name}</option>";
    } 
    echo '</select>'; 
 }
 else {
       echo 'нет';
    }
    

