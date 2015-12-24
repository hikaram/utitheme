<?php foreach($modelsNavigations as $modelNavigation) : ?>
<option value="<?=$modelNavigation->sort_no?>" <?php if($sort_no == $modelNavigation->sort_no) echo 'selected="selected"' ?>><?=$modelNavigation->label?></option>
<?php endforeach; ?>