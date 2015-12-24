<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-transactions-specs-form',
	'enableAjaxValidation'=>false,
)); ?>

<table>
    <tr>
        <th><?php echo $form->labelEx($modelFilter, 'a')?></th>
        <td>
            <?php echo $form->textField($modelFilter, 'a')?>
        </td>
        <td></td>
    </tr>
    
    <?php foreach($modelFilter->submodels as $key => $model) : ?>
    <tr>
        <th><?php echo $model->title?></th>
        <td>
            <?php echo $form->checkBox($model, 'is_checked', array('name' => get_class($model) . '[' . $key . ']' . '[is_checked]'))?>
        </td>
        <td></td>
    </tr>    
    <?php     endforeach; ?>
</table>
<?php echo CHtml::submitButton(Yii::t('app', 'Применить')); ?>
<?php $this->endWidget(); ?>