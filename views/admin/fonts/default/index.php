<? if(empty($fonts)) :?>
<p class="note note-danger">
	<i style="margin-right: 10px;" class="fa fa-warning"></i><?=Yii::t('app', 'Не найдено ни одного шрифта. ')?><?=Yii::t('app', 'Попробуйте изменить критерии фильтра')?>
</p>
<? endif; ?>
<div class="row">
    <div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
			<div class="panel panel-default filter" style=" margin-bottom: 0;">
			<div class="panel-heading pointer">
				<i style="margin-right: 5px;" class="fa fa-filter"></i> Настройка фильтра		
				<div style="float: right;" class="tools" style="display: block;">
					<i class="fa toggler fa-angle-up" style="display: none;"></i>
					<i class="fa toggler fa-angle-down"></i>
				</div>
			</div>
			<div class="panel-body form form-horizontal none" style="display: none;">
				<?=CHtml::beginForm(FALSE, 'GET')?>
					
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-body ">
									<div class="form-group ">
										<label class="control-label" style="padding: 10px 5px;"><strong>Категории шрифта</strong></label>		
										<div class="checkbox-list">
										<? foreach ($fontscategory_object as $key => $value) : ?>
											<label>
												<div style="display:inline-block;">
													<input type="checkbox" name="fonts_category[]" value="<?= $value->alias?>" <? if (array_key_exists('fonts_category', $filter)) { for ($i = 0; $i < count($filter['fonts_category']); $i++) { if($filter['fonts_category'][$i] == $value->alias)  {?> checked="checked"<? } }} ?>/>
												</div> <?=$value->lang->title?>
											</label>
										<? endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-body ">
									<div class="form-group ">
										<label class="control-label" style="padding: 10px 5px;"><strong>Начертание шрифта</strong></label>		
										<div class="radio-list">
										<? foreach ($fontswriting_object as $key => $value) : ?>
											<label>
												<div style="display:inline-block;">
													<input type="radio" id="<?= $value->id?>" name="fonts_writing" value="<?= $value->alias?>" <? if ((array_key_exists('fonts_writing', $filter)) && ($filter['fonts_writing'] == $value->alias)) : ?> checked="checked"<? endif; ?> />
												</div> <?=$value->lang->title?>
											</label>
											<? endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<!--<div class="col-md-4">
								<div class="form-body ">
									<div class="form-group">
										<label class="control-label"><strong>Толщина</strong></label>
										<input type="range" min="0" max="9" step="1" value="2"> 
										<div style="float: left; font-size: 12px;">Тонкий</div>
										<div style="float: right; font-size: 12px;">Толстый</div>
									</div>
								</div>
								<div class="form-body ">
									<div class="form-group ">
										<label class="control-label"><strong>Уклон</strong></label>
										<input type="range" min="0" max="9" step="1" value="7"> 
										<div style="float: left; font-size: 12px;">Прямой</div>
										<div style="float: right; font-size: 12px;">Наклонный</div>
									</div>
								</div>
								<div class="form-body ">
									<div class="form-group ">
										<label class="control-label"><strong>Ширина</strong></label>
										<input type="range" min="0" max="9" step="1" value="5"> 
										<div style="float: left; font-size: 12px;">Узкий</div>
										<div style="float: right; font-size: 12px;">Широкий</div>
									</div>
								</div>
								
								</div>-->
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" value="Найти" class="btn green-meadow" name="btn_filter">				
						<a class="btn red" onclick="location.href='/admin/fonts/default/index'" href="javascript: void(0)">Сбросить фильтр</a>
					</div>
				<?=CHtml::endForm()?>
			</div>
		</div>
	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div style="margin: 20px 0;">
					<div class="row">
						<div class="col-md-2">
							<?=CHtml::beginForm($this->createUrl('create'))?>
							<?=CHtml::submitButton(Yii::t('app', 'Добавить шрифт'), array('class' => 'btn green-meadow'))?>
							<?=CHtml::endForm()?>
						</div>
						<div class="col-md-3">
							<select id="changeType" class="normal form-control">
								<option value="rus">Съешь еще этих мягких французких булочек</option>
								<option value="eng">Grumpy wizards make toxic brew for the evil Queen and Jack</option>
								<option value="text">Ввести свой текст</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" id='EditText' class="normal form-control" style='display: none;' value="" />
						</div>
						<div class="col-md-4">
							<div style="float:right;">
								<div style="display: inline-block;"><?=Yii::t('app', 'Отображать на странице')?>:</div>
								<div class="btn-group btn-group-xs btn-group-solid" style=" margin-left: 5px;">
								<?=CHtml::link(Yii::t('app', '10'), '/admin/fonts/default/index/unit/10', array('class' => 'btn btn-default'))?>
								<?=CHtml::link(Yii::t('app', '25'), '/admin/fonts/default/index/unit/25', array('class' => 'btn btn-default'))?>
								<?=CHtml::link(Yii::t('app', '50'), '/admin/fonts/default/index/unit/50', array('class' => 'btn btn-default'))?>
								</div>
								<!--<div style="margin-top: 20px;">
									<div style="display: inline-block;"><?//=Yii::t('app','Введите свое значение: ')?></div>
									<div style="display: inline-block;">
										<?//= CHtml::beginForm() ?>
											<?//= CHtml::textField('unit', '', array('size' => '5'))?>
											<?php //echo CHtml::submitButton('Применить', array('name' => 'btn-unit', 'class' => 'btn150', 'style' => 'float: none;')); ?>
										<?//= CHtml::endForm() ?>
									</div>
								</div>-->
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box green-meadow">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Шрифты')?>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-hover" id="fonts" style="text-align:center">
							<thead>
							<tr class="top-table" >
								<th style="text-align: center;"><?=Yii::t('app', 'п.№')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Написание')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Категория шрифта')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Название')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Пример')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Статус')?></th>
								<th class="action" style="text-align: center !important"><?=Yii::t('app', 'Действия')?></th>
							</tr>
							</thead>
							<?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * $unit + 1; ?>
								<? foreach($fonts as $key => $font) :?>  

									<tr>
										<td><?=$font->id?></td>
										<td><?=CHtml::encode($font->writing->lang->title)?></td>
										<td><?=CHtml::encode($font->category->lang->title)?></td>
										<td><?=CHtml::encode($font->title)?></td>
										<td style="width: 50%; font-size: 30px;">
										<style>
											@font-face {
											font-family: '<?= $font->title?>'; 
											src: url("<?= $font->path?>");
											}
											
											.id_div<?=$font->id?> {
												font-family: '<?= $font->title?>';
											}
										</style>
											<p class="font-wrapper id_div<?=$font->id?>">Съешь еще этих мягких французких булочек</p>
											
										</td>
										<td>
										<? if($font->is_used == 1) : ?>
											<span class="label label-sm label-success">Включено</span>
											<? else : ?>
											<span class="label label-sm label-danger">Выключено</span>
											<? endif; ?>
										
											 
										</td>
																			  
										<td style="white-space: nowrap; word-wrap: normal;">
											<? if (Yii::app()->user->checkAccess('AdminFontsDefaultEdit')) : ?>
												<?=CHtml::link(Yii::t('app', '<button class="btn green-haze"><i class="glyphicon glyphicon-pencil"></i></button>'), $this->createUrl('default/create', array('action' => 'edit', 'id' => $font->id)))?>
											<? endif; ?>
											<? if (Yii::app()->user->checkAccess('AdminNewsNewsDeletenews')) : ?>
											<?=CHtml::linkButton(Yii::t('app', '<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>'),array(
												'submit' => array('default/deletefont', 'id' => $font->id),
												'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
												'confirm' => Yii::t('app', 'Удалить шрифт?')));  ?>
											<? endif; ?>
										</td>
									</tr>
									
								<? endforeach; ?>

					</table>
				</div>
					
			</div>
		</div>
	<div style="float:right;">
		
		<? $this->widget('CLinkPager', array('pages' => $pages))?>
	</div>
    </div>
</div>