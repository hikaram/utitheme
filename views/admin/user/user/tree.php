<?
	#some shit-code
	$login = array_key_exists('username', $list) ? true : false;
	if((array_key_exists('last_name', $list)) || (array_key_exists('first_name', $list)) || (array_key_exists('second_name', $list))): $fio = true; else : $fio = false; endif;
	
	$email = array_key_exists('email', $list) ? true : false;
	$phone = array_key_exists('phone', $list) ? true : false;
	$skype = array_key_exists('skype', $list) ? true : false;
	if($email || $phone || $skype) { $contacts = true; } else { $contacts = false; }
	
	if((array_key_exists('attachment__id', $list)) && (Yii::app()->isModuleInstall('Attachment'))) { $photo = true; } else { $photo = false; }
	
	$sponsor = array_key_exists('sponsor__id', $list) ? true : false;
	
	$sex = array_key_exists('sex', $list) ? true : false;
	$birthday = array_key_exists('birthday', $list) ? true : false;
	$idpass = array_key_exists('series_passport', $list) ? true : false;
	
	if((array_key_exists('country__id', $list)) || (array_key_exists('region__id', $list)) || (array_key_exists('city__id', $list)) || (array_key_exists('address', $list)) || (array_key_exists('zip_code', $list))) { $adres = true; } else { $adres = false; }
