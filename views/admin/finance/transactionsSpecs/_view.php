<style>
    table.objects tr td.center { text-align: center; }
</style>
<table class="view">
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?></th>
        <td><?php echo CHtml::encode($data->alias); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('debit_object_alias')); ?></th>
        <td><?php echo CHtml::encode($data->modelDebitObject->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('debit_purpose_alias')); ?></th>
        <td><?php echo CHtml::encode($data->modelDebitWalletPurpose->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('credit_object_alias')); ?></th>
        <td><?php echo CHtml::encode($data->modelCreditObject->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('credit_purpose_alias')); ?></th>
        <td><?php echo CHtml::encode($data->modelCreditWalletPurpose->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('title')); ?></th>
        <td><?php echo CHtml::encode($data->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('description')); ?></th>
        <td><?php echo CHtml::encode($data->description); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('group_alias')); ?></th>
        <td><?php echo CHtml::encode($data->modelTransactionGroup->title); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_used')); ?></th>
        <td>
            <?php if ((boolean)$data->is_used) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_wallet_update')); ?></th>
        <td>
            <?php if ((boolean)$data->is_wallet_update) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_comment_form_show')); ?></th>
        <td>
            <?php if ((boolean)$data->is_comment_form_show) : ?>
            <span title="Используетс" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_comment_require')); ?></th>
        <td>
            <?php if ((boolean)$data->is_comment_require) : ?>
            <span title="Требовать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не требовать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_admin_password_require')); ?></th>
        <td>
            <?php if ((boolean)$data->is_admin_password_require) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_debit_password_require')); ?></th>
        <td>
            <?php if ((boolean)$data->is_debit_password_require) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_credit_password_require')); ?></th>
        <td>
            <?php if ((boolean)$data->is_credit_password_require) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_from_admin')); ?></th>
        <td>
            <?php if ((boolean)$data->is_confirm_from_admin) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_from_debit')); ?></th>
        <td>
            <?php if ((boolean)$data->is_confirm_from_debit) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_confirm_from_credit')); ?></th>
        <td>
            <?php if ((boolean)$data->is_confirm_from_credit) : ?>
            <span title="Используется" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не используется" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_allowed_increase_amount')); ?></th>
        <td>
            <?php if ((boolean)$data->is_allowed_increase_amount) : ?>
            <span title="Разрешать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не разрешать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_allowed_increase_amount')); ?></th>
        <td>
            <?php if ((boolean)$data->is_allowed_increase_amount) : ?>
            <span title="Разрешать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не разрешать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('is_allowed_amount_zero')); ?></th>
        <td>
            <?php if ((boolean)$data->is_allowed_amount_zero) : ?>
            <span title="Разрешать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не разрешать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('redirect_open')); ?></th>
        <td>http://<?=$_SERVER['HTTP_HOST']?><?php echo CHtml::encode($data->redirect_open); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('redirect_confirm')); ?></th>
        <td>http://<?=$_SERVER['HTTP_HOST']?><?php echo CHtml::encode($data->redirect_confirm); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('redirect_decline')); ?></th>
        <td>http://<?=$_SERVER['HTTP_HOST']?><?php echo CHtml::encode($data->redirect_decline); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?></th>
        <td><?php echo CHtml::encode($data->created_at); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?></th>
        <td><?php echo CHtml::encode($data->created_by); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('created_ip')); ?></th>
        <td><?php echo CHtml::encode($data->created_ip); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?></th>
        <td><?php echo CHtml::encode($data->modified_at); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?></th>
        <td><?php echo CHtml::encode($data->modified_by); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('modified_ip')); ?></th>
        <td><?php echo CHtml::encode($data->modified_ip); ?></td>
    </tr>
</table>

<h2>Значение сумм в валютах</h2>
<?php if (count($modelsSpecsCurrency) == 0) : ?>
<h4 class="alert_warning">Не найдено ни одной суммы.</h4>
<?php else : ?>
<table class="view">
    <?php foreach($modelsSpecsCurrency as $modelSpecCurrency) : ?>
    <tr>
        <th><?php echo CHtml::encode($modelSpecCurrency->getAttributeLabel('id')); ?></th>
        <th><?php echo CHtml::encode($modelSpecCurrency->getAttributeLabel('currency_alias')); ?></th>
        <th><?php echo CHtml::encode($modelSpecCurrency->currency->getAttributeLabel('title')); ?></th>
        <th><?php echo CHtml::encode($modelSpecCurrency->getAttributeLabel('amount')); ?></th>
        <th><?php echo CHtml::encode($modelSpecCurrency->currency->getAttributeLabel('abbreviation')); ?></th>
    </tr>
    <tr>
        <td><?php echo CHtml::encode($modelSpecCurrency->id); ?></td>
        <td><?php echo CHtml::encode($modelSpecCurrency->currency_alias); ?></td>
        <td><?php echo CHtml::encode($modelSpecCurrency->currency->title); ?></td>
        <td><?php echo CHtml::encode($modelSpecCurrency->amount); ?></td>
        <td><?php echo CHtml::encode($modelSpecCurrency->currency->abbreviation); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif ; ?>

<h2>Связанные объекты</h2>
<?php if (count($modelsSpecsObjects) == 0) : ?>
<h4 class="alert_warning">Не найдено ни одного объекта.</h4>
<?php else : ?>
<table class="view objects">
    <tr>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('id')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('alias')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('title')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_required')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_show_for_admin')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_show_for_debit')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_show_for_credit')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_admin_specifies')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_debit_specifies')); ?></th>
        <th><?php echo CHtml::encode($modelsSpecsObjects[0]->getAttributeLabel('is_credit_specifies')); ?></th>
    </tr>
    <?php foreach($modelsSpecsObjects as $modelSpecObject) : ?>
    <tr>
        <td><?php echo CHtml::encode($modelSpecObject->id); ?></td>
        <td><?php echo CHtml::encode($modelSpecObject->alias); ?></td>
        <td><?php echo CHtml::encode($modelSpecObject->title); ?></td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_required) : ?>
            <span title="Обязательное" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не обязательное" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_show_for_admin) : ?>
            <span title="Показывать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не показывать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_show_for_debit) : ?>
            <span title="Показывать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не показывать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_show_for_credit) : ?>
            <span title="Показывать" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не показывать" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_admin_specifies) : ?>
            <span title="Заполняет" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не заполняет" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_debit_specifies) : ?>
            <span title="Заполняет" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не заполняет" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
        <td class="center">
            <?php if ((boolean)$modelSpecObject->is_credit_specifies) : ?>
            <span title="Заполняет" class="true">&nbsp;</span>
            <?php else : ?>
            <span title="Не заполняет" class="false">&nbsp;</span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif ; ?>