<option 
    value="<?=$operaciya['tip']?>"
        <?php if($operaciya ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $operaciya['tip']?>
</option>
 <?php if (isset($operaciya['childs'])): ?>
    <ul>
    
        <?= $this->getMenunedHtml($operaciya['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>


