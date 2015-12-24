<div class="show_block_button" id="show_block_button_<?=$position;?>_<?=$sort_no;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$sort_no;?>, 'show')"><span class="show_sidebar">&nbsp;</span></a></div>
<div class="hide_block_button" id="hide_block_button_<?=$position;?>_<?=$sort_no;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$sort_no;?>, 'hide')"><span class="hide_sidebar">&nbsp;</span></a></div>
<a href="javascript:void(0)" onClick="block.edit_content(<?=$content__id; ?>, '<?=$position;?>', <?=$sort_no;?>, <?=$page__id; ?>)"><span class="edit">&nbsp;</span></a>
<a href="javascript:void(0)" onClick="block.show_color_picker(<?=$page_widget_id?>)"><span class="rudimentary-picker" id="rudimentary-picker_<?=$page_widget_id?>">&nbsp;</span></a>
<a href="javascript:void(0)" onClick="if (confirm(T('Удалить этот текстовый блок ?'))) block.delete_widget(<?=$content__id; ?>, '<?=$position;?>', <?=$sort_no;?>, <?=$page__id; ?>)"><span class="delete">&nbsp;</span></a>
<br />
<div id="color_picker_block_<?=$page_widget_id?>" class="color-picker-block">
    <span class="ColorBlotch" style="background-color: transparent;">?</span>
    <?php $this->widget('Contentpro')->rudimentarypicker(); ?>
</div>
