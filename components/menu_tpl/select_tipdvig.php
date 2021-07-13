<option 
    value="<?=$tipdvig['tip']?>"
        <?php if($tipdvig ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $tipdvig['tip']?>
</option>
 <?php if (isset($tipdvig['childs'])): ?>
    <ul>
    
        <?= $this->getMenutipdvigHtml($tipdvig['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






