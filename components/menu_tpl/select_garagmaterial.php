<option 
    value="<?=$garagmaterial['tip']?>"
        <?php if($garagmaterial ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $garagmaterial['tip']?>
</option>
 <?php if (isset($garagmaterial['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($garagmaterial['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






