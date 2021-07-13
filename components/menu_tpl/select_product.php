
<option 
    
    value="<?=$category['id']?>"
        <?php if($category ['id'] == $this->model->category_id) echo 'selected'?>
    
         <?php if($category['id'] == 1) echo ' style="display: none" '?>
		  <?php if($category['id'] == 178) echo ' style="display: none" '?>
		   <?php if($category['id'] == 179) echo ' style="display: none" '?>
		   <?php if($category['id'] == 180) echo ' style="display: none" '?>
		    <?php if($category['id'] == 181) echo ' style="display: none" '?>
			 <?php if($category['id'] == 182) echo ' style="display: none" '?>
			  <?php if($category['id'] == 183) echo ' style="display: none" '?>
			   <?php if($category['id'] == 184) echo ' style="display: none" '?>
			    <?php if($category['id'] == 185) echo ' style="display: none" '?>
				 <?php if($category['id'] == 186) echo ' style="display: none" '?>
				  <?php if($category['id'] == 187) echo ' style="display: none" '?>
				   <?php if($category['id'] == 188) echo ' style="display: none" '?>
				    <?php if($category['id'] == 189) echo ' style="display: none" '?>
					 <?php if($category['id'] == 190) echo ' style="display: none" '?>
					  <?php if($category['id'] == 191) echo ' style="display: none" '?>
					   <?php if($category['id'] == 192) echo ' style="display: none" '?>
         <?php if($category['id'] == 2) echo ' disabled'?>
         <?php if($category['id'] == 3) echo ' style="display: none"'?>
         <?php if($category['id'] == 4) echo ' style="display: none"'?>
         <?php if($category['id'] == 5) echo ' disabled'?>
         <?php if($category['id'] == 6) echo ' disabled'?>
         <?php if($category['id'] == 7) echo ' disabled'?>
         <?php if($category['id'] == 8) echo ' disabled'?>
		 <?php if($category['id'] == 63) echo ' disabled'?>
		 <?php if($category['id'] == 11) echo ' style="display: none"'?>
		 <?php if($category['id'] == 19) echo ' disabled'?>
         <?php if($category['id'] == 20) echo ' disabled'?>
         <?php if($category['id'] == 21) echo ' disabled'?>
         <?php if($category['id'] == 22) echo ' disabled'?>
         <?php if($category['id'] == 23) echo ' disabled'?>
         <?php if($category['id'] == 55) echo ' disabled'?>
         <?php if($category['id'] == 56) echo ' disabled'?>
         <?php if($category['id'] == 8) echo ' disabled'?>
		 <?php if($category['id'] == 86) echo ' disabled'?>
		 <?php if($category['id'] == 87) echo ' disabled'?>
		 <?php if($category['id'] == 24) echo ' disabled '?>
         <?php if($category['id'] == 29) echo ' disabled'?>
         <?php if($category['id'] == 30) echo ' disabled'?>
         <?php if($category['id'] == 36) echo ' disabled'?>
         <?php if($category['id'] == 65) echo ' disabled'?>
         <?php if($category['id'] == 70) echo ' disabled'?>
        
    
            ><?=$tab . $category['name']?>
</option>
 <?php if (isset($category['childs'])||$category['id']==1):{
    
 }?>

    <ul>
       
        <?= $this->getMenuHtml($category['childs'], $tab . '−');  ?>
    </ul>
    <?php endif; ?>
