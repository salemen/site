<option 
    value="<?=$viddoma['vid']?>"
        <?php if($viddoma ['vid'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $viddoma['vid']?>
</option>
 <?php if (isset($viddoma['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($viddoma['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>
