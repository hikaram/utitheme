<?php
$this->breadcrumbs[Yii::t('app', 'Управление почтой')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Просмотр письма')] = $this->createUrl('view', array('id' => $model->id));
?>
<div class="portlet box blue-steel">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Просмотр сообщения')?>
		</h3>
		<div class="tools">
			<?=CHtml::form('', 'post', array('style'=>'padding: 0; display: inline;', 'class'=>'mr5'))?>
                <?=CHtml::linkButton('<i class="fa fa-send"></i>', array(
                    'submit'=>array(
                        'send',
                        'id' => $model->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ),
                    'confirm' => Yii::t('app', 'Отправить письмо ?')
                ))?>
            <?=CHtml::endForm() ?>
			<?=CHtml::link('<i class="fa fa-pencil"></i>', $this->createUrl('update', array('id' => $model->id)), array('class' => 'mr5'))?>
			<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
				<?=CHtml::form('', 'post', array(
					'class'=>'',
					'style'=>'padding: 0;display: inline;',
				))?>
					<?=CHtml::linkButton('<i class="fa fa-times"></i>', array(
						'submit'=>array(
							'delete',
							'id' => $model->id,
						),
						'params'=>array(
							Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
						),
						'confirm' => Yii::t('app', 'Удалить письмо ?')
					))?>
				<?=CHtml::endForm() ?>
			<? endif; ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row mt20">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('id')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->id)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('from_name')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->from_name)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('from')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->from)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('to')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->to)?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('altbody')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=CHtml::encode($model->altbody)?></h4>
			</div>
		</div>
		<div class="row mb20">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=$model->getAttributeLabel('body')?></h4>
			</div>
			<div class="col-md-9">
				<h4><?=$model->body?></h4>
			</div>
		</div>
		<div class="row mb20">
			<div class="col-md-3 text-right">
				<h4 class="h4-label"><?=CHtml::encode(Yii::t('app', 'Прикрепленные файлы'));?></h4>
			</div>
        <div class="col-md-9">
            <?php foreach ($attachments as $attachment) : ?>
                <h4>
                    <?=CHtml::encode($attachment->file_name); ?>
                </h4>
            <? endforeach; ?>
        </div>
    </tr>
	</div>
</div>
<a href="<?=$this->createUrl('index')?>"><?=Yii::t('app', 'Вернуться к списку сообщений')?></a>