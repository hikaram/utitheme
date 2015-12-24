<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
<div class="note note-info hide-hr">
	<?=$message?>
</div>
<hr/>
<div>
<? if (!(bool)$isConfirmed) : ?>
	<?=CHtml::submitButton('Эмулировать успешный ответ', array(
			'name'=>'reply_confirmed', 
			'title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы',
			'class' => 'btn green tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы',
	)); ?>
	<?=CHtml::submitButton('Эмулировать успешную оплату', array(
			'name'=>'reply_confirmed_pay', 
			'title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы и возврата к сайту',
			'class' => 'btn green tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы и возврата к сайту',
	)); ?>
	<?=CHtml::submitButton('Эмулировать ошибочный ответ', array(
			'name'=>'reply_canceled', 
			'title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы',
			'class' => 'btn red tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы',
	)); ?>
	<?=CHtml::submitButton('Эмулировать отказ от оплаты', array(
			'name'=>'reply_canceled_pay', 
			'title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту',
			'class' => 'btn red tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту',
	)); ?>
<? else : ?>
	<? if ($isConfirmed == 'success') : ?>
		<?=CHtml::submitButton('Эмулировать возврат к сайту', array(
			'name'=>'reply_return_success', 
			'title' => 'Эмуляция возврата к сайту после успешной оплаты',
			'class' => 'btn green tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция возврата к сайту после успешной оплаты',
		)); ?>
	<? elseif ($isConfirmed == 'fail') : ?>
		<?=CHtml::submitButton('Эмулировать возврат к сайту', array(
			'name'=>'reply_return_fail', 
			'title' => 'Эмуляция возврата к сайту после отказа от оплаты',
			'class' => 'btn red tooltips', 
			'data-placement' => 'top',
			'data-original-title' => 'Эмуляция возврата к сайту после отказа от оплаты',
		)); ?>
	<? endif; ?>
<? endif; ?>
</div>
<?php $this->endWidget(); ?>
