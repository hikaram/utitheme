<div id="edit_page_panel_manage">
    <div class="edit_page_toolbar">
        <div class="edit_page_toolbar-inner">
            <input type="checkbox" id="show_grid" onClick="block.show_grid()" />
            &nbsp;<span style="font-size: 12px; color: black;"><?=Yii::t('app', 'Показать сетку')?></span>
            <br /><br />
            <div class="main-title"><?=Yii::t('app', 'Элементы для отображения')?>:</div>
            <div class="description">
                <?=Yii::t('app', 'Для добавления элемента на страницу перетащите его в заданную область')?>                
            </div>            
            <br />

            <select id="object_aliases" class="normal" style="width: 100px;">
                <option value="content"><?=Yii::t('app', 'Текстовый блок')?></option>
            </select>
            <br /><br />
            <div class="all_description description">
                <div id="desc_content" style="display: none;">
                    <?=Yii::t('app', 'Добавление текстовых блоков на страницу')?>. 
                    <?=Yii::t('app', 'Управление текстовыми блоками возможно на странице')?> <a href="<?=Yii::app()->createUrl('admin/content/contents')?>" style="color: blue; text-decoration: none;" target="_blank"><?=Yii::t('app', 'администрирования')?></a>.<br />
                    <a style="color: blue; text-decoration: none;" onclick="block.create_content_wrapper()" href="javascript: void(0)"><?=Yii::t('app', 'Создать новый текстовый блок')?></a>
                </div>                
            </div>
            <br />
            <div id="block_text_description" class="block_text_description">
            </div>            
            <div id="edit_page_content" class="edit_page_content">
                
            </div>
            
            <a href="javascript: void(0)" style="text-decoration: none;" onClick="block.show_edit_panel()" class="l-show">&nbsp;</a>
            <a href="javascript: void(0)" style="text-decoration: none; display: none;" onClick="block.hide_edit_panel()" class="l-hide">&nbsp;</a>
            

            
        </div>
    </div>
</div>