?>
<script src="<?=Yii::app()->theme->baseUrl?>/js/admin/user/plugins/jquery.tree/jquery.tree.min.js"></script>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('user.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<? if((empty($profiles)) && (empty($filter)) && (count($modelUsers) <= 1)) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одного пользователя')?>. 
		<? if (Yii::app()->user->checkAccess('AdminUserUserCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать нового')?></a> <?=Yii::t('app', 'пользователя')?>
		<? endif; ?>
	</div>
<? else : ?>
<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-sitemap"></i> <?=Yii::t('app', 'Дерево дистрибьюторов')?></h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
        
            <div class="note note-info" style="margin-top: 20px;">
                <p>
                    <?=Yii::t('app', 'Всего пользователей на проекте')?>: <?=UsersInner::getTotalUsersCount();?></span><? if (Yii::app()->isModuleInstall('AdminReport')) : ?> (<?=CHtml::link(Yii::t('app', 'Просмотреть подробную статистику'), $this->createUrl('/admin/report'))?>)<? endif; ?>
                </p>
            </div>         
        
			<?=$this->renderPartial('_filter', array(
				'user' 			=> $user,
				'profile' 		=> $profile,
				'profileLang'	=> $profileLang,
				'url' 			=> '/admin/user/user/tree'))
			?>
            
            <? if (empty($profiles)) : ?>
                
                <? if (count($modelUsers) <= 1) : ?>
                
                    <div class="note note-danger" style="margin-top: 20px;">
                        <p>
                            <?=Yii::t('app', 'Не найдено ни одного пользователя, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                        </p>
                    </div>       

                <? endif; ?>

            <? else : ?>
            
            
                <div class="table-scrollable">
                    <table class="nav-list table table-hover" id="users">
                        <thead>
                            <tr>
                                <? if($login) : ?><th><?=$user->getAttributeLabel('username')?></th><? endif;?>
                                <? if($fio) : ?><th><?=Yii::t('app', 'ФИО')?></th><? endif;?>
                                <? if($contacts) : ?><th><?=Yii::t('app', 'Контактные данные')?></th><? endif;?>
                                <? if($adres) : ?><th><?=Yii::t('app', 'Адрес')?></th><? endif;?>
                                <? if($sponsor) : ?>
                                    <th><?=Yii::t('app', 'Спонсор')?></th>
                                    <th><?=Yii::t('app', 'ФИО спонсора')?></th>
                                <? endif;?>                            
                                <th><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($profiles as $key => $tree) :?>  
                            <tr class="tn-container" node="<?=$tree->user__id?>" parent="<?=$tree->sponsor__id?>" children_count="<?=count($tree->childs)?>" level="<?=$tree->tree_level?>">
                                <? if(array_key_exists('username', $list)): ?>
                                    <td class="tn-manager">
                                        <div class="tnm-children">
                                            <span class="fa fa-plus-square-o"></span>
                                            <span class="fa fa-minus-square-o"></span>
                                        </div>                                
                                        <div class="tnm-content">
                                            <? if($sex) : ?>
                                                <? if ($tree->sex == Profile::SEX_MALE) : ?>
                                                    <span class="icon icon-user font-blue mr10"></span>
                                                <? elseif ($tree->sex == Profile::SEX_FEMALE) : ?>
                                                    <span class="icon icon-user-female font-red-pink mr10"></span>
                                                <? endif; ?>                                            
                                            <? endif; ?>
                                            <?=CHtml::encode($tree->user->username)?>
                                        </div>
                                    </td>
                                    <? if($fio) : ?><td>
                                        <?=CHtml::encode($tree->lang->last_name)?> <?=CHtml::encode($tree->lang->first_name)?> <?=CHtml::encode($tree->lang->second_name)?>
                                    </td><? endif;?>
                                    <? if($contacts) : ?><td>
                                        <? if($email) :?><i class="fa fa-envelope-o mr5"></i> <?=CHtml::encode($tree->user->email)?><br/><? endif; ?>
                                        <? if($phone) :?>
                                            <? if ($tree->phone and $tree->phone != "") : ?>
                                                <i class="fa fa-phone mr5"></i> <?=CHtml::encode($tree->phone)?><br/>
                                            <? endif; ?>
                                        <? endif; ?>
                                        <? if($skype) :?>
                                            <? if ($tree->skype and $tree->skype != "") : ?>
                                                <i class="fa fa-skype mr5"></i> <?=CHtml::encode($tree->skype)?>
                                            <? endif; ?>
                                        <? endif; ?>
                                    </td><? endif;?>
                                    <? if($adres) : ?><td>
                                        <? if ($tree->lang->address and $tree->lang->address != "") : ?>
                                            <?=CHtml::encode($tree->lang->address)?> 
                                        <? endif; ?>
                                    </td><? endif;?>
                                    <? if($sponsor) : ?>
                                        <td>
                                            <? if ($tree->sponsor != NULL) : ?>
                                                <?=CHtml::encode($tree->sponsor->username)?>
                                            <? else : ?>
                                                <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                                            <? endif; ?>
                                        </td>
                                        <td>
                                            <? if ($tree->sponsor != NULL) : ?>
                                                <?=CHtml::encode($tree->sponsor->profile->lang->last_name)?> 
                                                <?=CHtml::encode($tree->sponsor->profile->lang->first_name)?> 
                                                <?=CHtml::encode($tree->sponsor->profile->lang->second_name)?>
                                            <? else : ?>
                                                <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                                            <? endif; ?>
                                        </td>
                                    <? endif;?>                                
                                    <td>
                                        <? if ((Yii::app()->user->checkAccess('AdminUserUserView')) && ($tree->user->username != Yii::app()->params['adminUsername'])) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('user/view', array('id' => sha1($tree->user->id))), array('class' => 'btn blue-steel'))?>
                                        <? endif; ?>
                                        <? if ((Yii::app()->user->checkAccess('AdminUserUserEdit')) && ($tree->user->username != Yii::app()->params['adminUsername'])) : ?>
                                            <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('user/create', array('action' => 'edit', 'id' => sha1($tree->user->id))), array('class' => 'btn green-seagreen'))?>
                                        <? endif; ?>
                                    </td>
                                <? endif; ?>
                            </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            <? endif; ?>
		</div>
        
		<div class="form-actions">
            <? if (Yii::app()->user->checkAccess('AdminUserUserIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'Просмотр списка пользователей'), $this->createUrl('index'), array('class' => 'btn green'));?>
			<? endif; ?>
			<? if (Yii::app()->user->checkAccess('AdminUserUserCreate')) : ?>
				<?=CHtml::link(Yii::t('app', 'Добавить пользователя'), $this->createUrl('create'), array('class' => 'btn red'));?>
			<? endif; ?>			
		</div>        
        
	</div>
</div>
<? endif; ?>

<? if (count($modelUsers) > 1) : ?>
    <div class="list_choose" id="list_choose">
    
        <div class="note note-warning" style="margin-top: 20px;">
            <p>
                <?=Yii::t('app', 'Указанным условиям фильтрации соответствуют несколько пользователей')?> (<?=count($modelUsers)?>).
                <?=Yii::t('app', 'Выберите пользователя, структуру которого Вы бы хотели просмотреть')?>
            </p>
        </div>    
    
        <h3><?=Yii::t('app', 'Выберите пользователя')?>:</h3>
        <div id="table_list">
            <table class="table table-hover adminlist">
                <thead>        
                    <tr>
                        <th><?=$user->getAttributeLabel('username')?></th>
                        <th><?=$profileLang->getAttributeLabel('last_name')?></th>
                        <th><?=$profileLang->getAttributeLabel('first_name')?></th>
                        <th><?=$profileLang->getAttributeLabel('second_name')?></th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($modelUsers as $item => $row) :?>
                        <tr onClick="insertData('<?=CHtml::encode($row->user->username)?>')">
                            <td><?=CHtml::encode($row->user->username)?></td>
                            <td><?=CHtml::encode($row->lang->last_name)?></td>
                            <td><?=CHtml::encode($row->lang->first_name)?></td>
                            <td><?=CHtml::encode($row->lang->second_name)?></td>
                        </tr>
                    <? endforeach; ?>          
                </tbody>
            </table>
            <br />
			<?=CHtml::button(Yii::t('app', 'Отмена'), array('class' => 'btn green mb20', 'onClick' => 'hideTable()'))?>
        </div>
    </div>
<? endif; ?>