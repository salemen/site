<option 
    value="<?=$kommtip['tip']?>"
        <?php if($kommtip ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $kommtip['tip']?>
</option>
 <?php if (isset($kommtip['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($kommtip['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>


