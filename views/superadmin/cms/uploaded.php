<?php

$this->breadcrumbs=array(
	'Панель управления' => array('index'),
	'Загруженные' => array('uploaded'),
);

?>
<?php $i = 1; ?>
<?php if(count($applications) == 0) : ?>
<h4 class="alert_info">Загруженные обновления не найдены.</h4>
<?php else : ?>
    <table class="tablesorter line-small">
        <tr>
            <th width="30">п.№</th>
            <th width="80">Версия</th>
            <th>Краткое описание</th>
            <th width="80">Подробно</th>
            <th width="80">Действия</th>
        </tr>
        <?php foreach($applications as $application) : ?>
        <?php $info = $application['info'] ?>
        <tr>
            <td><?=$i++?></td>
            <td><?=CHtml::encode($info['version'])?></td>
            <td><?=CHtml::encode($info['brief_description'])?></td>
            <td><a href="<?=$this->createUrl('description', array('version' => $info['version']))?>">Читать</a></td>
            <td><a href="<?=$this->createUrl('prepare', array('version' => $info['version'], 'token' => $this->getToken()))?>">Установить</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif;?>