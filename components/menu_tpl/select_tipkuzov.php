<option 
    value="<?=$tipkuzov['tip']?>"
        <?php if($tipkuzov ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $tipkuzov['tip']?>
</option>
 <?php if (isset($tipkuzov['childs'])): ?>
    <ul>
    
        <?= $this->getMenutipdvigHtml($tipkuzov['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






