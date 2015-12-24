<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>false)); ?>

    <div class="note note-info hide-hr">
        <?=$message?>
    </div>
    <hr/>

    <? if (!(bool)$isConfirmed) : ?>
        <div class="col-md-3">
            <div class="portlet sale-summary">
                <ul class="list-unstyled">
                    <li>
                        <div class="sale-info">
                            Ответ для:
                        </div>
                        <div class="sale-num radio-list">
                            <label>
                                <div class="radio">
                                    <input type="radio" name="radio_button" value="all" style="margin-top: -1px;" />
                                </div>
                                всех транзакций
                            </label>
                            <label>
                                <div class="radio">
                                    <input type="radio" name="radio_button" value="<?=$txn_id?>" checked="checked" style="margin-top: -1px;" />
                                </div>
                                только для текущей
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>

        <hr/>

    <? endif; ?>
    <? if (!(bool)$isConfirmed) : ?>
        <?=CHtml::submitButton('Эмулировать успешный ответ', array(
                'name'=>'reply_confirmed', 
                'title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы',
                'class' => 'btn green tooltips', 
                'data-placement' => 'top',
                'data-original-title' => 'Эмуляция ответа удачной оплаты от сервера платежной системы',
        )); ?>
        <a href="<?=$this->createUrl('pay/success/?order='.$txn_id)?>">
            <button type="button" class="btn green tooltips" title="Эмуляция ответа удачной оплаты от сервера платежной системы и возврата к сайту" data-placement="top" data-original-title="Эмуляция ответа удачной оплаты от сервера платежной системы и возврата к сайту">Эмулировать успешную оплату</button>
        </a>
        <?=CHtml::submitButton('Эмулировать ошибочный ответ', array(
                'name'=>'reply_canceled', 
                'title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы',
                'class' => 'btn red tooltips', 
                'data-placement' => 'top',
                'data-original-title' => 'Эмуляция ответа неудачной оплаты от сервера платежной системы',
        )); ?>  

        <a href="<?=$this->createUrl('pay/fail/?order='.$txn_id)?>">
            <button type="button" class="btn red tooltips" title="Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту" data-placement="top" data-original-title="Эмуляция ответа неудачной оплаты от сервера платежной системы и возврата к сайту">Эмулировать отказ от оплаты</button>
        </a>
    <? elseif ($txn_id != 'all') : ?>
        <? if ($isConfirmed == 'success') : ?>
            <a href="<?=$this->createUrl('pay/success/?order='.$txn_id)?>">
                <button type="button" class="btn green tooltips" title="Эмуляция возврата к сайту после успешной оплаты" data-placement="top" data-original-title="Эмуляция возврата к сайту после успешной оплаты">Эмулировать возврат к сайту</button>
            </a>
        <? else : ?>
            <a href="<?=$this->createUrl('pay/fail/?order='.$txn_id)?>">
                <button type="button" class="btn red tooltips" title="Эмуляция возврата к сайту после отказа от оплаты" data-placement="top" data-original-title="Эмуляция возврата к сайту после отказа от оплаты">Эмулировать возврат к сайту</button>
            </a>    
        <? endif; ?>
    <? endif; ?>

<?php $this->endWidget(); ?>
