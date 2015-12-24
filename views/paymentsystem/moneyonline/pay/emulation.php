<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
<div class="note note-info hide-hr">
	<?=$message?>
</div>
<hr/>
<div>
<? if (!(bool)$isConfirmed) : ?>
	 <?=CHtml::hiddenField('mode_type', $_POST['mode_type']); ?>
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


<?/*<? $this->layout = 'office'; ?>
<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>
	<style>
		hr{     
			background: #0066A4;
			height: 1px;
			width: 100%;
			margin: 0;
		}
	</style>
	<div class="pay_block" align="center">
		
		<table style="width:50%; font-size: 12px;">
			<tr>
				<td align="left" style="background-color:#ffffff;">
					<div style ="height: 100px; color: #05B2D2; overflow: auto; margin: 2px;">
						<?=$message?>
					</div>    
				</td>
			</tr>
			<tr>
				<td align="left">
					<? if (!(bool)$isConfirmed) : ?>
                                                <?=CHtml::hiddenField('mode_type', $_POST['mode_type']); ?>
						<?=CHtml::submitButton('Эмулировать успешный ответ', array('name'=>'reply_confirmed', 'class' => 'btn300', 'title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы')); ?><br />
						<?=CHtml::submitButton('Эмулировать успешную оплату', array('name'=>'reply_confirmed_pay', 'class' => 'btn300', 'title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы и возврата к сайту')); ?><br />
						<?=CHtml::submitButton('Эмулировать ошибочный ответ', array('name'=>'reply_canceled', 'class' => 'btn300', 'title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы')); ?><br />
						<?=CHtml::submitButton('Эмулировать отказ от оплаты', array('name'=>'reply_canceled_pay', 'class' => 'btn300', 'title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту')); ?><br />
					<? else : ?>
						<? if ($isConfirmed == 'success') : ?>
							<?=CHtml::submitButton('Эмулировать возврат к сайту', array('name'=>'reply_return_success', 'class' => 'btn300', 'title' => 'Эмуляция возврата к сайту после успешной оплаты')); ?><br />
						<? elseif ($isConfirmed == 'fail') : ?>
							<?=CHtml::submitButton('Эмулировать возврат к сайту', array('name'=>'reply_return_fail', 'class' => 'btn300', 'title' => 'Эмуляция возврата к сайту после отказа от оплаты')); ?><br />
						<? endif; ?>
					<? endif; ?>
				</td>
		   </tr>
		</table>
	 </div>    
<?php $this->endWidget(); ?>*/?>
