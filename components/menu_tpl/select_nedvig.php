<option 
    value="<?=$nedvigcategory['id']?>"
        <?php if($nedvigcategory ['id'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $nedvigcategory['name']?>
</option>
 <?php if (isset($nedvigcategory['childs'])): ?>
    <ul>
    
        <?= $this->getMenunedHtml($nedvigcategory['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>


