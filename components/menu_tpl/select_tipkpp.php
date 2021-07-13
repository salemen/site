<option 
    value="<?=$tipkpp['tip']?>"
        <?php if($tipkpp ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $tipkpp['tip']?>
</option>
 <?php if (isset($tipkpp['childs'])): ?>
    <ul>
    
        <?= $this->getMenugodHtml($god['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







