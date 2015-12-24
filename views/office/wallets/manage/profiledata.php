<td><?=CHtml::encode($profile->user->username)?></td>
<td><?=CHtml::encode($profile->user->email)?></td>
<td><?=CHtml::encode($profile->lang->last_name . ' ' . $profile->lang->first_name . ' ' . $profile->lang->second_name)?></td>
<td>
    <? if ($profile->sponsor != NULL) : ?>
        <?=CHtml::encode($profile->sponsor->username)?>
    <? endif; ?>
</td>
<td>
    <? if ($profile->sponsor != NULL) : ?>
        <?=CHtml::encode($profile->sponsor->profile->lang->last_name . ' ' . $profile->sponsor->profile->lang->first_name . ' ' . $profile->sponsor->profile->lang->second_name)?>
    <? endif; ?>
</td>
<td class="more-td">
    <? if (($id != FALSE) && (sha1($profile->user->id) == $id)) : ?>
        <span class="more more-show btn blue btn-sm"><i class="fa fa-eye-slash"></i></span>
    <? else : ?>
        <span class="more more-hide btn blue btn-sm"><i class="fa fa-eye"></i></span>
    <? endif; ?>
</td>