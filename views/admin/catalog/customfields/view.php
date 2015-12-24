<?php
    $this->breadcrumbs[Yii::t('app', 'Панель управления')] = array('/admin');
    $this->breadcrumbs[Yii::t('app', 'Управление продукцией')] = array('/admin/catalog');
    $this->breadcrumbs[Yii::t('app', 'Настраиваемые поля продуктов')] = array('index');
    $this->breadcrumbs[Yii::t('app', 'Просмотр поля')] = array('customfields/view/id/' . $model->id);
?>

<div class="portlet box blue-steel h5">
	<div class="portlet-title">
		<h3 class="caption">
			<i class="glyphicon glyphicon-eye-open mr10"></i>
			<?=Yii::t('app', 'Настраиваемое поле')?> "<?=CHtml::encode($model->name)?>""
		</h3>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">

			<table class="table table-hover" id="field">
				<tbody>
					<tr>
						<td width="250"><?=Yii::t('app', 'Номер поля')?>:</td>
						<td width="500"><?=CHtml::encode($model->id)?></td>
					</tr>

					<tr>
						<td><?=Yii::t('app', 'Имя')?>:</td>
						<td><?=CHtml::encode($model->name)?></td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Формат')?>:</td>
						<td><?=CHtml::encode(CustomFieldsFormats::item($model->field_format))?></td>
					</tr>
					<? if ($model->field_format != CustomFields::FLOAT) : ?>
						<tr>
							<td><?=Yii::t('app', 'Регулярное выражение')?>:</td>
							<td><?=CHtml::encode($model->regexp)?></td>
						</tr>
					<? endif; ?>
					<tr>
						<td><?=Yii::t('app', 'Минимальная длина')?>:</td>
						<td><?=CHtml::encode($model->min_length)?></td>
					</tr>  
					<tr>
						<td><?=Yii::t('app', 'Максимальная длина')?>:</td>
						<td><?=CHtml::encode($model->max_length)?></td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Обязательное')?>:</td>
						<td>
							<? if ($model->is_required) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr> 
					<tr>
						<td><?=Yii::t('app', 'Для всех')?>:</td>
						<td>
							<? if ($model->is_for_all) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Является фильтром')?>:</td>
						<td>
							<? if ($model->is_filter) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Позиция')?>:</td>
						<td><?=CHtml::encode($model->position)?></td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Доступно для поиска')?>:</td>
						<td>
							<? if ($model->searchable) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Редактируемый')?>:</td>
						<td>
							<? if ($model->editable) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Видимый')?>:</td>
						<td>
							<? if ($model->visible) : ?><span title="Да" class="true">&nbsp;</span>
							<? else : ?><span title="Нет" class="false">&nbsp;</span>
							<? endif; ?>            
						</td>
					</tr>
					<tr>
						<td><?=Yii::t('app', 'Значения по умолчанию')?>:</td>
						<td>
							<? foreach ($model->possibleValuesDefault as $key => $defaultValue) : ?>
								<?=CHtml::encode($defaultValue->value); ?>
								<? if (array_key_exists($key + 1, $model->possibleValuesDefault)) : ?>
									,&nbsp;
								<? endif; ?>
							<? endforeach ?>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="form-actions">
			<?=CHtml::link(Yii::t('app', 'К списку полей'),'/admin/catalog/customfields/index',  array('id' => 'open_custom_field_preview', 'class' => 'btn green'))?>
		</div>
	</div>
</div>