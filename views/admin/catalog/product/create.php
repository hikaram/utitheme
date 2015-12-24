<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<link href="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" id="locale"></script>
<?=Chtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.' . Yii::app()->language . '.js', array('id' => 'scriptSrc'))?>
<?=Chtml::hiddenField(FALSE, Yii::app()->params['hostMetronikStatic'] . '/public/assets/global/img', array('id' => 'imgLoaderSrc'))?>

<div class="note note-info">
    <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Поля помеченные')?> <span class="required">*</span> <?=Yii::t('app', 'обязательны к заполнению.')?>
</div>

<div class="portlet box green">
	<div class="portlet-title">
		<h3 class="caption"><i class="fa fa-cubes" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Создание продукта')?></h3>

        <div class="actions btn-set">
            <button type="button" class="btn default" onClick="location.href='<?=$this->createUrl('index')?>'"><i class="fa fa-angle-left"></i> <?=Yii::t('app', 'Назад')?></button>
            <button class="btn default" onClick="clearForm()"><i class="fa fa-reply"></i> <?=Yii::t('app', 'Сбросить')?></button>
            <button class="btn yellow" onClick="saveForm()"><i class="fa fa-check"></i> <?=Yii::t('app', 'Сохранить')?></button>
            <button class="btn yellow" onClick="saveFormStay()"><i class="fa fa-check-circle"></i> <?=Yii::t('app', 'Сохранить и создать новый')?></button>
        </div>
	</div>
	<div class="portlet-body">
        
        <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'products_form_main',
                'enableAjaxValidation'=>false,
                'htmlOptions'   => array(
                    'enctype'   => 'multipart/form-data',
                    'class'     => 'form-horizontal form-row-seperated'
                )
            ));
            echo $form->hiddenField($model, 'id', array('name' => 'product_id'));
        ?>


            <?=$form->errorSummary([$model_lang, $model], '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>


            <?=CHtml::hiddenField('stayOn', (int)FALSE, ['id' => 'stayOn'])?>
            <?=CHtml::hiddenField('btn_save', (int)FALSE, ['id' => 'btn_save'])?>

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_general" data-toggle="tab">
                        <?=Yii::t('app', 'Основные данные')?> </a>
                    </li>
                    <li>
                        <a href="#tab_meta" data-toggle="tab">
                        <?=Yii::t('app', 'Мета данные')?> </a>
                    </li>
                    <li>
                        <a href="#tab_images" data-toggle="tab">
                            <?=Yii::t('app', 'Изображения')?> 
                            <? if (!(bool)$isNewRecord) : ?>
                                <span class="badge badge-success"> <?=count($model->pictures)?> </span>
                            <? endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="#tab_fields" data-toggle="tab">
                            <?=Yii::t('app', 'Настраиваемые поля')?> 
                            <? if (!(bool)$isNewRecord) : ?>
                                <span class="badge badge-warning"> <?=count($model->customFields)?> </span>
                            <? endif; ?>
                        </a>
                    </li>
                    <? if ((!(bool)$isNewRecord) && (Yii::app()->isModuleInstall('Store'))) : ?>
                        <? if ((bool)$settings->is_reviews) : ?>
                            <li>
                                <a href="#tab_reviews" data-toggle="tab">
                                    <?=Yii::t('app', 'Отзывы')?>
                                    <span class="badge badge-info"> <?=$reviewListCount?> </span>
                                </a>    
                            </li>
                        <? endif; ?>
                        <li>
                            <a href="#tab_history" data-toggle="tab">
                                <?=Yii::t('app', 'История покупок')?> 
                                <span class="badge badge-success"> <?=$orderHistoryCount?> </span>
                            </a>

                        </li>
                    <? endif; ?>
                </ul>
                <div class="tab-content no-space">
                    <div class="tab-pane active" id="tab_general">
                        <div class="form-body">

                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang,'name', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textField($model_lang,'name',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'name')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model, 'article', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textField($model, 'article',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'article')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model, 'status', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->dropDownList($model, 'status', Products::gridStatusItems(), array('class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'status')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model, 'available', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->dropDownList($model, 'available', Products::gridAvailableItems(), array('class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'available')?></span>
                                </div>
                            </div>
                            <? if (!empty($specialStatuses)) : ?>
                                <div class="form-group" style="margin-top: 20px;">
                                    <?=$form->labelEx($model, 'product_special_statuses__id', array('class' => 'col-md-2 control-label'))?>
                                    <div class="col-md-10">
                                        <?=$form->dropDownList($model, 'product_special_statuses__id', ProductSpecialStatuses::getListForSelector(), array('class' => 'form-control'))?>
                                        <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'product_special_statuses__id')?></span>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if ($model->is_allowed_show_at_home) : ?>
                                <div class="form-group" style="margin-top: 20px;">
                                    <?=$form->labelEx($model, 'show_at_home', array('class' => 'col-md-2 control-label'))?>
                                    <div class="col-md-10">
                                        <?=$form->checkBox($model, 'show_at_home', Products::gridStatusItems(), array('class' => 'form-control'))?>
                                        <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'show_at_home')?></span>
                                    </div>
                                </div>
                             <? endif; ?>
                             <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model, 'currency__id', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=CHtml::activeListBox($model, 'currency__id', $currenciesList, array('class' => 'form-control', 'size' => 0)); ?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'currency__id')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model, 'price', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textField($model,'price',array('size'=>10,'maxlength'=>10, 'class' => 'form-control', 'id' => 'price')); ?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'price')?></span>
                                </div>
                            </div>
                            <? if($points_view) : ?>
                                <div class="form-group" style="margin-top: 20px;">
                                    <?=$form->labelEx($model, 'points', array('class' => 'col-md-2 control-label'))?>
                                    <div class="col-md-10">
                                        <?=$form->textField($model,'points',array('size'=>10,'maxlength'=>10, 'class' => 'form-control', 'id' => 'price')); ?>
                                        <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model, 'points')?></span>
                                    </div>
                                </div>
                            <? endif; ?>

                            <div class="form-group" style="margin-top: 20px;">
                                <div class='col-md-2 control-label'><?=$form->labelEx($model, 'catalogues')?>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-control height-auto">
                                        <div class="scroller" style="height:275px;" data-always-visible="1">
                                            <ul class="list-unstyled">
                                                <? foreach ($catalogList as $catalog) : ?>
                                                    <li>
                                                        <label><input type="checkbox" name="product[categories][]" value="<?=$catalog['id']?>" class="categoriesChecked" <? if (array_key_exists($catalog['id'], $catalogProducts)) : ?>checked="checked"<? endif; ?>><?=CHtml::encode($catalog['name'])?></label>
                                                        <?php echo $this->renderPartial('_catalog_selector_1', [
                                                            'list'              => $catalog['nodes'],
                                                            'catalogProducts'   => $catalogProducts
                                                        ]); ?>                                                            
                                                    </li>
                                                <? endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="help-block"><?=Yii::t('app', 'Выберите один или несколько каталогов')?></span>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'order_description', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textArea($model_lang,'order_description',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'order_description')?></span>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'brief_text', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=CkeditorHelper::init(array('name' => 'ProductsLang[brief_text]', 'type' => '', 'ckfinder' => true, 'value' => $model_lang->brief_text)) ?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'brief_text')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'description', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=CkeditorHelper::init(array('name' => 'ProductsLang[description]', 'type' => '', 'ckfinder' => true, 'value' => $model_lang->description)) ?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'description')?></span>
                                </div>
                            </div>
                            <? /*
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'youtube_iframe', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textArea($model_lang,'youtube_iframe',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'youtube_iframe')?></span>
                                </div>
                            </div>
                            */ ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_meta">

                        <div class="alert alert-success margin-bottom-10">
                            <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Данные для индексации в поисковых системах')?>
                        </div>

                        <div class="form-body">

                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'meta_description', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textArea($model_lang,'meta_description',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'meta_description')?></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <?=$form->labelEx($model_lang, 'meta_keywords', array('class' => 'col-md-2 control-label'))?>
                                <div class="col-md-10">
                                    <?=$form->textArea($model_lang,'meta_keywords',array('size'=>60,'maxlength'=>255, 'class' => 'form-control'))?>
                                    <span class="help-block text-danger" style="color: #a94442;"><?=$form->error($model_lang, 'meta_keywords')?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_images">

                        <div class="alert alert-success margin-bottom-10">
                            <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Вы можете загружать изображения в форматах')?>: jpg, jpeg, png, gif, bmp
                        </div>
    
                        <? if (empty($productPictures)) : ?>
                            <div class="alert alert-warning margin-bottom-10 product-empty-notification">
                                <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Загруженные изображения отсутствуют')?>
                            </div>

                        <? endif; ?>

                        <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                            <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow">
                            <i class="fa fa-plus"></i> <?=Yii::t('app', 'Выберите файлы')?> </a>
                            <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
                            <i class="fa fa-share"></i> <?=Yii::t('app', 'Загрузить')?> </a>
                        </div>

                        <div class="row">
                            <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12">
                            </div>
                        </div>

                        <div id="pictureIdsWrapper" style="display: none;">
                            <? foreach ($productPictures as $productPicture) : ?>
                                <input type="hidden" name="Pictures[ids][]" value="<?=$productPicture->id?>" class="pictureIds">
                            <? endforeach; ?>
                        </div>

                        <div id="pictureWrapper">

                            <?php echo $this->renderPartial('_pictures', [
                                'pictures'  => $productPictures
                            ]); ?>

                        </div>

                    </div>

                    <div class="tab-pane" id="tab_fields">

                        <? if (empty($customFieldCount)) : ?>

                            <div class="alert alert-success margin-bottom-10">
                                <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Настраиваемые поля отсутствуют')?>
                            </div>

                        <? else : ?>

                            <div class="alert alert-success margin-bottom-10">
                                <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Список настроаиваемых полей для продукта. Позволяет указать дополнительные характеристики товара')?>.
                                <? if (Yii::app()->user->checkAccess('AdminCatalogCustomfieldsIndex')) : ?>
                                    <?=Yii::t('app', 'Редактировать параметры настраиваемых полей можно на странице')?> <?=CHtml::link(Yii::t('app', 'упраления настраиваемыми полями'), $this->createUrl('/admin/catalog/customfields'), ['target' => '_blank'])?>
                                <? endif; ?>
                            </div>

                            <?php echo $this->renderPartial('_fields', [
                                'customFieldCount'  => $customFieldCount,
                                'model'             => $model,
                                'filter'            => []
                            ]); ?>

                        <? endif; ?>

                    </div>


                    <? if ((!(bool)$isNewRecord) && (Yii::app()->isModuleInstall('Store'))) : ?>
                        <? if ((bool)$settings->is_reviews) : ?>
                            <div class="tab-pane" id="tab_reviews">

                                <div class="alert alert-success margin-bottom-10">
                                    <i class="fa fa-warning fa-lg"></i> <?=Yii::t('app', 'Список отзывов для данного продукта')?>.
                                    <? if (Yii::app()->user->checkAccess('AdminCommentsAliasesCommentsGet')) : ?>
                                        <?=Yii::t('app', 'Если есть необходимость отредактировать оставленный отзыв, это можно сделать на')?> <?=CHtml::link(Yii::t('app', 'странице упраление комментариями'), $this->createUrl('/admin/comments/comments/index?filtertitle='. $model_lang->name), ['target' => '_blank'])?>
                                    <? endif; ?>
                                </div>

                                <div class="table-container" id="review-wrapper">

                                    <?php echo $this->renderPartial('_reviews', [
                                        'dataset'   => $reviewList,
                                        'productId' => $model->id,
                                        'filter'    => [],
                                        'isRatio'   => $settings->is_set_points
                                    ]); ?>

                                </div>
                            </div>
                        <? endif; ?>

                        <div class="tab-pane" id="tab_history">
                            <div class="table-container" id="history-wrapper">

                                <?php echo $this->renderPartial('_history', [
                                    'dataset'   => $orderHistory,
                                    'productId' => $model->id,
                                    'filter'    => []
                                ]); ?>

                            </div>

                        <? endif; ?>
                    </div>
                </div>
            </div> 

        <?php $this->endWidget();?>    

	</div>
</div>
