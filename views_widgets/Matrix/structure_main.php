<style>
    <? for($i = 0; $i < $depth; $i++) : ?>
        .matrix-level-<?=$i+1?> { width: <?=320 - $i*60?>px; height: 79px; border: 1px black solid; border-radius: 15px; margin: 0 auto; }
    <? endfor; ?>
</style>

<div style="position: relative">
    <table class="matrix-table" border="0" cellspacing="0" cellpadding="0">

        <? foreach ($list as $width_level => $tr_value) : ?>
            <tr>
                <? foreach ($tr_value as $depth_level => $token) : ?>
                    <td class="text-center" colspan="<?=count($list[$depth - 1])/count($tr_value)?>">
                        <? if (!$token->empty) : ?>
                        <a href="/<?=($url . '/token/' . $token->id)?>" class="matrix-link">
                        <? endif; ?>
                            <div class="matrix-level-<?=$width_level + 1?>">
                                <p class="matrix-text"><? if (!$token->empty) : ?><?=$token->user->username?><?endif; ?></p>
                                <p class="matrix-text"><? if (!$token->empty) : ?>Skype: <?=$token->user->profile->skype?><?endif; ?></p>
                                <p class="matrix-text"><? if (!$token->empty) : ?><?=$token->user->profile->phone?><?endif; ?></p>
                            </div>
                        <? if (!$token->empty) : ?>
                            </a>
                        <? endif; ?>
                    </td>            
                <? endforeach; ?>            
            </tr>
        <? endforeach; ?>    
    </table>
    <div class="matrix-navigation">
        <? if ($is_token_top) : ?>
            <?=CHtml::link('<span class="arrow-top">&nbsp;</span>', '/' . $url, array('class' => 'matrix-link'))?>
            <div style="height: 70px;">&nbsp;</div>
        <? endif; ?>
        <? if ($is_token_top_step) : ?>
            <?=CHtml::link('<span class="arrow-topstep">&nbsp;</span>', '/' . $url . '/token/' . $token_top_step->id, array('class' => 'matrix-link'))?>
        <? endif; ?>    
    </div>
</div>
