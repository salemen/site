<option 
    value="<?=$vidnedvig['vid']?>"
        <?php if($vidnedvig ['vid'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $vidnedvig['vid']?>
</option>
 <?php if (isset($vidnedvig['childs'])): ?>
    <ul>
    
        <?= $this->getMenuvidnedvigHtml($vidnedvig['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>






