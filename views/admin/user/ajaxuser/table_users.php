<div id="table_list_<?=$key?>" class="col-md-12">
	<div class="portlet box yellow">
		<div class="portlet-title">
			<?=Yii::t('app', 'Пользователи')?>
		</div>
		<div class="portlet-body">
			<div class="table-scrollable">
				<table class="table table-bordered table-hover usersearchwidgettable">
					<thead>
						<tr>
							<? $colspan = 0; ?>
							<? if (array_key_exists('username', $fieldslist)) : ?><? $colspan++; ?><th><?=Yii::t('app', 'Логин')?></th><? endif; ?>
							<? if (array_key_exists('last_name', $fieldslist)) : ?><? $colspan++; ?><th><?=Yii::t('app', 'Фамилия')?></th><? endif; ?>
							<? if (array_key_exists('first_name', $fieldslist)) : ?><? $colspan++; ?><th><?=Yii::t('app', 'Имя')?></th><? endif; ?>
							<? if (array_key_exists('second_name', $fieldslist)) : ?><? $colspan++; ?><th><?=Yii::t('app', 'Отчество')?></th><? endif; ?>
						</tr>
					</thead>
					<tbody>
					<? if(empty($list)) :?>
						<tr>
							<td colspan="<?=$colspan?>">
								<?=Yii::t('app', 'Не найдено ни одной записи')?>
							</td>
						</tr>
					<? else : ?>
						<? foreach($list as $item => $row) :?>
							<tr data-dismiss="modal" onClick="insert_data('<?=$row['id']?>', '<?=$row['username']?>', '<?=$row['second_name']?>', '<?=$row['first_name']?>', '<?=$row['last_name']?>', '<?=$key?>')">
								<? if (array_key_exists('username', $fieldslist)) : ?><td><?=$row['username']?></td><? endif; ?>
								<? if (array_key_exists('last_name', $fieldslist)) : ?><td><?=$row['last_name']?></td><? endif; ?>
								<? if (array_key_exists('first_name', $fieldslist)) : ?><td><?=$row['first_name']?></td><? endif; ?>
								<? if (array_key_exists('second_name', $fieldslist)) : ?><td><?=$row['second_name']?></td><? endif; ?>
							</tr>
						<? endforeach; ?>  
					<? endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<br />
    <? $this->widget('UTIAjaxLinkPager', array(
    	'pages' => $pages, 
    	'onClick' => 'show_table("users", undefined, undefined, undefined, ' . $key . ', %%page%%)',
        'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
        'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
        'header' => '',
        'selectedPageCssClass' => 'active',
        'htmlOptions' => array(
            'class' => 'pagination utiajaxlinkpagination'
        )
	)) ?>
    <br />
	
</div>