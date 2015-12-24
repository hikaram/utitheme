<style>
    .list .action form { display: inline; }
</style>

<br /><br />
<h3><span class="wrapper-3">Фильтр</span></h3>
<?=CHtml::beginForm()?>
<table class="list">
    <tbody>
        <tr>
            <td>Логин</td>
            <td><?=Chtml::textField('filter[username]', array_key_exists('username', $filter) ? $filter['username'] : '');?></td>
        </tr>
        <tr>
            <td><a href="javascript: void(0)" onClick="location.href='/admin/roles/authmanager/assignment'">Сбросить фильтр</a></td>
            <td><?=Chtml::button('Найти', array('name' => 'btn_filter', 'onClick' => 'saveFilter()'));?></td>
        </tr>                
    </tbody>            
</table>
<?=CHtml::endForm()?>
<br /><br />

<table class="list" id="roles">
    <tbody>
        <tr class="top-table" >
            <th class="photo">Логин</th>
            <th class="photo">Email</th>
            <th class="photo">Дата регистрации</th>
            <th class="photo">Роли</th>
            <th class="action">Действие</th>
        </tr>
        <?foreach($list as $key => $item) :?>
            <tr>
                <td>
                    <div><?=$item['username']?></div>
                </td>
                <td>
                    <div><?=$item['email']?></div>
                </td>
                <td>
                    <div><?=MSmarty::date_format($item['created_at'], 'd.m.Y')?></div>
                </td>
                <td>
                    <div>
                        <? foreach ($item['default'] as $key => $value) : ?>
                            <?=$value->description;?> <? if ((isset($item['default'][$key + 1])) || (!empty($item['assignment']))) : ?>,&nbsp;<?endif; ?> 
                        <? endforeach; ?>
                        <? foreach ($item['assignment'] as $key => $value) : ?>
                            <?=$value->description;?> <? if (isset($item['assignment'][$key + 1])) : ?>,&nbsp;<?endif; ?>
                        <? endforeach; ?>
                    </div>
                </td>

                <td class="action">
                    <? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerAssignment')) : ?>
                        <a href="<?=$this->createUrl('authmanager/editassignment/username/' . $item['username'])?>">Редактировать</a>&nbsp;
                    <? endif; ?>
                </td>
            </tr>
        <?endforeach; ?>
    </tbody>
</table>
<br />

<? $this->widget('CLinkPager', array('pages' => $pages))?>
<br /><br />

<? if (Yii::app()->user->checkAccess('AdminRolesAuthmanagerIndex')) : ?>
    <form action="<?=$this->createUrl('authmanager/index')?>" style="display: inline-block">
        <input type="submit" value="Управление ролями" class="btn200" />
    </form>
<? endif; ?>


