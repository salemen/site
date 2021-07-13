<option 
    value="<?=$avtomarka['mark']?>"
        <?php if($avtomarka ['mark'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtomarka['mark']?>
</option>
 <?php if (isset($avtomarka['childs'])): ?>
    <ul>
    
        <?= $this->getMenuavtomarkaHtml($avtomarka['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







