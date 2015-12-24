<div id="block_edit" class="block_edit">
    <form id="add_content-form">
        <input type="hidden" id="PagesWidgets_page__id" value="<?=$blocks['page']->id;?>" />
        <table class="form">
            <tr>
                <td width="140"><?=Yii::t('app', 'Тип содержимого')?></td>
                <td>
                    <select id="PagesWidgets_object_alias" class="normal">
                        <option value="contents"><?=Yii::t('app', 'Текстовый блок')?></option>
                        <option value="moving_contents"><?=Yii::t('app', 'Перемещаемый текстовый блок')?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?=Yii::t('app', 'Тесктовый блок')?></td>
                <td>
                    <select id="PagesWidgets_object_id" class="normal">
                        <?foreach($contents_objects as $id => $content) : ?>
                            <option value="<?=$contents_objects[$id]->id;?>"><?=$contents_objects[$id]->name;?></option>
                        <?endforeach;?>
                    </select>                
                    <br /><a href="#" onClick="block.create_content()"><?=Yii::t('app', 'Создать новый')?></a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="block.edit_content('false', null, null, <?=$blocks['page']->id;?>)"><?=Yii::t('app', 'Редактировать текущий')?></a>   
                </td>
            </tr>
        </table>
        <div class="content_preview" id="content_preview"></div><br />
        <input type="button" value="<?=Yii::t('app', 'Просмотр')?>" class="btn100" onClick="block.preview()" />
        <input type="button" value="<?=Yii::t('app', 'Сохранить')?>" class="btn100" onClick="block.save()" />
        <input type="button" value="<?=Yii::t('app', 'Отмена')?>" class="btn100" onClick="block.hide()" />
    </form>
</div>