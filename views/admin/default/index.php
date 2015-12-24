<?php
$this->breadcrumbs[Yii::t('app', 'Панель управления')] = $this->module->id;
?>

<div class="row">
    <? if (Yii::app()->isModuleInstall('AdminUser')) : ?>
        <? Yii::import('application.modules.admin.modules.user.models.*');?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?=UsersInner::getTotalUsersCount()?>
                    </div>
                    <div class="desc">
                        <?=Yii::t('app', 'Пользователей в Системе');?>
                    </div>
                </div>
                <a class="more" href="<?=$this->createUrl('/admin/user/user')?>">
                    <?=Yii::t('app', 'Перейти');?>
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    <? endif; ?>
    <? if (Yii::app()->isModuleInstall('AdminFinance', '1.4.3')) : ?>
        <? Yii::import('application.modules.admin.modules.finance.models.*');?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?=FinanceTransactions::getTotalOperationsCount()?>
                    </div>
                    <div class="desc">					
                        <?=Yii::t('app', 'Финансовых Операций');?>
                    </div>
                </div>
                <a class="more" href="<?=$this->createUrl('/admin/finance/transactions/index')?>">
                    <?=Yii::t('app', 'Перейти');?>
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    <? endif; ?>
    <? if (Yii::app()->isModuleInstall('OfficeMessageMetronik', '2.0.6')) : ?>
        <? Yii::import('application.modules.office.modules.message.models.*');?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?=Messages::getNewMessagesForAdmin()?>
                    </div>
                    <div class="desc">
                        <?=Yii::t('app', 'Оповещений');?>
                    </div>
                </div>
                <a class="more" href="<?=$this->createUrl('/office/message')?>">
                    <?=Yii::t('app', 'Перейти');?>
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    <? endif; ?>
    <? if (Yii::app()->isModuleInstall('AdminStore', '1.1.9')) : ?>
        <? Yii::import('application.modules.store.models.*');?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?=Horders::getTotalNewOrdersCount()?>
                    </div>
                    <div class="desc">
                         <?=Yii::t('app', 'Новых Заказов');?>
                    </div>
                </div>
                <a class="more" href="<?=$this->createUrl('/admin/store')?>">
                    <?=Yii::t('app', 'Перейти');?>
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    <? endif; ?>
</div>

<? /*   ---------------------------------------------------------------
AlexXanDOR Пока неясно что будем здесь располагать 

<div class="row ">
	<div class="col-md-6 col-sm-6">
		<!-- BEGIN PORTLET-->
		<div class="portlet">
			<div class="portlet-title line">
				<div class="caption">
					<i class="fa fa-bullhorn"></i> Some Info Block
				</div>
			</div>
			<div class="portlet-body">
				<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible1="1">
					<ul class="feeds">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 You have 4 pending tasks. <span class="label label-sm label-danger ">
											Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 Just now
								</div>
							</div>
						</li>
						<li>
							<a href="#">
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New version v1.4 just lunched!
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 20 mins
								</div>
							</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger">
											<i class="fa fa-bolt"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 Database server #12 overloaded. Please fix the issue.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 24 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 30 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 40 mins
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-warning">
											<i class="fa fa-plus"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New user registered.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 1.5 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
											Overdue </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 2 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 3 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-warning">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 5 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 18 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 21 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 22 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 21 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 22 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 21 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 22 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 21 hours
								</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											 New order received. Please take care of it.
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									 22 hours
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="scroller" style="height: 342px;" data-always-visible="1" data-rail-visible1="1">
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong>Success!</strong> The page has been added. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tristique eu purus eu ultrices. Nulla facilisi. Vestibulum at mi mi. Mauris finibus vulputate mauris, in vulputate felis condimentum in.
			</div>
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong>Info!</strong> You have 198 unread messages. 
			</div>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong>Warning!</strong> Your monthly traffic is reaching limit. Etiam nec dictum lectus, suscipit molestie ante. Vestibulum quis congue risus, sed fringilla tellus. Maecenas aliquam cursus tortor sed pharetra. Morbi vitae risus eleifend, elementum ligula quis, tempus sem. Nam molestie ex id ex semper molestie. Mauris ultrices quam vitae nunc interdum, non eleifend urna molestie.
			</div>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong>Error!</strong> The daily cronjob has failed.
			</div>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<strong>Warning!</strong> Something went wrong. Please check. Etiam nec dictum lectus, suscipit molestie ante. Vestibulum quis congue risus, sed fringilla tellus. Maecenas aliquam cursus tortor sed pharetra. Morbi vitae risus eleifend, elementum ligula quis, tempus sem. Nam molestie ex id ex semper molestie. Mauris ultrices quam vitae nunc interdum, non eleifend urna molestie.
			</div>
		</div>
	</div>
</div>

--------------------------------------------------------------------------------------------------------
*/ ?>