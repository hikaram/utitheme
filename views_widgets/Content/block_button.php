<div class="show_block_button" id="show_block_button_<?=$position;?>_<?=$sort_no;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$sort_no;?>, 'show')"><span class="show_sidebar">&nbsp;</span></a></div>
<div class="hide_block_button" id="hide_block_button_<?=$position;?>_<?=$sort_no;?>"><a href="javascript:void(0)" onClick="block.show_edit_block('<?=$position;?>', <?=$sort_no;?>, 'hide')"><span class="hide_sidebar">&nbsp;</span></a></div>
<a href="javascript:void(0)" onClick="block.edit_content(<?=$content__id; ?>, '<?=$position;?>', <?=$sort_no;?>, <?=$page__id; ?>)"><span class="edit">&nbsp;</span></a>
<a href="javascript:void(0)" onClick="block.content_move(<?=$content__id; ?>, 'up', <?=$page__id; ?>, <?=$sort_no;?>, '<?=$position;?>')"><span class="up">&nbsp;</span></a>
<a href="javascript:void(0)" onClick="block.content_move(<?=$content__id; ?>, 'down', <?=$page__id; ?>, <?=$sort_no;?>, '<?=$position;?>')"><span class="down">&nbsp;</span></a>
<a href="javascript:void(0)" onClick="block.delete_widget(<?=$content__id; ?>, '<?=$position;?>', <?=$sort_no;?>, <?=$page__id; ?>)"><span class="delete">&nbsp;</span></a>
