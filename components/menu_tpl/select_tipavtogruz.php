<option 
    value="<?=$avtogruztip['tip']?>"
        <?php if($avtogruztip ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $avtogruztip['tip']?>
</option>
 <?php if (isset($avtogruztip['childs'])): ?>
    <ul>
    
        <?= $this->getMenuatipavtogruzHtml($avtogruztip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







