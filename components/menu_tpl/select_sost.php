<option 
    value="<?=$sost['tip']?>"
        <?php if($sost ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $sost['tip']?>
</option>
 <?php if (isset($sost['childs'])): ?>
    <ul>
    
        <?= $this->getMenugodHtml($sost['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







