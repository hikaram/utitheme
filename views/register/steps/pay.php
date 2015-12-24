<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')); ?>/css/style.css" type="text/css" media="screen, projection" />

<div class="register_step3">
    
<!-- AlexXanDOR Оплата через банк -->
<? if (array_key_exists('bank', $ps)) : ?>
    <div class="pay-block">
        <?=CHtml::beginForm()?>
            <table>
                <tr>            
                    <td width='150' style="text-align:center; vertical-align: middle;">
                        <img alt="Bank"  src="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')); ?>/img/Sberbank.png">
                    </td>
                    <td width='600' style='padding-left: 20px; padding-top: 10px;'> 
						<?=Yii::t('app', 'Оплата наличными в Сбербанке.
                        Распечайте квитанцию или перепишите банковские реквизиты, 
                        впишите свою фамилию, имя и сумму оплаты и оплачивайте 
                        в ближайшем отделении Сбербанка.')?>
                    </td>
                    <td width='150' style='padding-left: 20px;'>
                        <?=CHtml::button(Yii::t('app', 'Перейти к оплате'), array('class' => 'btn200', 'onClick' => 'window.open("' . $this->createUrl('receipt') . '");'))?>
                    </td>
                </tr>       
            </table>
        <?=CHtml::endForm()?>
    </div>
<? endif; ?>
    
</div>