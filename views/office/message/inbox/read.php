<div id="tabs" class="row inbox">
	<div class="col-md-2">
		<? $this->widget('application.modules.office.modules.message.widgets.MessagesNavigationWidget'); ?>
	</div>

    <div class="col-md-10">
        
        <?php if(Yii::app()->user->hasFlash('success')):?>
            <div id="alert-success" class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        
        <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultIncoming')) : ?>
        <div id="tabs-1">
            <div class="inbox-header">
                <h1 class="pull-left"><?=Yii::t('app', 'Просмотр сообщения')?></h1>
                <form class="form-inline pull-right" action="">
                    <div class="input-group input-medium">
                    </div>
                </form>
            </div>

			<div class="inbox-content">

				<div class="inbox-header inbox-view-header">
					<h1 class="pull-left">
						<?= CHtml::encode($result[0]['title']) ?> <a href="<?=Yii::app()->createUrl('/office/message/inbox')?>"><?=Yii::t('app', 'Входящие')?> </a>
					</h1>
					<div class="pull-right">
						
					</div>
				</div>
    
				<div class="inbox-view-info">
					<div class="row">
						<div class="col-md-7">
							<? if($result[0]['sender_image_secret_name'] != null) : ?>
								<?=CHtml::image(MSmarty::attachment_get_file_name($result[0]['sender_image_secret_name'], $result[0]['sender_image_raw_name'], $result[0]['sender_image_file_ext'], '_office_profile', 'office_photo'), '', array('height'=>'29px')); ?>
							<? else : ?>
								<i class="fa fa-user inbox-small-user"></i>
							<? endif; ?>
							<span class="bold">
								<? if (!(bool)$result[0]['is_admin_sender']) : ?>
									<?=CHtml::encode($result[0]['sender_name']) ?>
										<? else : ?>
									<?=Yii::t('app', 'Администрация')?>
								<? endif; ?>
							</span>
							
							кому: <span id="recipient" class="bold">
							
							<? if ($result[0]['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_TOALL) : ?>        <?=Yii::t('app', 'Всем пользователям')?>
											<? elseif ($result[0]['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_ADMIN) : ?>    <?=Yii::t('app', 'Администрации')?>
											<? elseif ($result[0]['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_FIRSTLINE) : ?><?=Yii::t('app', 'Первой линии')?>
											<? elseif ($result[0]['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_STRUCTURE) : ?><?=Yii::t('app', 'Моей структуре')?>
											<? else : ?><?=$result[0]['recipient_name'].' ('.$result[0]['recipient_login'].')'?>
											<? endif; ?>
							</span>				
							
						<?=MSmarty::date_format($result[0]['date'], 'd.m.Y H:i')?>
						</div>
						<div class="col-md-5 inbox-info-btn">
							<div class="btn-group">
								<button class="btn blue reply-btn" onClick="window.location = app.createAbsoluteUrl('office/message/default/create/guid/<?=$result[0]["sender_id"]?>/messageId/<?=$result[0]["id"]?>')"><i class="fa fa-reply"></i> <?=Yii::t('app', 'Ответить')?> </button>
								<button data-toggle="dropdown" class="btn blue dropdown-toggle">
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu pull-right">

									<? if ($this->_checkAccessForResend($result[0])) : ?>
										<li>
											<a href="<?=Yii::app()->createUrl('/office/message/default/create/messageId/' . $result[0]['id'])?>">
											<i class="fa fa-reply reply-btn"></i> <?=Yii::t('app', 'Переслать')?> </a>
										</li>
									<? endif; ?>

									<? if ($this->_checkAccessForAnswer($result[0])) : ?>
										<li>
											<a href="<?=Yii::app()->createUrl('/office/message/default/create/guid/' . $result[0]['sender_id'] . '/messageId/' . $result[0]['id'])?>">
											<i class="fa fa-arrow-right reply-btn"></i> <?=Yii::t('app', 'Ответить')?> </a>
										</li>
									<? endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="inbox-view">
					<?= CHtml::encode($result[0]['text']) ?>
				</div>
				<hr>
			</div>
		</div>
        <? endif; ?>
    </div>
</div>