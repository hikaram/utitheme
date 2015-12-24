<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.modules.admin.modules.news.css'))?>/css/adminnews.css" type="text/css" media="screen, projection" />
<?
    Yii::app()->clientScript->scriptMap['jquery.js'] = Yii::app()->theme->baseUrl . '/public/assets/global/plugins/jquery-1.11.0.min.js';
 ?>
 <? if ((empty($news)) && (empty($filter))) : ?>
    <div class="note note-success"><?=Yii::t('app', 'Новости не созданы')?>.
        <? if (Yii::app()->user->checkAccess('AdminNewsNewsCreate')) : ?>
            <?=Yii::t('app', 'Вы можете')?> <?=CHtml::link(Yii::t('app', 'создать новую'), $this->createUrl('create'))?> <?=Yii::t('app', 'новость')?>
        <? endif; ?>
    </div>
<? else : ?>
    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Новости')?>
            </div>
        </div>
       <div class="portlet-body">
            <div class="note note-info">
                <h4 style="margin-bottom: 0;">
                    <?=Yii::t('app', 'Всего новостей: ')?><?=$totalCount?>.
                    <? if (!empty($filter)) : ?>
                        <?=Yii::t('app', 'По запросу найдено: ')?><?=$count?>
                    <? endif; ?>
                </h4>
            </div>

            <div class="form-actions" style="margin-bottom: 20px;">
                <? if (Yii::app()->user->checkAccess('AdminNewsNewsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новую новость'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>             

            <?=CHtml::hiddenField(FALSE, $dir, ['id' => 'dirField'])?>

            <?php echo $this->renderPartial('_filter', [
                'filter'    => $filter
            ]); ?>

            <? if (empty($news)) : ?>
            
                <div class="note note-danger" style="margin-top: 20px;">
                    <p>
                        <?=Yii::t('app', 'Не найдено ни одной новости, удовлетворяющей условиям фильтрации. Сбросьте фильтр или измените поисковые данные')?>
                    </p>
                </div>             

            <? else : ?>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="dataTables_length" id="objects_length" style="display: inline-block;">
                            <label>  
                                <select id="pageSizeSeletor" name="objects_length" aria-controls="objects" class="form-control input-xsmall input-inline" onChange="changePageSize()">
                                    <? if (!in_array($unit, [25, 50, 100])) : ?>
                                        <option value="" selected="selected"></option>
                                    <? endif; ?>
                                    <option value="25" <? if ($unit == 25) : ?>selected="selected"<? endif; ?>>25</option>
                                    <option value="50" <? if ($unit == 50) : ?>selected="selected"<? endif; ?>>50</option>
                                    <option value="100" <? if ($unit == 100) : ?>selected="selected"<? endif; ?>>100</option>
                                </select> <?=Yii::t('app', 'записей на странице')?>
                            </label>
                        </div>
                        <div id="objects_filter" class="dataTables_filter" style="display: inline-block; margin-left: 20px;">
                            <?= CHtml::beginForm() ?>
                                <label><?=Yii::t('app','Введите свое значение')?>:
                                    <input type="number" min="1" max="500" value="<?=$unit?>" step="1" size="7" class="form-control input-xsmall input-inline" name="unit" />
                                </label>        
                                <?php echo CHtml::submitButton(Yii::t('app', 'Применить'), array('name' => 'btn-unit', 'class' => 'btn green', 'style' => 'float: none;')); ?>
                            <?= CHtml::endForm() ?>                                
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">

                    </div>
                </div>

                <div class="table-scrollable">
                    <table class="table table-hover" id="news">
                        <thead>
                            <tr class="top-table" >
                                <th ><?=Yii::t('app', '№ п/п')?></th>
                                <th >
                                    <?=Yii::t('app', 'Период публикации')?>
                                    <? if ($dir == News::DerictionTypeAsc) : ?>
                                        <span class="dir-up"></span>
                                        <?=CHtml::link('<span class="dir-bottom"></span>', $this->createUrl('index', ['unit' => $unit, 'dir' => News::DerictionTypeDesc]))?>
                                    <? else : ?>
                                        <?=CHtml::link('<span class="dir-up"></span>', $this->createUrl('index', ['unit' => $unit, 'dir' => News::DerictionTypeAsc]))?>
                                        <span class="dir-bottom"></span>
                                    <? endif; ?>
                                </th>
                                <? if ($is_news_show_source) : ?><th ><?=Yii::t('app', 'Источник')?></th><? endif; ?>
                                <? if ($is_news_show_source_title) : ?><th ><?=Yii::t('app', 'Название источника')?></th><? endif; ?>
                                <th ><?=Yii::t('app', 'Тема')?></th>
                                <th ><?=Yii::t('app', 'Изображение')?></th>
                                <? if ($is_news_show_at_home) : ?><th ><? $colspan++; ?><?=Yii::t('app', 'Отображать на главной')?></th><? endif; ?>
                                <? if ($is_news_show_at_office) : ?><th ><? $colspan++; ?><?=Yii::t('app', 'Отображать в кабинете')?></th><? endif; ?>
                                <th ><?=Yii::t('app', 'Действия')?></th>
                            </tr>
                        </thead>

                        <?php $i = ((array_key_exists('page', $_GET) ? $_GET['page'] : (int)TRUE) - 1) * $unit + 1; ?>
                    
                        <? foreach($news as $key => $new) :?>  
                            <tr>
                                <td><?=$i++?></td>
                                <td>
                                    <? if ($new->publication_from != NULL) : ?>
                                        <?=Yii::t('app', 'от')?> <?=MSmarty::date_format($new->publication_from, 'd.m.Y')?> <?=MSmarty::date_format($new->publication_from, '%H:%M')?><br />
                                    <? endif; ?>
                                    <? if ($new->publication_end != NULL) : ?>
                                        <?=Yii::t('app', 'до')?> <?=MSmarty::date_format($new->publication_end, 'd.m.Y')?> <?=MSmarty::date_format($new->publication_end, '%H:%M')?><br />
                                    <? endif; ?>                                    
                                </td>
                                <? if ($is_news_show_source) : ?><td><?=CHtml::encode($new->source)?></td><? endif; ?>
                                <? if ($is_news_show_source_title) : ?><td><?=CHtml::encode($new->source_title)?></td><? endif; ?>
                                <td><?=CHtml::encode($new->lang->title)?></td>
                                <td>
                                    <? if (($new->attachment != NULL) && ($new->attachment->secret_name != null)) :?><?=CHtml::image(MSmarty::attachment_get_file_name($new->attachment->secret_name, $new->attachment->raw_name, $new->attachment->file_ext, '_home_size_3', 'news_picture'), ''); ?>
                                    <? else : ?><span style="font-size:12px;width:50px;height:50px;" class="btn default disabled"><i class="fa fa-file-image-o" style="font-size:22px;line-height:1.5;"></i></span>
                                    <? endif; ?>
                                </td>
                                <? if ($is_news_show_at_home) : ?>
                                    <td>
                                        <? if ($new->show_at_home) : ?><span class="apply">&nbsp;</span>
                                        <? else : ?><span class="cancel">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                <? endif; ?>
                                <? if ($is_news_show_at_office) : ?>
                                    <td>
                                        <? if ($new->show_at_office) : ?><span class="apply">&nbsp;</span>
                                        <? else : ?><span class="cancel">&nbsp;</span>
                                        <? endif; ?>
                                    </td>
                                <? endif; ?>                                         
                                <td style="white-space: nowrap; word-wrap: normal;">

                                    <? if (($new->created_at != NULL) || ($new->creator != NULL) || ($new->modified_at != NULL) || ($new->redactor != NULL)) : ?>
                                        <span type="button" class="btn blue-steel popovers"
                                            data-trigger="hover" 
                                            data-placement="left" 
                                            data-html="true"
                                            data-content="
                                                <? if ($new->created_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата создания')?>:</span>
                                                    <?=MSmarty::date_format($new->created_at, 'd.m.Y')?> <?=MSmarty::date_format($new->created_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($new->creator != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Автор')?>:</span>
                                                    <?=$new->creator->username?><br/>
                                                <? endif; ?>
                                                <? if ($new->modified_at != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Дата редактирования')?>:</span>
                                                    <?=MSmarty::date_format($new->modified_at, 'd.m.Y')?> <?=MSmarty::date_format($new->modified_at, 'H:i')?><br/>
                                                <? endif; ?>
                                                <? if ($new->redactor != NULL) : ?>
                                                    <span class='text-semibold'><?=Yii::t('app', 'Логин редактировавшего')?>:</span>
                                                    <?=$new->redactor->username?><br/>
                                                <? endif; ?>
                                            " 
                                            data-original-title="<?=Yii::t('app', 'Дополнительная информация')?>"
                                        >
                                            <i class="fa fa-info"></i>
                                        </span>
                                    <? endif; ?>
                                
                                    <? if (Yii::app()->user->checkAccess('AdminNewsNewsViewnews')) : ?>
                                        <?=CHtml::link('<button class="btn blue-steel"><i class="glyphicon glyphicon-eye-open"></i></button>', $this->createUrl('news/viewnews', array('id' => $new->id)), [
                                            'class' => 'tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Просмотр')
                                        ])?>
                                    <? endif; ?>
                                    <? if (Yii::app()->user->checkAccess('AdminNewsNewsEdit')) : ?>
                                        <?=CHtml::link('<button class="btn green-seagreen"><i class="glyphicon glyphicon-pencil"></i></button>', $this->createUrl('news/create', array('action' => 'edit', 'id' => $new->id)), [
                                            'class' => 'tooltips',
                                            'data-container' => 'body', 
                                            'data-placement' => 'bottom',
                                            'data-original-title' => Yii::t('app', 'Редактировать')
                                        ])?>
                                    <? endif; ?>
                                    <? if (Yii::app()->user->checkAccess('AdminNewsNewsDeletenews')) : ?>
                                    <?=CHtml::linkButton('<button class="btn red"><i class="glyphicon glyphicon-remove"></i></button>',array(
                                        'submit' => array('news/deletenews', 'id' => $new->id),
                                        'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                        'confirm' => Yii::t('app', 'Удалить новость?'),
                                        'class' => 'tooltips',
                                        'data-container' => 'body', 
                                        'data-placement' => 'bottom',
                                        'data-original-title' => Yii::t('app', 'Удалить')
                                    ));  ?>
                                    <? endif; ?>
                                </td>
                            </tr>
                        <? endforeach; ?> 
                    </table>
                </div>
            
                <? $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                    'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                    'header' => '',
                    'selectedPageCssClass' => 'active',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    )
                )) ?>  

            <? endif; ?>

            <div class="form-actions">
                <? if (Yii::app()->user->checkAccess('AdminNewsNewsCreate')) : ?>
                    <?=CHtml::link(Yii::t('app', 'Создать новую новость'), $this->createUrl('create'), array('class' => 'btn green'));?>
                <? endif; ?>
            </div>                               
            
        </div>
    </div>

<? endif; ?>
<? /*

    </div>
</div>

<? if ((Yii::app()->user->checkAccess('AdminNewsNewsCreate')) && (!empty($news))) : ?>
    <a href="<?=$this->createUrl('create')?>"><?=Yii::t('app', 'Добавить новость')?></a>
<? endif; ?>

<?
    //стили
    Yii::app()->clientScript->registerCss('fff', '
        table {border-top:none !important;}
        tr {border-collapse: unset !important;}
        td,th {vertical-align:middle !important; text-align:center !important}
        td img,th img {width:50px; height:50px;d}
        ');
?>

<script>
    function changePageSize()
    {
        var value = $('#pageSizeSeletor option:selected').val();
        location.href=app.createAbsoluteUrl('admin/news/news/index/unit/' + value);
    }
</script>
*/ ?>