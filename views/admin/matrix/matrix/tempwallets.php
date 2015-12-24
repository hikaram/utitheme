<table class="list" id="news">
    <tbody>
        <tr class="top-table" >
            <th class="photo">Объект</th>
            <th class="photo">Логин пользователя</th>
            <th class="photo">Сумма в кошельке</th>
        </tr>
        <? foreach ($wallets as $key => $value) : ?>
            <? if ($value->type_alias == 'active') : ?> 
                <? if ($value->object_alias == 'company') : ?>
                    <tr>
                        <td>Компания</td>
                        <td></td>
                        <td><?=$value->balance?></td>                
                    </tr>
                <? else : ?>
                    <?php $user = Users::model()->findByPk($value->object_id); ?>
                    <tr>
                        <td>Пользователь</td>
                        <td><?=CHtml::encode($user->username)?></td>
                        <td><?=$value->balance?></td>                
                    </tr>
                <? endif; ?>
            <? endif; ?>
        <? endforeach; ?>
    </tbody>
</table>