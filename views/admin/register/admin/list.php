<style>
    th{
        background: #CCEDFF;
      }
    #list_feilds td,th{
        border: 1px solid #CFD3D0;
    }
    #list_feilds tr:hover {
            background: #EDF8FF;
    } 
    
</style>
 <div style="border: 1px solid grey; width:550px; min-height: 180px; padding: 5px; float:left; margin-left: 10px;">
     <?php echo CHtml::beginForm(); ?>
     <table id="list_feilds">
         <th><?=Yii::t('app', 'Поле')?></th>
         <th><?=Yii::t('app', 'Обязательно')?>  <input type="checkbox" id="check_required_all" ></th>
         <th><?=Yii::t('app', 'Использовать')?> <input type="checkbox" id="check_use_all" ></th>
          <? foreach($list as $item => $page) :?>
             <tr>
                 <td>
                     <?=$page->label;?>
                 </td>
                 <td style="text-align: center;">
                     <?php echo CHtml::activeHiddenField($page, 'id'); ?>
                     <?php echo CHtml::activeCheckBox($page, 'is_required', array('name' => 'Fields[is_required][' . $page->id . ']', 'class' => 'is_required')); ?>
                 </td>
                 <td style="text-align: center;">
                     <?php echo CHtml::activeCheckBox($page, 'is_use', array('name' => 'Fields[is_use][' . $page->id . ']', 'class' => 'is_use')); ?>
                 </td>
             </tr>
          <?php endforeach; ?>   
             <tr><td style="border: 0;"><?=CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn150', 'name' => 'btn_save')); ?></td></tr>
     </table>
     <?=CHtml::endForm(); ?>
     <?$this->widget('CLinkPager', array('pages' => $pages))?>
 </div>


