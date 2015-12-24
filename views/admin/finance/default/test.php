<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($transaction); ?>

<table>
    <tr>
        <td><?=$form->labelEx($transaction, 'currency_alias')?></td>
        <td><?=$form->textField($transaction, 'currency_alias')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction, 'currency_alias'); ?></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($transaction, 'amount')?></td>
        <td><?=$form->textField($transaction, 'amount')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction, 'amount'); ?></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($transaction, 'spec_alias')?></td>
        <td><?=$form->textField($transaction, 'spec_alias')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction, 'spec_alias'); ?></td>
    </tr>
    
    <?php if ($transaction->is_comment_form_show) : ?>
    <tr>
        <td><?=$form->labelEx($transaction, 'comment')?></td>
        <td><?=$form->textArea($transaction, 'comment')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction,'comment'); ?></td>
    </tr>
    <?php endif; ?>
    
    <?php if ($transaction->is_password_require) : ?>
    <tr>
        <td><?=$form->labelEx($transaction, 'finpassword')?></td>
        <td><?=$form->textField($transaction, 'finpassword')?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction,'finpassword'); ?></td>
    </tr>
    <?php endif; ?>
    
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($transaction, 'modelsTransactionsObjects'); ?></td>
    </tr>
    
    <?php foreach($transaction->modelsTransactionsObjects as $key => $object) : ?>
    <tr>
        <td><?=$object->title?><?php if($object->is_required) echo '*'?></td>
        <td>
            <?=$form->hiddenField($object, "[$key]" . 'alias')?>
            <?=$form->textField($object, "[$key]" . 'value')?>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2"><?php echo $form->error($object, 'value'); ?></td>
    </tr>
    <?php endforeach; ?>
    
    <tr>
        <td></td>
        <td colspan="2"><?php echo CHtml::submitButton('Оплатить'); ?></td>
    </tr>
    
</table>
<?php $this->endWidget(); ?>
