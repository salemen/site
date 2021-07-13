<option 
    value="<?=$oblast['id']?>"
        
            ><?=$tab . $oblast['name']?>
</option>
 <?php if (isset($oblast['childs'])): ?>
    <ul>
    
        <?= $this->getMenuoblastHtml($oblast['childs'], $tab . '--');  ?>
    </ul>
    <?php endif; ?>




