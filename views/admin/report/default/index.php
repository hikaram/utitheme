<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.report.css'))?>/css/adminreport.css" type="text/css" media="screen, projection" />

<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-users" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Отчеты компании')?></h3>
	</div>
	<div class="portlet-body">

        <div id="accordion" class="panel-group accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="#collapse_1" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                            <?=Yii::t('app', 'Регистрации пользователей')?>
                        </a>
                    </h4>
                </div>   
                <div class="panel-collapse in" id="collapse_1">
                    <div class="panel-body">
                        <? include 'control_stats_admin_users.php' ?>
                    </div>
                </div>            
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="#collapse_2" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                            <?=Yii::t('app', 'Регистрации пользователей по возрасту')?>
                        </a>
                    </h4>
                </div>   
                <div class="panel-collapse collapse" id="collapse_2">
                    <div class="panel-body">
                        <? include 'control_stats_admin_users_by_age.php' ?>
                    </div>
                </div>            
            </div>
            

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="#collapse_3" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                            <?=Yii::t('app', 'Регистрации пользователей по географии')?>
                        </a>
                    </h4>
                </div>   
                <div class="panel-collapse collapse" id="collapse_3">
                    <div class="panel-body">
                        <? include 'control_stats_admin_users_by_geography.php' ?>
                    </div>
                </div>            
            </div>            

        </div>    
    
		
	</div>
</div>


