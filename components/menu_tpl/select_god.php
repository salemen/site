<option 
    value="<?=$god['tip']?>"
        <?php if($god ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $god['tip']?>
</option>
 <?php if (isset($god['childs'])): ?>
    <ul>
    
        <?= $this->getMenugodHtml($god['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







