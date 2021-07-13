<option 
    value="<?=$avtospectip['type']?>"
        <?php if($avtospectip ['type'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtospectip['type']?>
</option>
 <?php if (isset($avtospectip['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtospectipHtml($avtospectip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







