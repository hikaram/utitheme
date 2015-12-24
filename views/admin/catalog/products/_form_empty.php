<h3><?=Yii::t('app', 'Не хватает данных для создания продуктов')?></h3>

<?=Yii::t('app', 'Чтобы добавить новый продукт создайте хотя бы один')?> <?=CHtml::link(Yii::t('app', 'каталог продукции'), $this->createUrl('/admin/catalog/catalogues/create'))?><br />
<?=Yii::t('app', 'и как минимум одну')?> <?=CHtml::link(Yii::t('app', 'валюту товара'), $this->createUrl('/admin/catalog/currencies/create'))?>.
<br /><br />
