<div>
	<div class="note note-info hide-hr">	
		<div>
			<span><?=$transaction->spec->title?></span>
		</div>
		<div>
			<span>guid: </span><b><?=$transaction->guid?></b>
		</div>
		<div>
			<span>status: </span><b id="transaction_status"><?=$transaction->status_alias?></b>
		</div>
	</div>	
    <div>
        <?=CHtml::submitButton(Yii::t('app', 'Эмулировать успешную оплату'), 
			array('id' => 'btn_emulate_success',
				'title' => 'Эмулировать успешную оплату',
				'class' => 'btn green tooltips', 
				'data-placement' => 'top',
				'data-original-title' => 'Эмулировать успешную оплату',	))?>
    
        <?=CHtml::submitButton(Yii::t('app', 'Эмулировать отказ'), 
			array('id' => 'btn_emulate_fail',
				'title' => 'Эмулировать отказ',
				'class' => 'btn red tooltips', 
				'data-placement' => 'top',
				'data-original-title' => 'Эмулировать отказ',	))?>
    </div>
    
    <script type="text/javascript">
        (function(){
            var data = {
                result : {
                    YII_CSRF_TOKEN     : window.app.csrfToken,
                    LMI_PAYEE_PURSE    : '<?=$PAYEE_PURSE ?>',
                    LMI_PAYMENT_AMOUNT : '<?=$transaction->amount ?>',
                    LMI_PAYMENT_NO     : '<?=$transaction->id ?>',
                    LMI_MODE           : 1,
                    LMI_PAYER_PURSE    : "Z123456789123",
                    LMI_SYS_INVS_NO    : "123456789",
                    LMI_SYS_TRANS_NO   : "9874563211",
                    LMI_SYS_TRANS_DATE : "20110415 13:20:00",
                    LMI_PAYMENT_DESC   : "emulation",
                    LMI_PAYER_WM       : "123456789123",
                    LMI_HASH           : "<?=$paymentsystemWebmoney->genSignature(array(
                        'payee_purse'    => $PAYEE_PURSE,
                        'payment_amount' => $transaction->amount,
                        'payment_no'     => $transaction->id,
                        'mode'           => 1,
                        'sys_invs_no'    => '123456789',
                        'sys_trans_no'   => '9874563211',
                        'sys_trans_date' => '20110415 13:20:00',
                        'payer_purse'    => 'Z123456789123',
                        'payer_wm'       => '123456789123',
                    ))?>"
                },
                fail : {
                    YII_CSRF_TOKEN     : window.app.csrfToken,
                    LMI_PAYMENT_NO     : '<?=$transaction->id ?>',
                    LMI_SYS_INVS_NO    : '123456789',
                    LMI_SYS_TRANS_NO   : '9874563211',
                    LMI_SYS_TRANS_DATE : '20110415 13:20:00'
                }
            };

            $('#btn_emulate_success').on('click', function(){
                $.ajax({
                    url : "<?=$this->createUrl('result')?>",
                    data : data.result,
                    success : function(data)
                    {
                        if (data)
                        {
                            if (data.status)
                            {
                                $('#transaction_status').text(data.status);
						        location.href = app.createAbsoluteUrl('paymentsystem/webmoney/pay/success/guid/<?=$transaction->guid?>');
                            }
                        }
                    }
                });
            });
            
            $('#btn_emulate_fail').on('click', function(){
                $.ajax({
                    url : "<?=$this->createUrl('fail')?>",
                    data : data.fail,
                    success : function(data)
                    {
                        if (data)
                        {
                            if (data.status)
                            {
                                $('#transaction_status').text(data.status);
                                location.href = app.createAbsoluteUrl('paymentsystem/webmoney/pay/fail/guid/<?=$transaction->guid?>');
                            }                                
                        }
                    }
                });
            });
        })();
    </script>
</div>