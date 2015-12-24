<div id="tabs" class="row inbox">
	<div class="col-md-3">
		<? $this->widget('application.modules.office.modules.message.widgets.MessagesNavigationWidget'); ?>
	</div>

    <div class="col-md-9">

        <? if (Yii::app()->user->checkAccess('OfficeMessageDefaultIncoming')) : ?>
        <div>
            <div id="flash-messages">
                <? foreach ($flashes as $key => $flash): ?>
                    <div class="alert alert-<?=$key; ?>">
                        <?=$flash; ?>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="inbox-header">
                <h1 class="pull-left"><?=Yii::t('app', 'Входящие')?></h1>
                
                <?=CHtml::beginForm(Yii::app()->createUrl('/office/message/inbox/'), 'get', array('class'=>'form-inline pull-right')); ?>
                
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

            <? if ($messages_in == null) : ?>

			<div class="note note-info">
				<h4 class="block"><?=Yii::t('app', 'Входящих сообщений нет')?></h4>
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
										<span><?= ($pages_in->currentPage * $pages_in->limit) + 1 ?></span>
										-
										<span><?= ($pages_in->currentPage + 1 == $pages_in->pageCount) ? $pages_in->itemCount : ($pages_in->currentPage * $pages_in->limit) + $pages_in->limit ?></span>
									</span> из 
									<span><?= $pages_in->itemCount ?></span>
								</span>
                            <? $this->widget('application.modules.office.modules.message.widgets.MessagesLinkPager', array(
								'pages' => $pages_in,
								'internalPageCssClass' => 'none',
								'nextPageLabel' => '<i class="fa fa-angle-right"></i>', 
								'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
								'previousPageCssClass' => 'btn btn-sm blue',
								'nextPageCssClass' => 'btn btn-sm blue',
								)); ?>
                           </th> 
                            
                        </tr>
                    </thead>
                    <tbody id="message_in" data-tabitem="1">
                    <? foreach ($messages_in as $key => $message) : ?>
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
                                <? if (!(bool)$message['is_admin_sender']) : ?>
                                    <?=CHtml::encode($message['sender_name']) ?>
                                <? else : ?>
                                    <?=Yii::t('app', 'Администрация')?>
                                <? endif; ?>
                            </td>
                            <td class="view-message">
                                <?=CHtml::encode($message['title'])?>
                            </td>
                            <td class="view-message text-right">
                                <?=MSmarty::date_format($message['date'], 'd.m.Y')?>
                            </td>
							<td class="inbox-small-cells" >
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