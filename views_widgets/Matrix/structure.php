<? foreach ($list as $width_level => $tr_value) : ?>

    <div class="col-md-3" style="width: 100%; text-align: center;">
        <? foreach ($tr_value as $depth_level => $token) : ?>
            <div style="width: <?=(95/count($tr_value))?>%; display: inline-block; height: 140px; overflow: hidden;">
                <div class="portlet box <? if (!$token->empty) : ?>green hover<? else : ?>grey<? endif; ?>" style="display: inline-block; width: 170px;">
                    <div class="portlet-title" style="height: 38px;">
                        <div class="caption">
                            <? if (!$token->empty) : ?>
                                <i class="fa fa-gift"></i><?=$token->user->username?>
                            <? endif; ?>
                        </div>
                        <div class="tools">
                                            
                        </div>
                    </div>
                    <div class="portlet-body" style="display: block; font-size: 10px; height: 70px;">
                        <? if ((!$token->empty) && ($token->user != NULL)) : ?>
                            <i class="fa fa-envelope-o mr5"></i> <?=CHtml::encode($token->user->email)?><br/>
                            <? if ($token->user->profile->phone and $token->user->profile->phone != "") : ?>
                                <i class="fa fa-phone mr5"></i> <?=CHtml::encode($token->user->profile->phone)?><br/>
                            <? endif; ?>
                            <? if ($token->user->profile->skype and $token->user->profile->skype != "") : ?>
                                <i class="fa fa-skype mr5"></i> <?=CHtml::encode($token->user->profile->skype)?>
                            <? endif; ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="floater"></div>
<? endforeach; ?>   

<div class="matrix-navigation">
    <? if ($is_token_top) : ?>
        <?=CHtml::link('<span class="arrow-top">&nbsp;</span>', '/' . $url, array('class' => 'matrix-link'))?>
        <div style="height: 70px;">&nbsp;</div>
    <? endif; ?>
    <? if ($is_token_top_step) : ?>
        <?=CHtml::link('<span class="arrow-topstep">&nbsp;</span>', '/' . $url . '/token/' . $token_top_step->id, array('class' => 'matrix-link'))?>
    <? endif; ?>    
</div>