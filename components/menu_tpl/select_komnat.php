<option 
    value="<?=$kolichestvo_komnat['number']?>"
        <?php if($kolichestvo_komnat ['number'] == $this->model->parent_id) echo 'selected'?>
        
            ><?=$tab . $kolichestvo_komnat['number']?>
</option>
 <?php if (isset($kolichestvo_komnat['childs'])): ?>
    <ul>
    
        <?= $this->getMenukvartiriHtml($nedvigkvartiri['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>




