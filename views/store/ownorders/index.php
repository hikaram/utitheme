<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Zhandos.pc
 * Date: 16.07.13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */

$this->breadcrumbs['/store/ownorders'] = Yii::t('app', 'Мои заказы');
$this->renderPartial('_grid', array(
	'model' => $model
));
