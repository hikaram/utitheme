<div id="block_<?=$position;?>" style="position: relative; height: auto; min-height: 500px; padding-bottom: 30px; <? if ($blocks['page']->main_height != NULL) : ?>height: <?=$blocks['page']->main_height?>px;<?endif;?> "<? if ($blocks['is_edit']) : ?> class="jqueryonparent"<?endif; ?>>
    <? if(isset($blocks['widgets'][$position])) :?>
        <?foreach($blocks['widgets'][$position] as $key => $value) : ?>
            <? if ($blocks['widgets'][$position][$key]['is_moving']) : ?> 
                <div id="resizable_<?=$value['page_widget_id']?>" class="<? if ($blocks['is_edit']) : ?>jqueryon <? endif;?>resizable ui-widget-content <? if ($blocks['is_edit']) : ?>border-static<?endif;?>" style="<?if ($blocks['widgets'][$position][$key]['css_style'] != NULL) :?> <?=$blocks['widgets'][$position][$key]['css_style']?><?endif;?>">
                <? if ($blocks['is_edit']) : ?>
                    <input type="hidden" value="<?=$key;?>" id="sort_no_resizable_<?=$value['page_widget_id']?>" />
                    <input type="hidden" value="<?=$blocks['widgets'][$position][$key]['object']->content__id; ?>" id="content__id_resizable_<?=$value['page_widget_id']?>" />
                <? endif; ?>
            <? endif; ?>
                    <div id="block_<?=$position;?>_<?=$key;?>" class="block">
                        <? if ($position == 'l_column') : ?><div class="pad"></div><? endif; ?>
                        <div id="block_text_<?=$position;?>_<?=$key;?>" class="block_text style-ckeditor">
                            <?=$blocks['widgets'][$position][$key]['object']->text; ?>
                        </div>
                        <? if($blocks['is_edit']) :?>
                            <div id="block_button_<?=$position;?>_<?=$key;?>" class="block_button">
                                <div class="show_block_button" id="show_block_button_<?=$position;?>_<?=$key;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$key;?>, 'show')"><span class="show_sidebar">&nbsp;</span></a></div>
                                <div class="hide_block_button" id="hide_block_button_<?=$position;?>_<?=$key;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$key;?>, 'hide')"><span class="hide_sidebar">&nbsp;</span></a></div>
                                <a href="javascript:void(0)" onClick="block.edit_content(<?=$blocks['widgets'][$position][$key]['object']->content__id; ?>, '<?=$position;?>', <?=$key;?>, <?=$blocks['page']->id; ?>)"><span class="edit">&nbsp;</span></a>
                                <? if (!($blocks['widgets'][$position][$key]['is_moving'])) : ?> <a href="javascript:void(0)" onClick="block.content_move(<?=$blocks['widgets'][$position][$key]['object']->content__id; ?>, 'up', <?=$blocks['page']->id; ?>, <?=$key;?>, '<?=$position;?>')"><span class="up">&nbsp;</span></a><? endif; ?>
                                <? if (!($blocks['widgets'][$position][$key]['is_moving'])) : ?> <a href="javascript:void(0)" onClick="block.content_move(<?=$blocks['widgets'][$position][$key]['object']->content__id; ?>, 'down', <?=$blocks['page']->id; ?>, <?=$key;?>, '<?=$position;?>')"><span class="down">&nbsp;</span></a><? endif; ?>
                                <? if ((array_key_exists('colorpicker_type', $blocks)) && ($blocks['colorpicker_type'] == 'colorpicker')) : ?>
                                    <div id="customWidget">
                                        <div id="colorSelector2"><div style="background-color: #00ff00"></div></div>
                                        <div id="colorpickerHolder2"></div>
                                    </div>
                                <? elseif ((array_key_exists('colorpicker_type', $blocks)) && ($blocks['colorpicker_type'] == 'colourpicker')) : ?>
                                    <select name="colour">
                                        <?php $this->widget('Contentpro')->colorpicker(); ?>
                                    </select>
                                <? elseif ((array_key_exists('colorpicker_type', $blocks)) && ($blocks['colorpicker_type'] == 'rudimentary')) : ?>
                                    <a href="javascript:void(0)" onClick="block.show_color_picker(<?=$value['page_widget_id']?>)"><span class="rudimentary-picker" id="rudimentary-picker_<?=$value['page_widget_id']?>">&nbsp;</span></a>
                                <? endif; ?>
                                <a href="javascript:void(0)" onClick="if (confirm(T('Удалить этот текстовый блок ?'))) block.delete_widget(<?=$blocks['widgets'][$position][$key]['object']->content__id; ?>, '<?=$position;?>', <?=$key;?>, <?=$blocks['page']->id; ?>)"><span class="delete">&nbsp;</span></a>
                                <br />
                                <div id="color_picker_block_<?=$value['page_widget_id']?>" class="color-picker-block">
                                    <span class="ColorBlotch" style="background-color: transparent;">?</span>
                                    <?php $this->widget('Contentpro')->rudimentarypicker(); ?>
                                </div>                                  
                            </div>
                        <? endif; ?>
                    </div>
            <? if ($blocks['widgets'][$position][$key]['is_moving']) : ?>
                </div>
    <div style="clear: both;"></div>
            <? endif; ?>
        <?endforeach;?>    
    <? endif; ?>
    <?/* if($blocks['is_edit']) :?>
        <input type="button" value="Добавить" class="btn100" onClick="block.show('<?=$position;?>', <?=$blocks['page']->id; ?>, <?=$blocks['is_edit'];?>)" />
    <? endif; */?>    
</div>
