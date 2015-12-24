<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3">Статусы матриц</span></h1>
        
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
                <? if(empty($statuses)) :?>
                    <tr><td colspan="8">Не найдено ни одного статуса</td></tr>
                <? else : ?>                
                    <? foreach($statuses as $key => $value) :?>  
                        <tr>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->alias)?></td>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->name)?></td>
                            <td style="padding-left: 15px; padding-right: 5px;"><?=CHtml::encode($value->lang->description)?></td>
                            <td><?=MSmarty::date_format($value->created_at, 'd.m.Y')?></td>
                            <td><? if ($value->creator != NULL):?><?=$value->creator->username?><? endif; ?></td>
                            <td><?=MSmarty::date_format($value->modified_at, 'd.m.Y')?></td>
                            <td><? if ($value->redactor != NULL):?><?=$value->redactor->username?><? endif; ?></td>
                            <td style="padding-left: 15px; padding-right: 5px;">
                                <a href="<?=$this->createUrl('statuses/view/id/' . $value->id)?>">Просмотреть</a>
                                <a href="<?=$this->createUrl('statuses/create/action/edit/id/' . $value->id)?>">Редактировать</a>
                                <?=CHtml::linkButton('Удалить',array(
                                    'submit' => array('statuses/delete', 'id' => $value->id),
                                    'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                                    'confirm' => "Удалить статус?"));  ?>
                            </td>
                        </tr>
                    <? endforeach; ?> 
                        
                    <? $this->widget('CLinkPager', array('pages' => $pages))?>
                <? endif; ?>
            </tbody>
        </table>

        <form action="<?=$this->createUrl('statuses/create')?>">
            <input type="submit" value="Добавить статус" />
        </form>

    </div>
</div><!-- .content-inner-->
