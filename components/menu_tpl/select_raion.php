<option 
    value="<?=$raion['id']?>"
        <?php if($raion ['id'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $raion['raion']?>
</option>
 <?php if (isset($raion['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($raion['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






