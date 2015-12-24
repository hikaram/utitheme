<?php
$this->breadcrumbs['Навигация'] = 'index';
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa icon-directions"></i>Карта сайта.
		</div>
	</div>
	<div class="portlet-body">
	<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Ун.№</th>
		<th>Метка</th>
		<th>Адрес (URL)</th>
		<th>Псевдоним</th>
		<th title="Показывать ли в меню.">Показывать</th>
		<th>Тип</th>
		<th>Автор</th>
	</tr>    
	<?php foreach($navigation as $key => $node) : ?>
	<tr>
		<td><?=$node['id']?></td>
		<td>
			<?=str_repeat('|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $node['tree_level'] - 1)?>
			<?=$node['label']?>
		</td>
		<td>
			<a href="<?=$node['url']?>">
			<?=$node['url']?>
			</a>
		</td>
		<td><?=$node['alias']?></td>
		<td class="text-center">
			<?php if($node['is_visible'] == Navigation::VISIBLE) : ?>
			<span title="Показывать в меню" class="icon-check">&nbsp;</span>
			<?php else : ?>
			<span title="Не показывать в меню" class="icon-close">&nbsp;</span>
			<?php endif; ?>
		</td>
		<td>
			<?php if ($node['object_alias'] == 'pages') :?>
				страница
			<?php else : ?>
				ссылка
			<?php endif; ?>
		</td>
		<td title="<?=$node['created_user_username']?>">
			<?=substr($node['created_user_username'], 0, 7)?>
			<?php if (strlen($node['created_user_username']) > 7) : ?>
			...
			<?php endif; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	</div>
</div>