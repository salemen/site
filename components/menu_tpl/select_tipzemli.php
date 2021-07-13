<option 
    value="<?=$tipzemli['tip']?>"
        <?php if($tipzemli ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $tipzemli['tip']?>
</option>
 <?php if (isset($tipzemli['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($tipzemli['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>




