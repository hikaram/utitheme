<?php
/* @var $this SiteController */
/* @var $error array */

// $this->pageTitle=Yii::app()->name . ' - Error';
$this->pageTitle = Yii::t('app', 'Ошибка');
/*$this->breadcrumbs=array("$message", );*/
	?>

	<div class="page-404">
		<div class="number">
			<?php echo $code; ?>
		</div>
		<div class="details">
			<h3><?=Yii::t('app', 'Ошибка')?></h3>
			<p>
				<?php echo CHtml::encode($message); ?>
			</p>
		</div>
	</div>