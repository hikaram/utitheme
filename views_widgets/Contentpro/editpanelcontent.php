<? foreach ($contents as $key => $content) : ?>

    <div class="edit_page_content_title">
        <?=$content->name?>
    </div>
    <div id="edit_content_block_wrapper_<?=$content->id?>" class="edit_content_block_wrapper">
        <div class="edit_page_content_title_toolbar">
            <a href="javascript: void(0)" class="show_description_for_block_class" id="show_description_for_block_<?=$content->id?>" onClick="block.show_description_for_block(<?=$content->id?>);"><span class="open_eye">&nbsp;</span></a>
            <a href="javascript: void(0)" class="hide_description_for_block_class" id="hide_description_for_block_<?=$content->id?>" style="display: none;" onClick="block.hide_description_for_block(<?=$content->id?>);"><span class="close_eye">&nbsp;</span></a>
            <a href="javascript: void(0)" class="open_description_for_block_class" onClick="block.open_descrotion_for_block(<?=$content->id?>);"><span class="help">&nbsp;</span></a>
        </div>        
        <div class="edit_content_block jqueryon" id="edit_content_block_<?=$content->id?>">
            <?=implode(array_slice(explode('<br />', wordwrap(strip_tags(preg_replace('!<script[^>]*>.*</script>!isU', '<nnnnn>\\0</nnnnn>', $content->lang->text)), 500, '<br />', false)), 0, 1))?>
        </div>
        <div class="edit_content_block_not" id="edit_content_block_<?=$content->id?>_full" style="display: none;">
            <?=CHtml::encode($content->lang->text)?>
        </div>        
    </div>
    <hr style="position: relative; z-index: 2; background: none; margin-top: 15px; border: 1px solid black; height: 1px;" />
<? endforeach; ?>

    
