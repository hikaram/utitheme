<table class="list" style="width: 280px; font-size: 12px;">
    <th style="font-size: 12px;">№ п/п</th>
    <th style="font-size: 12px;">Уровень</th>
    <th style="font-size: 12px;">Статус</th>
    <? foreach ($list as $key => $token) : ?>
        <tr onClick="location.href = app.createAbsoluteUrl('admin/matrix/matrix/structure/id/' + <?=$token->matrix_types__id?> + '/token/' + <?=$token->id?>);">
            <td><?=CHtml::encode($token->num)?></td>
            <td><?=CHtml::encode($token->matrix_volume)?></td>
            <td>
                <? if ($token->matrix_status->alias == MatrixTokens::MatrixStatusOpen) : ?>
                    Открытая
                <? elseif ($token->matrix_status->alias == MatrixTokens::MatrixStatusClosed) : ?>
                    Закрытая
                <? endif; ?>
            </td>
        </tr>
    <? endforeach; ?>
</table>
<a href="javascript: void(0)" onClick="userSearchAdditionalHide()" style="float: right;">Скрыть</a>