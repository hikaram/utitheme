<div class="modal fade bs-modal-lg" id="userSearch">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="event_<?=$key?>">Filter search</h4>
			</div>
			<div class="modal-body" id="list_choose_<?=$key?>">
				
				<div id="table_alphabet_users_<?=$key?>">
					<?php $this->widget('Alphabet')->ajaxlink("show_table('users', null, null, %%letter%%, " . $key . ")"); ?>

					<a href="javascript:void(0)" class="btn green-seagreen" onClick="show_table('users', null, null, 'clear')"><span><?=Yii::t('app', 'Сбросить фильтр')?></span></a><br />
				</div>
				<?=CHtml::beginForm(); ?>
					<?=CHtml::hiddenField('input_id', $input_id, array('id' => 'input_id_' . $key)) ?>
					<?=CHtml::hiddenField('input_login', $input_login, array('id' => 'input_login_' . $key)) ?>
					<?=CHtml::hiddenField('input_name', $input_name, array('id' => 'input_name_' . $key)) ?>
					<?=CHtml::hiddenField('upline', $upline, array('id' => 'input_upline_' . $key)) ?>
					<div id="users_table_<?=$key?>" class="table-scrollable">
						<table class="table-filter table">
							<tbody>
								<tr>
									<td style="width: 50px; padding: 2px; display: none;">
										<?=CHtml::TextField('users_id_' . $key, null, array('class' => 'form-control input', 'style' => 'width: 45px')); ?>
									</td>
									<td style="width: 205px; padding: 2px;">
										<?=CHtml::TextField('users_username_' . $key, null, array('class' => 'form-control input', 'style' => 'width: 200px')); ?>
									</td>
									<td style="width: 205px; padding: 2px;">
										<?=CHtml::TextField('users_last_name_' . $key, null, array('class' => 'form-control input', 'style' => 'width: 200px')); ?>
									</td>
									<td style="width: 205px; padding: 2px;">
										<?=CHtml::TextField('users_first_name_' . $key, null, array('class' => 'form-control input', 'style' => 'width: 200px')); ?>
									</td>
									<td style="width: 205px; padding: 2px;">
										<?=CHtml::TextField('users_second_name_' . $key, null, array('class' => 'form-control input', 'style' => 'width: 200px')); ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?=CHtml::endForm(); ?> 
			</div>
			<div class="modal-footer">
				<button class="btn red" data-dismiss="modal"><?=Yii::t('app', 'Отмена')?></button>
			</div>
		</div>
	</div>
</div>

<a href="javascript:void(0)" style="height: 34px;" class="btn grey input-group-addon" data-toggle="modal" data-target="#userSearch"  onClick="show_table('users', null, null, null, <?=$key?>)">
    <i class="fa fa-user"></i>
</a>