
<? if(empty($ckeditorplugin)) :?>
<p class="note note-danger">
	<i style="margin-right: 10px;" class="fa fa-warning"></i><?=Yii::t('app', 'Не найдено ни одного плагина. ')?>
</p>
<? else: ?>
<div class="row">
    <div class="col-md-12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box yellow-crusta">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Плагины Ckeditor')?>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-hover" id="ckeditorplugin" style="text-align:center">
							<thead>
							<tr class="top-table" >
								<th style="text-align: center;"><?=Yii::t('app', 'п.№')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Конфигурация')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Название')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Краткое описание')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Полное описание')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Ссылка на страницу плагина')?></th>
								<th style="text-align: center;"><?=Yii::t('app', 'Статус')?></th>
							</tr>
							</thead>
								<? foreach($ckeditorplugin as $key => $plugin) :?>  
								
									<tr>
										<td><?=$plugin->id?></td>
										<td><?=CHtml::encode($plugin->config->alias)?></td>
										<td><?=CHtml::encode($plugin->lang->title)?></td>
										<td><?=CHtml::encode($plugin->lang->short_text)?></td>
										<td><?=CHtml::encode($plugin->lang->text)?></td>
										<td><a href="<?=CHtml::encode($plugin->url_path)?>" target="_blank"><?=CHtml::encode($plugin->url_path)?></a></td>
                                        <td>
                                             <?php if($plugin->is_used == 1) : ?>
                                                   <input id="<?=$plugin->id?>" class="make-switch switch" type="checkbox" value="1" data-off-color="warning" data-on-color="success" data-on-text="ВКЛ" data-off-text="ВЫКЛ" checked>
                                             <?php else : ?>
                                                    <input id="<?=$plugin->id?>" class="make-switch switch" type="checkbox" value="0" data-off-color="warning" data-on-color="success" data-on-text="ВКЛ" data-off-text="ВЫКЛ">
                                             <?php endif; ?>
                                        </td>
										
									</tr>
									
								<? endforeach; ?>

					</table>
				</div>
					
			</div>
		</div>
    </div>
</div>
<? endif; ?>