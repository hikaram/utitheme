<?php 
$this->breadcrumbs[Yii::t('app', 'Финансы')] = $this->createUrl('default/index');
$this->breadcrumbs[Yii::t('app', 'Операции')] = $this->createUrl('index');
$this->breadcrumbs[Yii::t('app', 'Отклонение операции')]  = 'javascript: return void(0);';

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
)); 
?>

<?php echo $form->errorSummary($transaction); ?>

<table>
    <tr>
        <td><?=$form->labelEx($transaction, 'currency_alias')?></td>
        <td><?=CHtml::encode($transaction->currency_alias)?></td>
        <td></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($transaction, 'amount')?></td>
        <td><?=CHtml::encode($transaction->amount)?></td>
        <td></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($transaction->getModelSpecification(), 'title')?></td>
        <td><?=CHtml::encode($transaction->getModelSpecification()->title)?></td>
        <td></td>
    </tr>
    
    <tr>
        <td><?=$form->labelEx($transaction->getModelSpecification(), 'description')?></td>
        <td><?=CHtml::encode($transaction->getModelSpecification()->description)?></td>
        <td></td>
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
    
    <tr>
        <td></td>
        <td colspan="2"><?php echo CHtml::submitButton(Yii::t('app', 'Отклонить')); ?></td>
    </tr>
    
</table>
<?php $this->endWidget(); ?>
