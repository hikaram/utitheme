<?php $this->layout = 'office'; ?>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.office.modules.statssync.css'))?>/css/officestats.css" type="text/css" media="screen, projection" />
<style>
    div.checker, div.radio {
        left: -5px;
        padding-top: 7px;
    }


/*    .checker{
         !important;
    }*/
</style>
<?=CHtml::hiddenField('selectedTab', $aliasNum, array('id' => 'selectedTabNum'))?>

<div class="row">
    <div class="col-md-12">
        <div id="tabbable_tabs" class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <? if ((array_key_exists(SettingsControllerBase::ReportAliasFirstline, $params)) && ($params[SettingsControllerBase::ReportAliasFirstline] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasFirstline]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
                    <li class="<?=($aliasNum==0)?'active':''?>" id="<?=SettingsControllerBase::ReportAliasFirstline?>_tab"><a href="#tab_1_1" data-toggle="tab"><?=CHtml::encode($params[SettingsControllerBase::ReportAliasFirstline]->lang->title)?></a></li>
                <? endif; ?>
                <? if ((array_key_exists(SettingsControllerBase::ReportAliasBirthday, $params)) && ($params[SettingsControllerBase::ReportAliasBirthday] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasBirthday]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
                    <li class="<?=($aliasNum==1)?'active':''?>" id="<?=SettingsControllerBase::ReportAliasBirthday?>_tab"><a href="#tab_1_2" data-toggle="tab"><?=CHtml::encode($params[SettingsControllerBase::ReportAliasBirthday]->lang->title)?></a></li>
                <? endif; ?>
                <? if ((array_key_exists(SettingsControllerBase::ReportAliasTree, $params)) && ($params[SettingsControllerBase::ReportAliasTree] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasTree]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
                    <li class="<?=($aliasNum==2)?'active':''?>" id="<?=SettingsControllerBase::ReportAliasTree?>_tab"><a href="#tab_1_3" data-toggle="tab"><?=CHtml::encode($params[SettingsControllerBase::ReportAliasTree]->lang->title)?></a></li>
                <? endif; ?>

<!--                <?/* if ((array_key_exists(SettingsControllerBase::ReportAliasFirstline, $params)) && ($params[SettingsControllerBase::ReportAliasFirstline] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasFirstline]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : */?>
                    <li class="active" id="<?/*=SettingsControllerBase::ReportAliasFirstline*/?>_tab"><a href="#tab_1_1"><?/*=CHtml::encode($params[SettingsControllerBase::ReportAliasFirstline]->lang->title)*/?></a></li>
                <?/* endif; */?>
                <?/* if ((array_key_exists(SettingsControllerBase::ReportAliasBirthday, $params)) && ($params[SettingsControllerBase::ReportAliasBirthday] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasBirthday]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : */?>
                    <li id="<?/*=SettingsControllerBase::ReportAliasBirthday*/?>_tab"><a href="#tab_1_2"><?/*=CHtml::encode($params[SettingsControllerBase::ReportAliasBirthday]->lang->title)*/?></a></li>
                <?/* endif; */?>
                <?/* if ((array_key_exists(SettingsControllerBase::ReportAliasTree, $params)) && ($params[SettingsControllerBase::ReportAliasTree] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasTree]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : */?>
                    <li id="<?/*=SettingsControllerBase::ReportAliasTree*/?>_tab"><a href="#tab_1_3"><?/*=CHtml::encode($params[SettingsControllerBase::ReportAliasTree]->lang->title)*/?></a></li>
                --><?/* endif; */?>
                <? if ((array_key_exists(SettingsControllerBase::ReportAliasPersonalbonus, $params)) && ($params[SettingsControllerBase::ReportAliasPersonalbonus] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasPersonalbonus]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
                    <li  class="<?=($aliasNum==3)?'active':''?>" id="<?=SettingsControllerBase::ReportAliasPersonalbonus?>_tab"><a href="#tab_1_4" data-toggle="tab"><?=CHtml::encode($params[SettingsControllerBase::ReportAliasPersonalbonus]->lang->title)?></a></li>
                <? endif; ?>
                <? if ((array_key_exists(SettingsControllerBase::ReportAliasBonusesbyperiods, $params)) && ($params[SettingsControllerBase::ReportAliasBonusesbyperiods] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasBonusesbyperiods]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>
                    <li class="<?=($aliasNum==4)?'active':''?>" id="<?=SettingsControllerBase::ReportAliasBonusesbyperiods?>_tab"><a href="#tab_1_5" data-toggle="tab"><?=CHtml::encode($params[SettingsControllerBase::ReportAliasBonusesbyperiods]->lang->title)?></a></li>
                <? endif; ?>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fontawesome-demo <?=($aliasNum==0)?'active':''?>" id="tab_1_1">
                    <div class="note note-success">
                        <? if ((array_key_exists(SettingsControllerBase::ReportAliasFirstline, $params)) && ($params[SettingsControllerBase::ReportAliasFirstline] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasFirstline]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>

                            <?=$this->renderPartial('tab_' . SettingsControllerBase::ReportAliasFirstline, array(
                                'params' => $params[SettingsControllerBase::ReportAliasFirstline],
                                'config' => $config[SettingsControllerBase::ReportAliasFirstline],
                                'allColumns' => $allColumns[SettingsControllerBase::ReportAliasFirstline],
                                'min_sort' => $min_sort[SettingsControllerBase::ReportAliasFirstline],
                                'max_sort' => $max_sort[SettingsControllerBase::ReportAliasFirstline]))?>
                        <? endif; ?>
                    </div>
                </div>
                <div class="tab-pane glyphicons-demo <?=($aliasNum==1)?'active':''?>" id="tab_1_2">
                    <div class="note note-success">
                        <? if ((array_key_exists(SettingsControllerBase::ReportAliasBirthday, $params)) && ($params[SettingsControllerBase::ReportAliasBirthday] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasBirthday]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>

                            <?=$this->renderPartial('tab_' . SettingsControllerBase::ReportAliasBirthday, array(
                            'params' => $params[SettingsControllerBase::ReportAliasBirthday],
                            'config' => $config[SettingsControllerBase::ReportAliasBirthday],
                            'allColumns' => $allColumns[SettingsControllerBase::ReportAliasBirthday],
                            'min_sort' => $min_sort[SettingsControllerBase::ReportAliasBirthday],
                            'max_sort' => $max_sort[SettingsControllerBase::ReportAliasBirthday]))?>

                        <? endif; ?>
                    </div>
                    
                </div>
                <div class="tab-pane <?=($aliasNum==2)?'active':''?>" id="tab_1_3">
                    <div class="note note-success">
                        <? if ((array_key_exists(SettingsControllerBase::ReportAliasTree, $params)) && ($params[SettingsControllerBase::ReportAliasTree] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasTree]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>

                            <?=$this->renderPartial('tab_' . SettingsControllerBase::ReportAliasTree, array(
                                'params' => $params[SettingsControllerBase::ReportAliasTree],
                                'config' => $config[SettingsControllerBase::ReportAliasTree],
                                'allColumns' => $allColumns[SettingsControllerBase::ReportAliasTree],
                                'min_sort' => $min_sort[SettingsControllerBase::ReportAliasTree],
                                'max_sort' => $max_sort[SettingsControllerBase::ReportAliasTree]))?>
                        <? endif; ?>
                    </div>
                    <div class="simplelineicons-demo">
                        
                    </div>
                </div>

                <div class="tab-pane <?=($aliasNum==3)?'active':''?>" id="tab_1_4">
                    <div class="note note-success">
                        <? if ((array_key_exists(SettingsControllerBase::ReportAliasPersonalbonus, $params)) && ($params[SettingsControllerBase::ReportAliasPersonalbonus] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasPersonalbonus]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>

                            <?=$this->renderPartial('tab_' . SettingsControllerBase::ReportAliasPersonalbonus, array(
                                'params' => $params[SettingsControllerBase::ReportAliasPersonalbonus],
                                'config' => $config[SettingsControllerBase::ReportAliasPersonalbonus],
                                'allColumns' => $allColumns[SettingsControllerBase::ReportAliasPersonalbonus],
                                'min_sort' => $min_sort[SettingsControllerBase::ReportAliasPersonalbonus],
                                'max_sort' => $max_sort[SettingsControllerBase::ReportAliasPersonalbonus]))?>
                        <? endif; ?>
                    </div>
                    <div class="simplelineicons-demo">

                    </div>
                </div>
                <div class="tab-pane <?=($aliasNum==4)?'active':''?>" id="tab_1_5">
                    <div class="note note-success">
                        <? if ((array_key_exists(SettingsControllerBase::ReportAliasBonusesbyperiods, $params)) && ($params[SettingsControllerBase::ReportAliasBonusesbyperiods] != NULL) && (((bool)$params[SettingsControllerBase::ReportAliasBonusesbyperiods]->is_on) || (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']))) : ?>

                            <?=$this->renderPartial('tab_' . SettingsControllerBase::ReportAliasBonusesbyperiods, array(
                                'params' => $params[SettingsControllerBase::ReportAliasBonusesbyperiods],
                                'config' => $config[SettingsControllerBase::ReportAliasBonusesbyperiods],
                                'allColumns' => $allColumns[SettingsControllerBase::ReportAliasBonusesbyperiods],
                                'min_sort' => $min_sort[SettingsControllerBase::ReportAliasBonusesbyperiods],
                                'max_sort' => $max_sort[SettingsControllerBase::ReportAliasBonusesbyperiods]))?>
                        <? endif; ?>
                    </div>
                    <div class="simplelineicons-demo">

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>







