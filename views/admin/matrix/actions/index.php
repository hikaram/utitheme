<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3">Действия</span></h1>
        
        <table class="list" id="actions">
            <tbody>
                <tr class="top-table" >
                    <th class="photo">Алиас</th>
                    <th class="photo">Имя</th>
                    <th class="photo">Описание</th>
                    <th class="name">Дата создания</th>
                    <th class="subdirectory">Автор</th>
                    <th class="photo">Дата редактирования</th>
                    <th class="photo">Редактор</th>
                    <th class="action">Действия</th>
                </tr>
                <? if(empty($actions)) :?>
                    <tr><td colspan="8">Не найдено ни одного действия</td></tr>
                <? else : ?>                
                    <? foreach($actions as $key => $value) :?>  
                        <tr>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->alias)?></td>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->name)?></td>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->description)?></td>
                            <td><?=MSmarty::date_format($value->created_at, 'd.m.Y')?></td>
                            <td><? if ($value->creator != NULL):?><?=$value->creator->username?><? endif; ?></td>
                            <td><?=MSmarty::date_format($value->modified_at, 'd.m.Y')?></td>
                            <td><? if ($value->redactor != NULL):?><?=$value->redactor->username?><? endif; ?></td>
                            <td style="padding-left: 15px; padding-right: 5px;">
                                <a href="<?=$this->createUrl('actions/view/id/' . $value->id)?>">Просмотреть</a>
                                <a href="<?=$this->createUrl('actions/create/action/edit/id/' . $value->id)?>">Редактировать</a>
                                <?=CHtml::linkButton('Удалить',array(
                                    'submit' => array('actions/delete', 'id' => $value->id),
                                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                    'confirm' => "Удалить действие?"));  ?>
                            </td>
                        </tr>
                    <? endforeach; ?> 
                        
                <? endif; ?>
            </tbody>
        </table>
        <br />
        <? $this->widget('CLinkPager', array('pages' => $pages))?>
        <br /><br />
        <form action="<?=$this->createUrl('actions/create')?>">
            <input type="submit" value="Добавить действие" />
        </form>

    </div>
</div><!-- .content-inner-->
