<div id="tabs" class="row inbox">
	<div class="col-md-3">
		<? $this->widget('application.modules.office.modules.message.widgets.MessagesNavigationWidget'); ?>
	</div>

    <div class="col-md-9">
        
        <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultOutgoing')) : ?>
        <div id="tabs-2">

            <div id="flash-messages">
                <? foreach ($flashes as $key => $flash): ?>
                    <div class="alert alert-<?=$key; ?>">
                        <?=$flash; ?>
                    </div>
                <? endforeach; ?>
            </div>
            
            <div class="inbox-header">
                <h1 class="pull-left"><?=Yii::t('app', 'Отправленные')?></h1>
                <?=CHtml::beginForm(Yii::app()->createUrl('/office/message/outbox/'), 'get', array('class'=>'form-inline pull-right')); ?>
                
                    <div class="input-group input-medium">
                        
                        <div class="input-group input-medium">
								
                            <?=CHtml::textField('search',$value=$search,$htmlOptions=array('class'=>'form-control', 'placeholder'=>'Поиск')); ?>
								<span class="input-group-btn">
                                    <button type="submit" class="btn green"><i class="fa fa-search"></i></button>
								</span>
							</div>
                    </div>
                <?=CHtml::endForm(); ?>
            </div>

            <? if ($messages_out == null) : ?>

            <div class="note note-info">
				<h4 class="block"><?=Yii::t('app', 'Отправленных сообщений нет')?></h4>
			</div>

            <? else : ?>

            <div class="inbox-content">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                <div class="btn-group">
                                    <a class="btn btn-sm blue" href="#" data-toggle="dropdown"><?=Yii::t('app', 'Действия')?> <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li id="mark-important" class="">
                                            <a href="#">
                                            <i class="fa fa-star"></i> <?=Yii::t('app', 'Отметить как важное')?></a>
                                        </li>
										<li id="mark-readed" class="">
                                            <a href="#">
                                            <i class="fa fa-pencil"></i> <?=Yii::t('app', 'Отметить как прочитанное')?></a>
                                        </li>
                                        <li id="do-delete" class="">
                                            <a href="#">
                                            <i class="fa fa-trash-o"></i> <?=Yii::t('app', 'Удалить')?></a>
                                        </li>
                                    </ul>
                                </div>
								
                            </th>
                            <th class="pagination-control" colspan="3">
								<span class="pagination-info">
									<span>
										<span><?= ($pages_out->currentPage * $pages_out->limit) + 1 ?></span>
										-
										<span><?= ($pages_out->currentPage + 1 == $pages_out->pageCount) ? $pages_out->itemCount : ($pages_out->currentPage * $pages_out->limit) + $pages_out->limit ?></span>
									</span> <?=Yii::t('app', 'из')?> 
									<span><?= $pages_out->itemCount ?></span>
								</span>
                            <? $this->widget('application.modules.office.modules.message.widgets.MessagesLinkPager', array(
								'pages' => $pages_out,
								'internalPageCssClass' => 'none',
								'nextPageLabel' => '<i class="fa fa-angle-right"></i>', 
								'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
								'previousPageCssClass' => 'btn btn-sm blue',
								'nextPageCssClass' => 'btn btn-sm blue',
								)); ?>
                           </th> 
                        </tr>
                    </thead>

                    <tbody id="message_out" data-tabitem="2">
                        <? foreach ($messages_out as $key => $message) : ?>
                        <tr data-id="<?=$message['id']?>" data-status="<?=$message['user_message_action_is_important']?>"
                            <? if ($message['user_message_action_is_readed'] == null) : ?>
                                class="unread"
                            <? endif; ?> >
                            <td class="inbox-small-cells">
                                <input type="checkbox" class="mail-checkbox" value="<?=$message['id']?>">
                            </td>
                            
                            <td id="important" class="inbox-small-cells">
                                <i class="fa fa-star 
                                    <? if ($message['user_message_action_is_important'] != 0) : ?>   
                                        inbox-started
                                   <? endif; ?>" >
                                </i>    
                            </td>
                            <td class="view-message hidden-xs">
                                <?=Yii::t('app', 'Кому')?>: 
                                <? if ($message['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_TOALL) : ?>        <?=Yii::t('app', 'Всем пользователям')?>
                                <? elseif ($message['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_ADMIN) : ?>    <?=Yii::t('app', 'Администрации')?>
                                <? elseif ($message['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_FIRSTLINE) : ?><?=Yii::t('app', 'Первой линии')?>
                                <? elseif ($message['recipient_id'] == Messages::MESSAGE_RECIPIENT_TYPE_STRUCTURE) : ?><?=Yii::t('app', 'Моей структуре')?>
                                <? else : ?><?=$message['recipient_name'].' ('.$message['recipient_login'].')'?>
                                <? endif; ?>  
                            </td>
                            <td class="view-message">
                                <?=CHtml::encode($message['title'])?>
                            </td>
                            <td class="view-message text-right">
                                <?=MSmarty::date_format($message['date'], 'd.m.Y')?>
                            </td>
							<td class="inbox-small-cells">
							<? if ($this->_checkAccessForDelete($message)) : ?>
								<?= CHtml::beginForm(Yii::app()->createUrl('/office/message/default/delete/id/' . $message['id']), 'post'); ?>
									<i class="fa fa-trash-o" onclick="return confirm('Удалить?') ? this.parentNode.submit() : false;"></i>
								<?=CHtml::endForm()?>
							<? endif; ?>
							</td>
                        </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
                
                <?= CHtml::beginForm(Yii::app()->createUrl('/office/message/default/deleteMessages'), 'post', array('style'=>'display:none;','id'=>'hiddenDeleteForm')); ?>
                    <?=CHtml::hiddenField('ids', '', array('id'=>'deleteIds')); ?>
                <?=CHtml::endForm()?>
            </div>
            
            <? endif; ?>
        </div>
        <? endif; ?>
    </div>
</div>