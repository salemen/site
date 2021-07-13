<option 
    value="<?=$avtomototip['tip']?>"
        <?php if($avtomototip ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtomototip['tip']?>
</option>
 <?php if (isset($avtomototip['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtomototipHtml($avtomototip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







