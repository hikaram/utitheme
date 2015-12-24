<? if(empty($carousel->frames)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одной фрейма')?>
		<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameadd')) : ?>
			<?=Yii::t('app', 'Вы можете')?>
			<?=CHtml::link(Yii::t('app', 'добавить новый фрейм'), $this->createUrl('frame'))?>
		<? endif; ?>
	</div>
<? else : ?>
	<div class="portlet box yellow">
		<div class="portlet-title">
			<h3 class="caption"><i class="fa fa-desktop" style="margin-right: 10px;"></i> <?=CHtml::encode($carousel->lang->name)?></h3>
		</div>
		<div class="portlet-body">
			<div class="alert alert-warning h5">
				<? if ((bool)$settings->allowed_change_animation) : ?>
	                <div class="row margin-bottom-10">
	                    <div class="col-md-3"><?=CHtml::encode(Slidebars::model()->getAttributeLabel('slidebar_animation_types__id')); ?></div>
	                    <div class="col-md-9"><?=CHtml::encode($carousel->animation->lang->name); ?></div>
	                </div>
	            <? endif; ?>
				<div class="row margin-bottom-10">
					<div class="col-md-3"><?=CHtml::encode(Slidebars::model()->getAttributeLabel('delay_time')); ?></div>
					<div class="col-md-9"><?=sprintf('%.1f', $carousel->delay_time)?> <?=Yii::t('app', 'сек')?></div>
	            </div>
	            <div class="row margin-bottom-20">
					<div class="col-md-3"><?=Yii::t('app', 'Количество активных фреймов') ?></div>
					<div class="col-md-9"><?=count($carousel->active_frames)?></div>
	            </div>
				<? if ((Yii::app()->user->checkAccess('AdminSlidebarListPreview')) && (count($carousel->active_frames) > 0)) : ?>
					<?=CHtml::button(Yii::t('app', 'Просмотреть'), array('class' => 'btn blue-steel', 'onClick' => 'window.open("' . $this->createUrl('preview', array('id' => sha1($carousel->id))) . '", "' . CHtml::encode($carousel->lang->name) . '", "top=50, left=50, menubar=0, toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=1, width=1260, height=550")'))?>
				<? endif; ?>
				<? if (Yii::app()->user->checkAccess('AdminSlidebarListEdit')) : ?>
					<?=CHtml::button(Yii::t('app', 'Редактировать'), array('class' => 'btn green', 'onClick' => 'location.href="' . $this->createUrl('create', array('action' => 'edit', 'id' => sha1($carousel->id))) . '"'))?>
				<? endif; ?>
			</div>
			<div class="table-scrollable table-with-img">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?=Yii::t('app', 'Изображение'); ?></th>
							<th><?=CHtml::encode(SlidebarFramesLang::model()->getAttributeLabel('text')); ?></th>
							<th><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('link')); ?></th>
							<th><?=CHtml::encode(SlidebarFrames::model()->getAttributeLabel('status_id')); ?></th>
							<th><?=Yii::t('app', 'Позиция')?></th>
							<th><?=Yii::t('app', 'Действия')?></th>
						</tr>
					</thead>
					<tbody>
						<? foreach($carousel->frames as $key => $frame) :?>
							<tr>
								<td>
									<? if (($frame->attachment != NULL) && ($frame->attachment->secret_name != null)) :?>
										<div class="imgPreview">
											<?=CHtml::image(MSmarty::attachment_get_file_name($frame->attachment->secret_name, $frame->attachment->raw_name, $frame->attachment->file_ext, '_thumb_list', 'slidebar'), '', array('style' => 'height: 35px;')); ?>
											<div class="bigImg">
												<?=CHtml::image(MSmarty::attachment_get_file_name($frame->attachment->secret_name, $frame->attachment->raw_name, $frame->attachment->file_ext, '_thumb_list', 'slidebar'), '', array('style' => 'width: 200px;')); ?>
											</div>
										</div>
									<? endif; ?>
								</td>
								<td><?=CHtml::encode($frame->lang->text)?></td>
								<td><?=CHtml::encode($frame->link)?></td>
								<td>
									<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameactivate')) : ?>
										<div class="btn-group btn-group-sm btn-group-solid toggler-btns">
											<? if ($frame->status_id == SlidebarFrames::STATUS_NONACTIVE) : ?>
												<?=CHtml::linkButton(Yii::t('app', 'Вкл'),array(
													'submit' => array('frameactivate', 'id' => sha1($frame->id), 'status' => (int)TRUE),
													'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
													'confirm' => Yii::t('app', 'Активировать фрейм?'),
													'class' => 'btn grey no-margin'));  ?>
												<span class="btn red"><?=Yii::t('app', 'Выкл')?></span>
											<? elseif ($frame->status_id == SlidebarFrames::STATUS_ACTIVE) : ?>
												<span class="btn green no-margin">Вкл</span>
												<?=CHtml::linkButton(Yii::t('app', 'Выкл'),array(
													'submit' => array('frameactivate', 'id' => sha1($frame->id), 'status' => (int)FALSE),
													'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
													'confirm' => Yii::t('app', 'Деактивировать фрейм?'),
													'class' => 'btn grey no-margin'));  ?>
											<? endif; ?>
										</div>
									<? endif;?>
								</td>
								<td>
									<? if ((Yii::app()->user->checkAccess('AdminSlidebarListFramemove')) && ($frame->sort_no > $sorts['min'])) : ?>
										<div class="btn-group-vertical btn-group-solid">
											<? if ($frame->sort_no > $sorts['min']) : ?>
												<?=CHtml::linkButton('<i class="fa fa-angle-up"></i>',array(
													'submit' => array('framemove', 'id' => sha1($frame->id), 'direction' => 'up'),
													'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
													'class' => 'btn btn-xs grey'));  ?>
											<? endif; ?>
											<? if ($frame->sort_no < $sorts['max']) : ?>
												<?=CHtml::linkButton('<i class="fa fa-angle-down"></i>',array(
													'submit' => array('framemove', 'id' => sha1($frame->id), 'direction' => 'down'),
													'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
													'class' => 'btn btn-xs grey'));  ?>
											<? endif; ?>
										</div>
									<? endif; ?>
								</td>
								<td>
									<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameview')) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('frameview', array('id' => sha1($frame->id))), array('class' => 'btn blue-steel'))?>
									<? endif; ?>
									<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameedit')) : ?>
										<?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('frame', array('slide' => sha1($frame->slidebars__id), 'action' => 'edit', 'id' => sha1($frame->id))), array('class' => 'btn green-seagreen'))?>
									<? endif; ?>
									<? if (Yii::app()->user->checkAccess('AdminSlidebarListFramedelete')) : ?>
										<?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
											'submit' => array('framedelete', 'id' => sha1($frame->id)),
											'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
											'confirm' => Yii::t('app', 'Удалить фрейм?'),
											'class' => 'btn red',));  ?><br />
									<? endif; ?>
								</td>
							</tr>
						<? endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<? if (Yii::app()->user->checkAccess('AdminSlidebarListFrameadd')) : ?>
	    <?=CHtml::link(Yii::t('app', 'Добавить фрейм'), $this->createUrl('frame', array('slide' => sha1($carousel->id))));?>
	<? endif; ?>

<? endif; ?>