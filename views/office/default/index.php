<script src="/themes/metronic/public/assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="/themes/metronic/public/assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script>
	jQuery(document).ready(function() {
		//todo chart
	});
</script>
<?php $this->layout = 'office'; ?>

<div class="portlet box yellow">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="fa fa-user"></i>
			<?= Yii::t('app', 'Кабинет') ?>
		</h3>
	</div>
	<div class="portlet-body">
		<h1 class="h1-office"><?= Yii::t('app', 'Добро пожаловать в кабинет') ?></h1>
		<br><br>
		<div class="row profile">
			<div class="col-md-12">
				<!--BEGIN TABS-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="javascript: void(0)">
								<?= Yii::t('app', 'Кабинет') ?></a>
						</li>
                        <? if (Yii::app()->isModuleInstall('OfficeProfile')) : ?>
                            <li class="">
                                <a href="/office/profile">
                                    <?= Yii::t('app', 'Профиль') ?> </a>
                            </li>
                        <? endif; ?>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1_1">
							<div class="row">
								<div class="col-md-3">
									<ul class="list-unstyled profile-nav">
										<li>
											<? if (($_user->profile->attachment != NULL) && ($_user->profile->attachment->secret_name != null)) : ?>
                                                <?=CHtml::image(MSmarty::attachment_get_file_name($_user->profile->attachment->secret_name, $_user->profile->attachment->raw_name, $_user->profile->attachment->file_ext, '_office_profile', 'office_photo'), '', array('class' => 'img-responsive')); ?>
											<? else : ?>
                                                <?=CHtml::image(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('office.modules.profile.css')) . '/img/o.jpg', 'nophoto', array('class' => 'img-responsive')); ?>
											<? endif; ?>
                                            <? if (Yii::app()->isModuleInstall('OfficeProfile')) : ?>
                                                <a href="/office/profile/default/edit" class="profile-edit"><?= Yii::t('app', 'редактировать') ?></a>
                                            <? endif; ?>
										</li>
									</ul>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-8 profile-info">
											<h1><?php echo $_user->lang->last_name . ' ' . $_user->lang->first_name . ' ' . $_user->lang->second_name; ?></h1>
                                            <? if ((array_key_exists('referalLink', $_stat)) && (!empty($_stat['referalLink']))) : ?>
                                                <p>
                                                    <a href="<?=$_stat['referalLink']?>">
                                                        <?=$_stat['referalLink']?>
                                                    </a>
                                                </p>
                                            <? endif; ?>
											<ul class="list-inline">
												<li>
													<i class="fa fa-calendar"></i> <?=Yii::t('app', 'Дата регистрации')?>: <?=app_date('d.m.Y', strtotime($_user->created_at)); ?>
												</li>
											</ul>
										</div>
										<!--end col-md-8-->
                                        
                                        <? if (Yii::app()->isModuleInstall('AdminFinance')) : ?>
                                        
                                            <div class="col-md-4">
                                                <div class="portlet sale-summary">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <?=Yii::t('app', 'Статистика по кошелькам')?>
                                                        </div>
                                                        <div class="tools">
                                                            <!-- <a class="reload" href="javascript:;">
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?= Yii::t('app', 'К поступлению') ?> <i class="fa fa-img-up"></i>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <? if ((array_key_exists('walletInfo', $_stat)) && (array_key_exists('unBalance', $_stat['walletInfo']))) : ?>
                                                                        <?php echo $_stat['walletInfo']['unBalance']; ?>
                                                                    <? else : ?>
                                                                        <?=Yii::t('app', 'н.д.')?>
                                                                    <? endif; ?>                                                                    
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?= Yii::t('app', 'К выводу') ?> <i class="fa fa-img-down"></i>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <? if ((array_key_exists('walletInfo', $_stat)) && (array_key_exists('balanceBlocked', $_stat['walletInfo']))) : ?>
                                                                        <?php echo $_stat['walletInfo']['balanceBlocked']; ?>
                                                                    <? else : ?>
                                                                        <?=Yii::t('app', 'н.д.')?>
                                                                    <? endif; ?>                                                                    
                                                                </span>                                                                
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?= Yii::t('app', 'Общее') ?>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <? if ((array_key_exists('walletInfo', $_stat)) && (array_key_exists('amount', $_stat['walletInfo']))) : ?>
                                                                        <?php echo $_stat['walletInfo']['amount']; ?>
                                                                    <? else : ?>
                                                                        <?=Yii::t('app', 'н.д.')?>
                                                                    <? endif; ?>                                                                    
                                                                </span>                                                                    
                                                            </li>
                                                            <li>
                                                                <span class="sale-info">
                                                                    <?= Yii::t('app', 'Баланс') ?>
                                                                </span>
                                                                <span class="sale-num">
                                                                    <? if ((array_key_exists('walletInfo', $_stat)) && (array_key_exists('balance', $_stat['walletInfo']))) : ?>
                                                                        <?php echo $_stat['walletInfo']['balance']; ?>
                                                                    <? else : ?>
                                                                        <?=Yii::t('app', 'н.д.')?>
                                                                    <? endif; ?>                                                                    
                                                                </span>                                                                    
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-md-4-->
                                        
                                        <? endif; ?>
									</div>
									<!--end row-->
								</div>
								<!--col-9-->
							</div>
                            <? if (array_key_exists('profileLastInviteds', $_stat)) : ?>
                                <div class="row" style="margin-left: 0px;">
                                    <div class="col-12">
                                        <div class="tabbable tabbable-custom tabbable-custom-profile">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_11" data-toggle="tab">
                                                        <?=Yii::t('app', 'Последние приглашенные')?> </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1_11">
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-advance table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <i class="fa fa-user"></i> <?=Yii::t('app', 'ФИО')?>
                                                                    </th>
                                                                    <th class="hidden-xs">
                                                                        <i class="fa fa-user"></i> <?=Yii::t('app', 'Логин')?>
                                                                    </th>
                                                                    <th>
                                                                        <i class="fa fa-envelope-o"></i> Email
                                                                    </th>
                                                                    <th>
                                                                        <i class="fa fa-calendar"></i> <?=Yii::t('app', 'Дата регистрации')?>
                                                                    </th>
                                                                    <th>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? foreach ($_stat['profileLastInviteds'] as $invited) : ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $invited->lang->last_name . ' ' . $invited->lang->first_name . ' ' . $invited->lang->second_name; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $invited->user->username; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $invited->user->email; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo date('d.m.Y', strtotime($invited->created_at)); ?>
                                                                        </td>
                                                                    </tr>                                                                
                                                                <? endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <? if (Yii::app()->isModuleInstall('OfficeStats')): ?>
                                            <?=CHtml::link(Yii::t('app', 'Посмотреть все отчеты'), $this->createUrl('/office/stats'))?>
                                        <? endif; ?>
                                    </div>
                                </div>                            
                            <? endif; ?>
						</div>
					</div>
				</div>
				<!--END TABS-->
			</div>
		</div>
	</div>
</div>