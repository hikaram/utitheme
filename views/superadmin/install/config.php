<?php
echo '<?php';
?>

return 
array(
'superadmin',
'superadmin/modules/config',
'admin',
<?php foreach($modelsModules as $model) : ?>
'<?=$model->path?>',
<?php endforeach; ?>
);

