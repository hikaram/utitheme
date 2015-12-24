<div id="block_<?=$position;?>">
    <? if(isset($blocks['widgets'][$position])) :?>
        <?foreach($blocks['widgets'][$position] as $key => $value) : ?>
            <div id="block_<?=$position;?>_<?=$key;?>" class="block">
                <? if ($position == 'l_column') : ?><div class="pad"></div><? endif; ?>
                <div id="block_text_<?=$position;?>_<?=$key;?>" class="block_text style-ckeditor">
                    <? if ((is_array($value)) && (array_key_exists('object', $value))) : ?><? $value = $value['object'] ?><? endif; ?>
                    <?=$value->text; ?>                    
                </div>
                <? if($blocks['is_edit']) :?>
                    <div id="block_button_<?=$position;?>_<?=$key;?>" class="block_button">
                        <div class="show_block_button" id="show_block_button_<?=$position;?>_<?=$key;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$key;?>, 'show')"><span class="show_sidebar">&nbsp;</span></a></div>
                        <div class="hide_block_button" id="hide_block_button_<?=$position;?>_<?=$key;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$key;?>, 'hide')"><span class="hide_sidebar">&nbsp;</span></a></div>
                        <a href="javascript:void(0)" onClick="block.edit_content(<?=$value->content__id; ?>, '<?=$position;?>', <?=$key;?>, <?=$blocks['page']->id; ?>)"><span class="edit">&nbsp;</span></a>
                        <a href="javascript:void(0)" onClick="block.content_move(<?=$value->content__id; ?>, 'up', <?=$blocks['page']->id; ?>, <?=$key;?>, '<?=$position;?>')"><span class="up">&nbsp;</span></a>
                        <a href="javascript:void(0)" onClick="block.content_move(<?=$value->content__id; ?>, 'down', <?=$blocks['page']->id; ?>, <?=$key;?>, '<?=$position;?>')"><span class="down">&nbsp;</span></a>
                        <a href="javascript:void(0)" onClick="block.delete_widget(<?=$value->content__id; ?>, '<?=$position;?>', <?=$key;?>, <?=$blocks['page']->id; ?>)"><span class="delete">&nbsp;</span></a>
                    </div>
                <? endif; ?>
            </div>
        <?endforeach;?>    
    <? endif; ?>
</div>
<? if($blocks['is_edit']) :?>
    <input type="button" value="<?=Yii::t('app', 'Добавить')?>" class="btn btn-primary" onClick="block.show('<?=$position;?>', <?=$blocks['page']->id; ?>, <?=$blocks['is_edit'];?>)" />
<? endif; ?>