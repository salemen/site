<option 
    value="<?=$ochrana['tip']?>"
        <?php if($ochrana ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $ochrana['tip']?>
</option>
 <?php if (isset($ochrana['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($ochrana['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>








