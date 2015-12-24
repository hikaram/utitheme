<?php
$this->breadcrumbs['Панель управления'] = $this->module->id;
?>

<div>
    <p>
        Здесь можно задать смещения времени на указанное количество месяцев или дней, которое будет использовано для установки времени.
        Т.е. при установке этих значений, можно оттестировать работу приложения, в разном времени.
    </p>
    <?=CHtml::beginForm()?>

        <table class="form">
            <tr>
                <td>Дата, которая сейчас в БД:</td>
                <td><b><?=MSmarty::date_format($date, 'd.m.Y')?></b></td>
            </tr>
            <tr>
                <td>Дата смещается на:</td>
                <td>
                    <?=CHtml::textField('offset_month', $offset_month)?> месяцев.</td>
            </tr>
            <tr>
                <td>Дата смещается на:</td>
                <td><?=CHtml::textField('offset_day', $offset_day)?> дней.</td>
            </tr>
            <tr>
                <td></td>
                <td><?=CHtml::submitButton('Сохранить', array('name' => 'btn_save'))?></td>
            </tr>
        </table>
    <?=CHtml::endForm()?>


</div>