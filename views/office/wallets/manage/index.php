<?php $this->layout = 'office'; ?>

<? if (!empty($this->subSession->sub)) : ?>
    <script>
        $(function(){
            $("div.filter-block").show();
        })
    </script>
<? endif?>

<div class="panel panel-default filter">

	<div class="panel-heading pointer">
		<i class="fa fa-filter mr5"></i>
		<?=Yii::t('app', 'Настройки фильтра')?>
	</div>

	<div class="panel-body form form-horizontal" style="display: none;">
		<div class="form-body">
			<div class="form-group mt20">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Логин')?></label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[username]', array_key_exists('username', $filter) ? $filter['username'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Фамилия')?></label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[last_name]', array_key_exists('last_name', $filter) ? $filter['last_name'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Имя')?></label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[first_name]', array_key_exists('first_name', $filter) ? $filter['first_name'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Отчество')?></label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[second_name]', array_key_exists('second_name', $filter) ? $filter['second_name'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[email]', array_key_exists('email', $filter) ? $filter['email'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"><?=Yii::t('app', 'Логин спонсора')?></label>
				<div class="col-md-9">
					<?=Chtml::textField('filter[sponsor_username]', array_key_exists('sponsor_username', $filter) ? $filter['sponsor_username'] : '', array('class' => 'input-large form-control'));?>
				</div>
			</div>
			<?=CHtml::endForm()?>
		</div>
		<div class="form-actions">
			<?=CHtml::button(Yii::t('app', 'Найти'), array('name' => 'btn_filter', 'onClick' => 'saveFilter()', 'class' => 'btn blue'));?>
			<?=CHtml::link(Yii::t('app', 'Сбросить фильтр'), 'javascript: void(0)', array('class' => 'btn grey', 'onClick' => 'location.href="/office/wallets/manage/wallets"'))?>
		</div>
	</div>
</div>

<div class="table-scrollable profile wallets-list" style="border: 0;">
<? if (count($profiles) == 0) : ?>
	<?=Yii::t('app', 'Пользователи не найдены')?>
<? else : ?>
	<table class="table table-striped table-bordered table-advance table-hover">
		<thead>
			<tr>
				<th style="white-space:nowrap;"><?=Yii::t('app', 'Логин')?></th>
				<th><?=Yii::t('app', 'Email')?></th>
				<th><?=Yii::t('app', 'ФИО')?></th>
				<th><?=Yii::t('app', 'Логин спонсора')?></th>
				<th><?=Yii::t('app', 'ФИО спонсора')?></th>
				<th><?=Yii::t('app', 'Действия')?></th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($profiles as $key => $profile) : ?>

			<tr class="status-closed">
				 <? include 'profiledata.php'; ?>
			</tr>
			<tr <? if (($id == FALSE) || (sha1($profile->user->id) != $id)) : ?> style="display: none;"<? endif; ?>>
				<td class="operation-inner" colspan="6">
					<? include 'more.php' ?>
				</td>
			</tr>
			<? endforeach; ?>
		</tbody>
	</table>
<? endif; ?>
</div>
<? $this->widget('CLinkPager', array(
	'pages' => $pages, 
	'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
	'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
	'header' => '', 
	'htmlOptions' => array(
		'class' => 'pagination'
	)
)) ?>

<script>

    $(function(){
        $('span.more').click(function(){
            if ($(this).hasClass('more-hide'))
            {
                $(this).closest('tr').next().show();
                $(this).addClass('more-show');
                $(this).removeClass('more-hide');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            }
            else
            {
                $(this).closest('tr').next().hide();
                $(this).addClass('more-hide');
                $(this).removeClass('more-show');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });

        $('.user-login').mouseenter(function(){
            $(this).children('.user-login-full').show();
        });
        $('.user-login').mouseleave(function(){
            $(this).children('.user-login-full').hide();
        });
		
		$('.filter .panel-heading').click(function(){
			$(this).closest('.filter').find('.panel-body').slideToggle('slow');
		})
    })

</script>