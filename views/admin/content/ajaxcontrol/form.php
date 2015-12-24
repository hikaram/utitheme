<table class="form">
    <tr>
        <td width="70"><?=$model->getAttributeLabel('name')?></td>
        <td style="text-align: left">
            <?=CHtml::activeTextField($model, 'name', array('class' => 'wide'))?>:<br />
            <div class="contenterrors" id="nameerror" style="color: red; display: none; text-align: left;"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div id = "CkEditor">
                <?=CkeditorHelper::init(array('name' => 'ContentsLang[text]', 'type' => 'content', 'ckfinder' => true, 'height' => '310px')) ?>
            </div>
            <div style="display: none;">
                <?=CHtml::activeTextArea($modelLang, 'text')?>
            </div>
            <br />
            <div class="contenterrors" id="texterror" style="color: red; display: none; text-align: left;"></div>
        </td>
    </tr>
</table>

<?=CHtml::hiddenField('ckeditor[0]', 'ContentsLang[text]', array('class' => 'ckeditor-flag'))?>