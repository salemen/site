<option 
    value="<?=$avtokomplekttip['tip']?>"
        <?php if($avtokomplekttip ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtokomplekttip['tip']?>
</option>
 <?php if (isset($avtokomplekttip['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtokomplekttipHtml($avtokomplekttip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







