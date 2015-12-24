<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Валюты'] = $this->createUrl('index');
$this->breadcrumbs['Редактирование валюты №' . $model->id] = $this->createUrl('update', array('id' => $model->id));
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>