<div class="row">
    <div class="col-md-12 news-page blog-page" style="word-wrap: break-word;">
        <div class="row">
            <div class="col-md-12 blog-tag-data" id="news">
                <h3><?=CHtml::encode($model->lang->title)?></h3>
                <? if (($model->attachment != NULL) && ($model->attachment->secret_name != null)) :?>
                    <?=CHtml::image(MSmarty::attachment_get_file_name($model->attachment->secret_name, $model->attachment->raw_name, $model->attachment->file_ext, '', 'news_picture'),'',array('class' => 'img-responsive')); ?>
                <? else : ?>
                    <?=Yii::t('app', 'Изображение отсутствует')?>
                <? endif; ?>   
                <div class="col-md-12 blog-tag-data-inner" style="margin:12px 0">
                    <ul class="list-inline">
                        <li style="float:left">
                            <i class="fa fa-calendar" style="color: #78cff8;"></i>
                            <?=Yii::t('app', 'Дата начала публикации')?>: <?=MSmarty::date_format($model->publication_from, 'd.m.Y')?> <?=MSmarty::date_format($model->publication_from, '%H:%M')?> 
                        </li>
                        <? if ($model->publication_end != NULL): ?>
						<li style="float:right">
                            <i class="fa fa-calendar" style="color: #78cff8;"></i>
                            <?=Yii::t('app', 'Дата окончания публикации')?>: <?=MSmarty::date_format($model->publication_end, 'd.m.Y')?> <?=MSmarty::date_format($model->publication_end, '%H:%M')?>
                        </li>
						<? endif; ?>
                    </ul>
                </div>
				
                <div class="news-item-page">
					<h5 style="margin-top:0;font-size:13px;">Сокращенный текст:</h5>
                    <blockquote class="hero">
                        <div style="font-size:13px"><?=($model->lang->brief_text)?></div>
                    </blockquote>
					<h5 style="margin-top:0;font-size:13px;">Полный текст:</h5>
					<p>
                        <?=$model->lang->text?>
                    </p>
                </div>
                <div class="col-md-12 form-horizontal">
                    <hr>
                    <? if ((bool)$model->news_type->is_allowed_show_source) : ?>
                        <div class="form-group">
                            <div class="col-md-2 text-right"><?=Yii::t('app', 'Источник')?>:</div>                    
                            <div class="col-md-7">
                                <?=CHtml::encode($model->source)?>
                            </div>
                        </div>
                     <? endif; ?>
                    <? if ((bool)$model->news_type->is_allowed_show_source_title) : ?>
                        <div class="form-group">
                            <div class="col-md-2 text-right"><?=Yii::t('app', 'Название источника')?>:</div>                    
                            <div class="col-md-7">
                                <?=CHtml::encode($model->source_title)?>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="form-group">
                        <div class="col-md-2 text-right"><?=Yii::t('app', 'Описание')?>:</div>                    
                        <div class="col-md-9">
                            <?=CHtml::encode($model->lang->description)?>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-md-2 text-right"><?=Yii::t('app', 'Ключевые слова')?>:</div>                    
                        <div class="col-md-9">
                            <?=CHtml::encode($model->lang->keywords)?>
                        </div>
                    </div>
                    <? if ((bool)$model->news_type->is_allowed_show_at_home) : ?>
                        <div class="form-group">
                            <div class="col-md-2 text-right"><?=Yii::t('app', 'Показывать на главной')?>:</div>                    
                            <div class="col-md-9">
                                <? if ($model->show_at_home) : ?><span title="<?=Yii::t('app', 'Да')?>" class="true">&nbsp;</span>
                                <? else :?><span title="<?=Yii::t('app', 'Нет')?>" class="false">&nbsp;</span>
                                <? endif; ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <? if ((bool)$model->news_type->is_allowed_show_at_office) : ?>
                        <div class="form-group">
                            <div class="col-md-2 text-right"><?=Yii::t('app', 'Показывать в кабинете')?>:</div>                    
                            <div class="col-md-9">
                                <? if ($model->show_at_office) : ?><span title="<?=Yii::t('app', 'Да')?>" class="true">&nbsp;</span>
                                <? else :?><span title="<?=Yii::t('app', 'Нет')?>" class="false">&nbsp;</span>
                                <? endif; ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <hr>
                </div>
                <form action="<?=$this->createUrl('news/create/action/edit/id/' . $model->id)?>">
                    <? if (Yii::app()->user->checkAccess('AdminNewsNewsEdit')) : ?>
                        <input type="submit" value="<?=Yii::t('app', 'Редактировать новость')?>" class="margin-top-20 btn blue" />
                    <? endif; ?>
                    <? if (Yii::app()->user->checkAccess('AdminNewsNewsIndex')) : ?>
                        <a href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('index')?>'" class="margin-top-20 btn default"><?=Yii::t('app', 'Назад')?></a>
                    <? endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>