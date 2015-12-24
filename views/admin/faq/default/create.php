
<?=CHtml::beginForm() ?>

<div class="note note-info">
    <i class="fa fa-info" style="margin-right: 10px;"></i> <?=Yii::t('app', 'Все поля обязательны для заполнения')?>
</div>

<?=CHtml::errorSummary([$model, $model_lang], '<div class="note note-danger"><i class="fa fa-warning" style="margin-right: 10px;"></i> ' . Yii::t('app', 'Необходимо исправить следующие ошибки') . ':', '</div>', ['style' => 'display: inline-table;'])?>

<div class="portlet green box">
	<div class="portlet-title">
		<div class="caption">
			<? if ((boolean)$model->isNewRecord == TRUE) : ?>
				<i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Добавление вопроса')?>
			<? else : ?>
				<i class="glyphicon glyphicon-pencil"></i> <?=Yii::t('app', 'Редактирование вопроса')?>
			<? endif;?> 
		</div>
	</div>
	<div class="portlet-body form form-horizontal">
		<div class="form-body">
			<div class="mt20"></div>
			<div class="form-group">
                <label for="" class="col-md-3 control-label"><?=Yii::t('app', 'Вопрос') ?></label>
				<div class="col-md-9">
					<div class="input-icon right">
						<i class="fa fa-exclamation tooltips" style="color:#f3565d; display:none;" data-original-title="<?=$model_lang->getError('text');?>" data-container="body"></i>
						<?=CHtml::activeTextArea($model_lang,'text', array('class' => 'form-control input-large')); ?>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model_lang->getError('text');?></p>
				</div>
			</div>
            <? if ($model->isNewRecord) : ?>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label"><?=Yii::t('app', 'Ответ') ?></label>
                    <div class="col-md-9 ckeditor <? if($model->hasErrors('answersForm')) echo "error"; ?> ">
                        <?=CkeditorHelper::init(array('name' => 'Faq[answersForm][0][text]', 'type' => 'content', 'ckfinder' => true, 'value' => ((array_key_exists(0, $model->answersForm)) && (array_key_exists('text', $model->answersForm[0]))) ? $model->answersForm[0]['text'] : (string)FALSE)) ?>
                        <p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('answersForm')?></p>
                    </div>
                </div>
            <? else : ?>
                <? foreach ($model->answers as $answer) : ?>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"><?=Yii::t('app', 'Ответ') ?></label>
                        <div class="col-md-9 ckeditor <? if($model->hasErrors('answersForm')) echo "error"; ?> ">
                            <?=CkeditorHelper::init(array('name' => 'Faq[answersForm][' . sha1($answer->id) . '][text]', 'type' => 'content', 'ckfinder' => true, 'value' => ((array_key_exists(sha1($answer->id), $model->answersForm)) && (array_key_exists('text', $model->answersForm[sha1($answer->id)]))) ? $model->answersForm[sha1($answer->id)]['text'] : $answer->lang->text)) ?>
                            <p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('answersForm')?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
            
            
            
			<div class="form-group">
                <?=CHtml::activeLabel($model,'show_type',array('class'=>'col-md-3 control-label')); ?>
				<div class="col-md-9">
					<div class="input-icon input-large right">
						<i class="fa fa-exclamation tooltips font-red" style="display:none;" data-original-title="<?=$model->getError('show_type');?>" data-container="body"></i>
                        <?=CHtml::activeListBox($model, 'show_type', Faq::getShowTypesList(), array('class' => 'form-control', 'size' => (int)TRUE)) ?>
					</div>
					<p class="help-block text-danger" style="color: #a94442;"><?=$model->getError('show_type');?></p>
				</div>
			</div>
            
            
		</div>
		<div class="form-actions">
			<?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Сохранить'), array ('class' => 'btn green', 'name' => 'btn_save')); ?>
			<? if (Yii::app()->user->checkAccess('AdminFaqDefaultIndex')) : ?>
				<?=CHtml::link(Yii::t('app', 'К списку вопросов'), $this->createUrl('index'), array('class' => 'btn grey'))?>
			<? endif; ?>
		</div>
	</div>
<?=CHtml::endForm(); ?>



<? /*
<h1>
    <? if ($model->isNewRecord) : ?>
        <?=Yii::t('app', 'Создание вопроса-ответа')?>
    <? else : ?>
        <?=Yii::t('app', 'Редактирование вопроса-ответа')?>
    <? endif; ?>
</h1>
    
<?=CHtml::beginForm() ?>

    <p class="note"><?=Yii::t('app', 'Все поля обязательны для заполнения')?></p>

    <div class="error-summary"><?=CHtml::errorSummary(array($model_lang, $model)); ?></div>

    <div class="pad"></div>

    <table class="form">
        <tbody>
            <tr>
                <td style="padding-top: 10px; vertical-align: top;"><?=Yii::t('app', 'Вопрос') ?></td>
                <td><?=CHtml::activeTextArea($model_lang,'text', array('class' => 'normal', 'style' => 'width: 99%;')); ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="color: red;"><?=$model_lang->getError('text')?></td>
            </tr>
            <? if ($model->isNewRecord) : ?>
                <tr>
                    <td style="padding-top: 10px; vertical-align: top;"><?=Yii::t('app', 'Ответ') ?></td>
                    <td><?=CkeditorHelper::init(array('name' => 'Faq[answersForm][0][text]', 'type' => 'content', 'ckfinder' => true, 'value' => ((array_key_exists(0, $model->answersForm)) && (array_key_exists('text', $model->answersForm[0]))) ? $model->answersForm[0]['text'] : (string)FALSE)) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="color: red;"><?=$model->getError('answersForm')?></td>
                </tr>
            <? else : ?>
                <? foreach ($model->answers as $answer) : ?>
                    <tr>
                        <td style="padding-top: 10px; vertical-align: top;"><?=Yii::t('app', 'Ответ') ?></td>
                        <td><?=CkeditorHelper::init(array('name' => 'Faq[answersForm][' . sha1($answer->id) . '][text]', 'type' => 'content', 'ckfinder' => true, 'value' => ((array_key_exists(sha1($answer->id), $model->answersForm)) && (array_key_exists('text', $model->answersForm[sha1($answer->id)]))) ? $model->answersForm[sha1($answer->id)]['text'] : $answer->lang->text)) ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color: red;"><?=$model->getError('answersForm')?></td>
                    </tr>    
                <? endforeach; ?>
            <? endif; ?>
            
            
            <tr>
                <td style="padding-top: 10px; vertical-align: top;"><?=CHtml::activeLabel($model,'show_type'); ?></td>
                <td><?=CHtml::activeListBox($model, 'show_type', Faq::getShowTypesList(), array('size' => (int)TRUE)) ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="color: red;"><?=$model->getError('show_type')?></td>
            </tr>
        </tbody>
    </table>

    <br />

    <?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn150', 'name' => 'btn_save')); ?>
        
    <? if (Yii::app()->user->checkAccess('AdminFaqDefaultIndex')) : ?>
        <?=CHtml::link(Yii::t('app', 'К списку вопросов'), $this->createUrl('index'), array('style' => 'position: relative; left: 40px; top: 7px;'))?>
    <? endif; ?>

<?=CHtml::endForm(); ?>
*/ ?>