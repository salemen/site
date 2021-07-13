<option 
    value="<?=$tipdoma['tip']?>"
        <?php if($tipdoma ['tip'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $tipdoma['tip']?>
</option>
 <?php if (isset($tipdoma['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($tipdoma['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>







