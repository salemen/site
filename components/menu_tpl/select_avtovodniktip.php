<option 
    value="<?=$avtovodniktip['tip']?>"
        <?php if($avtovodniktip ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtovodniktip['tip']?>
</option>
 <?php if (isset($avtovodniktip['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtovodniktipHtml($avtovodniktip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







