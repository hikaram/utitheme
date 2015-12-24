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

        <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultCreate')) : ?>
        <div>
            <div class="inbox-header">
                <h1 class="pull-left"><?=Yii::t('app', 'Новое сообщение')?></h1>
                <form class="form-inline pull-right" action="index.html">
                    <div class="input-group input-medium"> 
                    </div>
                </form>
            </div>
            <?=CHtml::beginForm('', 'post', array('class'=>'inbox-compose form-horizontal')); ?>
            
                <? if ((bool)$error) : ?>
                    <div class="alert alert-danger">
						<strong><?=Yii::t('app', 'Ошибка')?>!</strong> <?=CHtml::encode($errorText)?>
					</div>
                <? endif; ?>
                
            
                <div id="new_message" class="inbox-content">
					<?=CHtml::hiddenField('senderTypeAnswer',($isAnswer === TRUE) ? TRUE : (int) FALSE )?>
                    <div class="inbox-compose-btn">
                        <button class="btn blue"><i class="fa fa-check"></i><?=Yii::t('app', 'Отправить')?></button>
						<button class="btn inbox-discard-btn" type="button" onclick="window.location = app.createAbsoluteUrl('/office/message/inbox/')"><?=Yii::t('app', 'Отмена')?></button>
                    </div>

                    <div class="inbox-form-group mail-to">
                        <label class="control-label"><?=Yii::t('app', 'Кому')?>:</label>
                        <div class="controls controls-to">
                            <select id="Message_type" name="Message_type" size="0" onChange="hidden_partner()" class="form-control">
                                <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultCreateUser')) : ?><option value="<?=Messages::MESSAGE_RECIPIENT_TYPE_SINGLE?>"><?=Yii::t('app', 'Пользователю')?></option><? endif; ?>
								<? if (Yii::app()->user->checkAccess('OfficeMessageDefaultCreateAdmin')) : ?><option value="<?=Messages::MESSAGE_RECIPIENT_TYPE_ADMIN?>"><?=Yii::t('app', 'Администрации')?></option><? endif; ?>
                                <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultCreateUsers')) : ?><option value="<?=Messages::MESSAGE_RECIPIENT_TYPE_TOALL?>"><?=Yii::t('app', 'Всем пользователям')?></option><? endif; ?>
                                <? if ((Yii::app()->user->checkAccess('OfficeMessageDefaultCreateStructure')) && ($count > 1)) : ?><option value="<?=Messages::MESSAGE_RECIPIENT_TYPE_STRUCTURE?>"><?=Yii::t('app', 'Моей структуре')?></option><? endif; ?>
                                <? if ((Yii::app()->user->checkAccess('OfficeMessageDefaultCreateFirstline')) && ($count > 1)) : ?><option value="<?=Messages::MESSAGE_RECIPIENT_TYPE_FIRSTLINE?>"><?=Yii::t('app', 'Первой линии')?></option><? endif; ?>
                            </select>
                        </div>
                    </div>

                    <div id="partner_choose" class="inbox-form-group">
                        <label class="control-label"></label>
                        <div class="input-inline input-large ml5">
                            <div class="input-group">
                                <?php $this->widget('application.modules.office.modules.message.widgets.UserSearchWidget', array('input_name'=>'users', 'input_id' => 'users__id', 'langs' => array('en', 'ru')))->userSearch(); ?>
                                <input id="users" class="form-control" type="text" name="users" readonly="readonly" style="cursor: default;" value="<?= $name; ?>" placeholder="<?=Yii::t('app', 'Выберите пользователя')?>" data-toggle="modal" data-target="#userSearch" onClick="show_table('users', null, null, null, 0)">
                                <input id="users__id"  type="hidden" name="users__id" value="<?= $users__id; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="inbox-form-group">
                        <label class="control-label"><?=Yii::t('app', 'Тема')?>:</label>
                        <div class="controls">
                            <input id="title" name="title" class="form-control" type="text" value="<?= $messageTitle; ?>">
                        </div>
                    </div>

                    <div class="inbox-form-group">
                        <label class="control-label"><?=Yii::t('app', 'Текст')?>:</label>
                        <div class="controls">
                            <textarea id="message" name="message" class="form-control" rows="3"><?= $messageText; ?></textarea>
                        </div>
                    </div>
                    <div class="inbox-compose-btn">
                        <button class="btn blue"><i class="fa fa-check"></i><?=Yii::t('app', 'Отправить')?></button>
						<button class="btn inbox-discard-btn" type="button" onclick="window.location = app.createAbsoluteUrl('/office/message/inbox/')"><?=Yii::t('app', 'Отмена')?></button>
                    </div>
                </div>
            <?=CHtml::endForm(); ?>
        </div>
        <? endif; ?>
    </div>
</div>