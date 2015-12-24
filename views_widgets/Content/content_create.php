<div id="content_create" class="content_create">
    <form id="create_content-form" style="padding: 15px;">
        <input type="hidden" id="Content_lang" value="<?=Yii::app()->language;?>" />
        <table class="form" style="width: 100%;">
            <tr>
                <td width="70"><?=Yii::t('app', 'Имя блока')?></td>
                <td style="text-align: left"><input type="text" id="Contents_name" class="wide" /><br />
                <div class="contenterrors" id="nameerror" style="color: red; display: none; text-align: left;"></div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=CHtml::hiddenField('ContentsLang[text]', '', array('id' => 'textarearesult')); ?>
                    <? if (Yii::app()->user->checkAccess('AdminContentContentsSwitchMode')) : ?>
                        <div style="width: 100%; text-align: left; margin-left: 25px;"><?=CHtml::checkBox('useCkeditor', (int)TRUE, array('onChange' => 'showEditor()', 'id' => 'showEditorBox', 'style' => 'text-align: left;'))?>&nbsp;&nbsp;<?=Yii::t('app', 'Использовать визуальный редактор')?></div>
                    <? endif; ?>                
                    <?=FSmarty::ckeditor(array('name' => 'area[textareackeditor]', 'type' => 'content', 'ckfinder' => true, 'height' => '380px', 'width' => '100%')) ?><br />
                    <?=CHtml::textArea('area[textareablock]', '', array('id' => 'textareablock', 'style' => 'display: none;'))?>
                    <div class="contenterrors" id="texterror" style="color: red; display: none; text-align: left;"></div>
                </td>
            </tr>
        </table>
        <input type="button" value="<?=Yii::t('app', 'Сохранить')?>" class="btn100" onClick="block.content_save()" />
        <input type="button" value="<?=Yii::t('app', 'Отмена')?>" class="btn100" onClick="block.content_hide()" />
    </form>
</div>
