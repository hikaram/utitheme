<div class="row">
    <div class="col-md-12">
    
        <? if(empty($model)) :?>
            <p class="note note-success">
               <?=Yii::t('app', 'Логи отсутствуют')?>
            </p>
        <? else : ?>    
    
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="glyphicon glyphicon-list-alt"></i><?=Yii::t('app', 'Логирование')?>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover" id="news" style="text-align:center">
                            <thead>
                                <tr class="top-table" >
                                    <th ><?=Yii::t('app', 'Идентификатор')?></th>
                                    <th ><?=Yii::t('app', 'Тип')?></th>
                                    <th ><?=Yii::t('app', 'Платежная система')?></th>
                                    <th ><?=Yii::t('app', 'Тип данных')?></th>
                                    <th ><?=Yii::t('app', 'Дата')?></th>
                                    <th ><?=Yii::t('app', 'URL')?></th>
                                    <th ><?=Yii::t('app', 'Финансовая операция')?></th>
                                    <th ><?=Yii::t('app', 'Шаг')?></th>                                    
                                    <th ><?=Yii::t('app', 'Действия')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($model as $log) :?>  
                                    <tr>
                                        <td><?=$log['id']?></td>
                                        <td>
                                            <?  if($log['type'] == TYPE_PAYMENTSYSTEM_OUT):?>
                                                    <?=Yii::t('app', 'Ушло')?>
                                            <?  elseif($log['type'] == TYPE_PAYMENTSYSTEM_IN):?>
                                                    <?=Yii::t('app', 'Пришло')?>
                                            <?  else:?>
                                                    <?=Yii::t('app', 'Направления нет ')?>
                                            <?  endif;?>                                            
                                        </td>
                                        <td><?=$log['pay_system_alias']?></td>
                                        <td>
                                            <?  if($log['type_request'] == TYPE_PAYMENTSYSTEM_REQUEST_XML):?>
                                                    <?=Yii::t('app', '')?>XML
                                            <?  elseif($log['type_request'] == TYPE_PAYMENTSYSTEM_REQUEST_POST):?>
                                                    <?=Yii::t('app', '')?>POST
                                            <?  else:?>
                                                    <?=Yii::t('app', 'Не указанно')?>.
                                            <?  endif;?>                                            
                                        </td>
                                        <td><?=MSmarty::date_format($log['created_at'], 'd.m.Y')?> <?=MSmarty::date_format($log['created_at'], '%H:%M:%S')?></td>
                                        <td><?=$log['url']?></td>
                                        <td>
                                            <? if ($log->transaction != NULL) : ?>
                                                <?=CHtml::encode($log->transaction->spec->title)?>
                                            <? endif; ?>
                                        </td>
                                        <td><?=$log['step_alias']?></td>
                                        <td style="white-space: nowrap; word-wrap: normal;">
                                            <?=CHtml::link('<button class="btn green-seagreen"><i class="glyphicon glyphicon-pencil"></i></button>', $this->createUrl('log/view', array('id' => $log['id'])))?>
                                        </td>
                                    </tr>
                                <? endforeach; ?> 
                            </tbody>
                        </table>
                    </div>
                    
                    <? $this->widget('CLinkPager', array(
                        'pages' => $pages,
                        'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                        'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                        'htmlOptions' => array(
                            'class' => 'pagination'
                        )
                    )) ?>                
                    
                </div>
            </div>
        
        <? endif; ?>
        
    </div>
</div>



<? /*

<style>
    table{font-size: 14px;}
    th{ text-align: left; padding: 3px;}
    td{ padding: 3px;}
    button{font-size: 12px;padding: 3px;}
</style>
<table>
    <thead>
        <tr>
           <th>
               id
           </th>
           <th>
                Тип
           </th>
           <th>
               Тип данных
           </th>
           <th>
              Дата
           </th>
           <th>
               URL
           </th>
           <th>
              ID транзакции
           </th>
           <th>
              Шаг
           </th>
           <th>
              Алиас
           </th>
           <th>Действие</th>
        </tr>
    </thead>
    <?foreach ($model as $item => $page):?>
    <tr>
        <td><?=$page['id']?></td>
        <td>
            <?  if($page['type'] == TYPE_PAYMENTSYSTEM_OUT):?>
                    Ушло
            <?  elseif($page['type'] == TYPE_PAYMENTSYSTEM_IN):?>
                    Пришло
            <?  else:?>
                    Направления нет 
            <?  endif;?>
        </td>
        <td>
            <?  if($page['type_request'] == TYPE_PAYMENTSYSTEM_REQUEST_XML):?>
                    XML
            <?  elseif($page['type_request'] == TYPE_PAYMENTSYSTEM_REQUEST_POST):?>
                    POST
            <?  else:?>
                    Не указанно.
            <?  endif;?>
        </td>
        
        <td>
            <?=$page['created_at']?>
        </td>
        <td>
            <?=$page['url']?>
        </td>
        <td>
             <?=$page['finance_transaction__id']?>
        </td>
        <td>
             <?=$page['step_alias']?>
        </td>  
        <td>
             <?=$page['pay_system_alias']?>
        </td>  
        <td>
            <a href="<?=$this->createUrl('log/view/id') .'/'. $page['id']?>"><button type="button">Подробней</button></a>
        </td>
        
    </tr>
     
     <?endforeach;?>
</table>
<? $this->widget('CLinkPager', array('pages' => $pages))?>*/ ?>
