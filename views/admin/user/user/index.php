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

<? if ((empty($profiles)) && (empty($filter))) :?>
	<div class="note note-success">
		<?=Yii::t('app', 'Не найдено ни одного пользователя')?>. 
		<? if (Yii::app()->user->checkAccess('AdminUserUserCreate')) : ?>
			<?=Yii::t('app', 'Вы можете')?> <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'создать нового')?></a> <?=Yii::t('app', 'пользователя')?>
		<? endif; ?>
	</div>
<? else : ?> 
    <div class="portlet box yellow">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-file-text" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Пользователи')?></h3>
        </div>
        <div class="portlet-body">
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего пользователей на проекте')?>: <span style="font-weight: 700;"><?=UsersInner::getTotalUsersCount();?></span><? if (Yii::app()->isModuleInstall('AdminReport')) : ?> (<?=CHtml::link(Yii::t('app', 'Просмотреть подробную статистику'), $this->createUrl('/admin/report'), ['target' => '_blank'])?>).<? endif; ?>
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminUserUserCreate')) : ?>
                <?=CHtml::link(Yii::t('app', 'Добавить пользователя'), $this->createUrl('create'), array('class' => 'btn green'));?>
            <? endif; ?>
            </div>             

            <?=$this->renderPartial('_filter', array(
                'user'          => $user,
                'profile'       => $profile,
                'profileLang'   => $profileLang,
                'url'           => '/admin/user/user/index'))
            ?>

            <? if (empty($profiles)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одного пользователя, удовлетворяющего условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                    </p>
                </div>             

            <? else : ?>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="dataTables_length" id="objects_length" style="display: inline-block;">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <? if (!in_array($unit, [25, 50, 100])) : ?>
                                        <option value="" selected="selected"></option>
                                    <? endif; ?>
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter" style="display: inline-block; margin-left: 20px;">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <input type="number" min="1" max="500" value="<?=$unit?>" step="1" size="7" class="form-control input-xsmall input-inline" name="unit" />
                                </label>        
                                <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                            <?= CHtml::endForm() ?>                                
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">

                    </div>
                </div>           
            
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <? if($photo) : ?><th><?=$profile->getAttributeLabel('attachment__id')?></th><? endif;?>
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
                            <? foreach($profiles as $key => $profile) :?>
                            <tr>
                                <? if($photo) : ?>
                                    <td>
                                        <? if (($profile->attachment != NULL) && ($profile->attachment->secret_name != null)) :?>
                                            <?=CHtml::image(MSmarty::attachment_get_file_name($profile->attachment->secret_name, $profile->attachment->raw_name, $profile->attachment->file_ext, '_search_author_photo', 'office_photo'), ''); ?>
                                        <? else : ?>
                                            &nbsp;
                                        <? endif; ?>
                                    </td>
                                <? endif;?>
                                <? if($login) : ?>
                                    <td>
                                        <?=CHtml::encode($profile->user->username)?>
                                    </td>
                                <? endif;?>
                                <? if($fio) : ?>
                                    <td>
                                        <? if($sex) : ?>
                                            <? if ($profile->sex == Profile::SEX_MALE) : ?>
                                                <span class="icon icon-user font-blue" style="margin-right: 10px;"></span>
                                            <? elseif ($profile->sex == Profile::SEX_FEMALE) : ?>
                                                <span class="icon icon-user-female font-red-pink" style="margin-right: 10px;"></span>
                                            <? endif; ?>
                                        <? endif;?>
                                        <?=CHtml::encode($profile->lang->last_name)?> <?=CHtml::encode($profile->lang->first_name)?> <?=CHtml::encode($profile->lang->second_name)?>
                                    </td>
                                <? endif;?>
                                <? if($contacts) : ?>
                                    <td>
                                        <? if($email) :?><i class="fa fa-envelope-o mr5"></i> <?=CHtml::encode($profile->user->email)?><br/><? endif; ?>
                                        <? if($phone) :?>
                                            <? if ($profile->phone and $profile->phone != "") : ?>
                                                <i class="fa fa-phone mr5"></i> <?=CHtml::encode($profile->phone)?><br/>
                                            <? endif; ?>
                                        <? endif; ?>
                                        <? if($skype) :?>
                                            <? if ($profile->skype and $profile->skype != "") : ?>
                                                <i class="fa fa-skype mr5"></i> <?=CHtml::encode($profile->skype)?>
                                            <? endif; ?>
                                        <? endif; ?>
                                    </td>
                                <? endif;?>
                                <? if($adres) : ?>
                                    <? $cities = $this->beginWidget('CitiesWidget', array()); ?>
                                    <td>
                                        <? if ($profile->country__id and $profile->country__id != "") : ?>
                                            <?php $cities->get_country($profile->country__id); ?>,
                                        <? elseif (!empty($profilelang->country_name)) : ?>
                                            <?=CHtml::encode($profilelang->country_name)?>,
                                        <? endif; ?>
                                        <? if ($profile->region__id and $profile->region__id != "") : ?>
                                            <?php $cities->get_region($profile->region__id); ?>,
                                        <? elseif (!empty($profilelang->region_name)) : ?>
                                            <?=CHtml::encode($profilelang->region_name)?>,
                                        <? endif; ?>
                                        <? if ($profile->city__id and $profile->city__id != "") : ?>
                                            <?php $cities->get_city($profile->city__id); ?>,
                                        <? elseif (!empty($profilelang->city_name)) : ?>
                                            <?=CHtml::encode($profilelang->city_name)?>,
                                        <? endif; ?>
                                        <br/>
                                        <? if ($profile->lang->address and $profile->lang->address != "") : ?>
                                            <?=CHtml::encode($profile->lang->address)?> 
                                        <? endif; ?>
                                        <? if ($profile->zip_code and $profile->zip_code != "") : ?>
                                            <?=CHtml::encode($profile->zip_code)?>
                                        <? endif; ?>
                                    </td>
                                    <? $this->endWidget(); ?>
                                <? endif;?>
                                <? if($sponsor) : ?>
                                    <td>
                                        <? if ($profile->sponsor != NULL) : ?>
                                            <?=CHtml::encode($profile->sponsor->username)?>
                                        <? else : ?>
                                            <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                                        <? endif; ?>
                                    </td>
                                    <td>
                                        <? if ($profile->sponsor != NULL) : ?>
                                            <?=CHtml::encode($profile->sponsor->profile->lang->last_name)?> 
                                            <?=CHtml::encode($profile->sponsor->profile->lang->first_name)?> 
                                            <?=CHtml::encode($profile->sponsor->profile->lang->second_name)?>
                                        <? else : ?>
                                            <small class="text-muted">(<?=Yii::t('app', 'отсутствует')?>)</small>
                                        <? endif; ?>
                                    </td>
                                <? endif;?>
                                <td style="white-space: nowrap; word-wrap: normal;">

                                    <? if (($profile->created_at != NULL) || ($profile->creator != NULL) || ($profile->modified_at != NULL) || ($profile->redactor != NULL)) : ?>
                                        <span type="button" class="btn blue-steel popovers"
                                            data-trigger="hover" 
                                            data-placement="left" 
                                            data-html="true"
                                            data-content="
                                                <? if ($profile->created_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата регистрации')?>:</span>
                                                    <?=MSmarty::date_format($profile->created_at, 'd.m.Y')?> <?=MSmarty::date_format($profile->created_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($profile->creator != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Кем зарегистрирован')?>:</span>
                                                    <?=$profile->creator->username?><br/>
                                                <? endif; ?>
                                                <? if ($profile->modified_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                    <?=MSmarty::date_format($profile->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($profile->modified_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($profile->redactor != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                    <?=$profile->redactor->username?><br/>
                                                <? endif; ?>
                                            " 
                                            data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                        >
                                            <i class="fa fa-info"></i>
                                        </span>
                                    <? endif; ?>

                                    <? if ((Yii::app()->user->checkAccess('AdminUserUserView')) && ($profile->user->username != Yii::app()->params['adminUsername'])) : ?>
                                        <?=CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $this->createUrl('user/view', array('id' => sha1($profile->user->id))), array(
                                            'class' => 'btn blue-steel tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Просмотр')                                        
                                        ))?>
                                    <? endif; ?>
                                    <? if ((Yii::app()->user->checkAccess('AdminUserUserEdit')) && ($profile->user->username != Yii::app()->params['adminUsername'])) : ?>
                                        <?=CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', $this->createUrl('user/create', array('action' => 'edit', 'id' => sha1($profile->user->id))), array(
                                            'class' => 'btn green-seagreen tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Редактировать')                                            
                                        ))?>
                                    <? endif; ?>
                                    <? if ((Yii::app()->user->checkAccess('AdminUserUserDelete')) && ($profile->user->username != Yii::app()->params['adminUsername'])) : ?>
                                        <?=CHtml::linkButton('<i class="glyphicon glyphicon-remove"></i>',array(
                                            'submit' => array('user/delete', 'id' => sha1($profile->user->id)),
                                            'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                            'confirm' => Yii::t('app', 'Удалить пользователя ?'),
                                            'class' => 'btn red tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Удалить'),                                            
                                        ));  ?>
                                    <? endif; ?>
                                </td>
                            </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <? $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                    'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                    'header' => '',
                    'selectedPageCssClass' => 'active',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?> 

            <? endif; ?>

    		<div class="form-actions">
    			<? if (Yii::app()->user->checkAccess('AdminUserUserCreate')) : ?>
    				<?=CHtml::link(Yii::t('app', 'Добавить пользователя'), $this->createUrl('create'), array('class' => 'btn green'));?>
    			<? endif; ?>
    			<? if (Yii::app()->user->checkAccess('AdminUserUserTree')) : ?>
    				<?=CHtml::link(Yii::t('app', 'Просмотр дерева пользователей'), $this->createUrl('tree'), array('class' => 'btn grey'));?>
    			<? endif; ?>
    		</div>
    	</div>
    </div>
<? endif; ?>