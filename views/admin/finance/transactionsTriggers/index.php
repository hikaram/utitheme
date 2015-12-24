<?php
$this->breadcrumbs['Финансы'] = $this->createUrl('default/index');
$this->breadcrumbs['Триггеры'] = $this->createUrl('transactionstriggers/index');
?>

<?php if (empty($modelsTriggers)) : ?>
<div class="note note-success">
	Еще не создан ни один триггер. Вы можете <a href="<?=$this->createUrl('create')?>">создать</a> его сейчас.
</div>
<?php else : ?>
<table>
    <tr>
        <th><?=$modelsTriggers[0]->getAttributeLabel('id')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('spec_alias')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('status_alias')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('currency_alias')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('path')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('class')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('method')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('is_active')?></th>
        <th><?=$modelsTriggers[0]->getAttributeLabel('module_owner')?></th>
        <th>Действия</th>
    </tr>
<? foreach($modelsTriggers as $modelTrigger) : ?>
    <tr>
        <td><?=$modelTrigger->id?></td>
        <td><?=CHtml::encode($modelTrigger->spec->title)?></td>
        <td><?=CHtml::encode($modelTrigger->status->title)?></td>
        <td><?=CHtml::encode($modelTrigger->currency->title)?></td>
        <td><?=Yii::getPathOfAlias('application') . CHtml::encode($modelTrigger->path)?></td>
        <td><?=CHtml::encode($modelTrigger->class)?></td>
        <td><?=CHtml::encode($modelTrigger->method)?></td>
        <td>
            <?php if ((boolean)$modelTrigger->is_active == true) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td><?=CHtml::encode($modelTrigger->module_owner)?></td>
        <td>
            <a href="<?=$this->createUrl('view', array('id' => $modelTrigger->id))?>">Просмотр</a><br />
            <a href="<?=$this->createUrl('update', array('id' => $modelTrigger->id))?>">Редактировать</a><br />
            <?=CHtml::form('', 'post')?>
                <?=CHtml::linkButton('Удалить', array(
                    'submit'=>array(
                        'delete',
                        'id' => $modelTrigger->id,
                    ),
                    'params'=>array(
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken
                    ),
                    'confirm'=>"Удалить данный триггер? Данное действие может привести к ошибкам в реализации бизнес-логики."
                ))?>
            <?=CHtml::endForm() ?>            
        </td>
    </tr>
<? endforeach; ?>
</table>
<a href="<?=$this->createUrl('create')?>">Создать новый триггер</a>
<? endif; ?>