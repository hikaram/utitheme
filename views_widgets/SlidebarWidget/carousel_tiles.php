<div class="carousel-style-wrapper">
    <div class="slider-wrap">
        <div class="slider">
            <?=CHtml::hiddenField('delayTime', (int)($carousel->delay_time * 1000), array('id' => 'delayTime'))?>
            <?=CHtml::hiddenField('effectAlias', $carousel->animation->alias, array('id' => 'effectAlias'))?>
            <? foreach ($carousel->active_frames as $key => $frame) : ?>
                <? if (($frame->attachment != NULL) && ($frame->attachment->secret_name != null)) :?>
                    <p class="frame-block" id="frame_block_<?=sha1($frame->id)?>" data-attrid="<?=sha1($frame->id)?>" style="color: white;"><?=CHtml::encode($frame->lang->text)?></p>
                    <? if (($frame->link != NULL) && (!empty($frame->link))) : ?>
                        <?=CHtml::image(MSmarty::attachment_get_file_name($frame->attachment->secret_name, $frame->attachment->raw_name, $frame->attachment->file_ext, '_carousel', 'slidebar'), '', array('isLink' => TRUE, 'style' => 'cursor: pointer;', 'onClick' => 'location.href="' . $frame->link . '"')); ?>
                    <? else : ?>
                        <?=CHtml::image(MSmarty::attachment_get_file_name($frame->attachment->secret_name, $frame->attachment->raw_name, $frame->attachment->file_ext, '_carousel', 'slidebar'), '', array('isLink' => FALSE)); ?>
                    <? endif; ?>                    
                <? endif; ?>
            <? endforeach; ?>
        </div>
    </div>
    <? foreach ($carousel->active_frames as $key => $frame) : ?>
        <? if (($frame->attachment != NULL) && ($frame->attachment->secret_name != null)) :?>
            <?=CHtml::hiddenField('textParamWidth_' . sha1($frame->id), (int)$frame->width, array('id' => 'textParamWidth_' . sha1($frame->id)))?>
            <?=CHtml::hiddenField('textParamTop_' . sha1($frame->id), (int)$frame->padding_top, array('id' => 'textParamTop_' . sha1($frame->id)))?>
            <?=CHtml::hiddenField('textParamLeft_' . sha1($frame->id), (int)$frame->padding_left, array('id' => 'textParamLeft_' . sha1($frame->id)))?>
        <? endif; ?>
    <? endforeach; ?>    
</div>
