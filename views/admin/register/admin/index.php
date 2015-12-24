<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.register.css'))?>/css/adminregister.css" type="text/css" media="screen, projection" />

<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-database" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля для отображения при регистрации')?></h3>
	</div>
	<div class="portlet-body">
		<div class="table-scrollable">

            <?=CHtml::hiddenField(FALSE, UsersRegisterFieldsFilltypes::PROGRAM_FILLTYPE_FIELD, array('id' => 'showField'))?>
        
            <ul class="nav nav-tabs">
            
                <? $active = TRUE; ?>
                <? foreach ($objects as $object) : ?>
                    <li <? if ($active) : ?><? $active = FALSE; ?>class="active"<? endif; ?>><a data-toggle="tab" href="#tabs-<?=sha1($object->id)?>"><?=CHtml::encode($object->getTitle())?></a></li>
                <? endforeach; ?>            

            </ul>
            
            <div class="tab-content">
                <? $active = TRUE; ?>
                <? foreach ($listTotal as $key => $list) : ?>
                    <div id="tabs-<?=$key?>" class="tab-pane <? if ($active) : ?><? $active = FALSE; ?>active<? endif; ?>">
                        <?=$this->renderPartial('_fieldManage', array('list' => $list, 'objectFill' => $objectsFill[$key], 'objectHash' => $key, 'minSort' => $minSortNo[$key], 'maxSort' => $maxSortNo[$key])) ?>
                    </div>
                <? endforeach; ?>        
            </div>
        </div>
        
        <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
            <?=CHtml::link(Yii::t('app', 'Редактирование ролей по умолчанию'), $this->createUrl('editdefaultroles'), array('class' => 'btn yellow'));?>
        <? endif; ?>
        
        <? if (((bool)$isStep) && (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username'])) : ?>
            <?=CHtml::link(Yii::t('app', 'Редактирование ролей по умолчанию'), $this->createUrl('/admin/register/steps'), array('class' => 'btn gray'));?>
        <? endif; ?>
        
        <? if (Yii::app()->user->checkAccess('AdminRegisterConfigIndex')) : ?>
            <?=CHtml::link(Yii::t('app', 'Конфигурация'), $this->createUrl('/admin/register/config'), array('class' => 'btn green'));?>
        <? endif; ?>
        
        <? if (Yii::app()->user->checkAccess('AdminRegisterSocialIndex')) : ?>
            <?=CHtml::link(Yii::t('app', 'Социальные сети'), $this->createUrl('/admin/register/social'), array('class' => 'btn green'));?>
        <? endif; ?>
        
        <? if (((bool)$isQuestion) && (Yii::app()->user->checkAccess('AdminRegisterQuestionsIndex'))) : ?>
            <?=CHtml::link(Yii::t('app', 'Контрольные вопросы'), $this->createUrl('/admin/register/questions'), array('class' => 'btn purple'));?>
        <? endif; ?> 

        <? if ((Yii::app()->user->checkAccess('AdminRegisterSecurityIndex'))) : ?>
            <?=CHtml::link(Yii::t('app', 'Параметры безопасности'), $this->createUrl('/admin/register/security'), array('class' => 'btn red'));?>
        <? endif; ?>        
        
    </div>

</div>

