<option 
    value="<?=$typebiznes['type']?>"
        <?php if($typebiznes ['type'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $typebiznes['type']?>
</option>
 <?php if (isset($typebiznes['childs'])): ?>
    <ul>
    
        <?= $this->getMenutypebiznesHtml($typebiznes['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






