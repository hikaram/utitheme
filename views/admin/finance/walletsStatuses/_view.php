<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> Просмотр статуса операции №<?echo $data->id;?>
		</h3>
		<div class="tools">
			<a href="<?=$this->createUrl('update', array('id' => $data->id))?>"><i class="fa fa-pencil"></i></a>
			<?=CHtml::form('', 'post', array('style'=>'padding: 0; display: inline; margin-left: 5px;'))?>
				<?=CHtml::linkButton('<i class="fa fa-times"></i>', array(
					'submit'=>array(
						'delete',
						'id' => $data->id,
					),
					'params'=>array(
						Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
					),
					'confirm'=>"Удалить данный статус кошелька? Данное действие может привести к невозможности выполнять финаносовые операции."
				))?>
			<?=CHtml::endForm() ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row" style="margin-top: 30px;">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->alias); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->title); ?></h4>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_at); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_by); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('created_ip')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->created_ip); ?></h4>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #ddd; margin: 30px 0;"></div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_at); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_by); ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" style="text-align: right; margin-bottom: 30px;">
				<h4 class="h4-label"><?php echo CHtml::encode($data->getAttributeLabel('modified_ip')); ?></h4>
			</div>
			<div class="col-md-9">
				<h4><?php echo CHtml::encode($data->modified_ip); ?></h4>
			</div>
		</div>
	</div>
</div>
<a href="<?=$this->createUrl('index')?>">Вернуться к списку статусов</a>