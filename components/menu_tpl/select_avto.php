<option 
    value="<?=$avtocategory['id']?>"
        <?php if($avtocategory ['id'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtocategory['name']?>
</option>
 <?php if (isset($avtocategory['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtoHtml($avtocategory['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>

