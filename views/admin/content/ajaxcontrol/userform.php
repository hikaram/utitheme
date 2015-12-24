<table class="form">
    <?=CHtml::activeHiddenField($model, 'id')?>
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
                <?=CkeditorHelper::init(array('name' => 'UserContentsLang[text]', 'type' => 'content', 'ckfinder' => true, 'height: 100%', 'width: 100%')) ?>
            </div>
            <div style="display: none;">
                <?=CHtml::activeTextArea($modelLang, 'text')?>
            </div>
            <br />
            <div class="contenterrors" id="texterror" style="color: red; display: none; text-align: left;"></div>
        </td>
    </tr>
</table>

<?=CHtml::hiddenField('ckeditor[0]', 'UserContentsLang[text]', array('class' => 'ckeditor-flag'))?>