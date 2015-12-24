<?=CHtml::hiddenField(FALSE, $minSort, array('id' => 'minSort_' . $objectHash))?>
<?=CHtml::hiddenField(FALSE, $maxSort, array('id' => 'maxSort_' . $objectHash))?>


    <table id="list_feilds" class="table table-hover">
        <thead>
            <tr>
                <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Название')?></th>
                <? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
                    <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Таблица')?></th>
                    <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Поле')?></th>
                <? endif; ?>
                <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Обязательное')?></th>
                <? if ($objectFill != 'profile') : ?>
                    <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Тип заполнения')?></th>
                <? endif; ?>
                <? if ((bool)$isStep) : ?>
                    <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Шаг регистрации')?></th>
                <? endif; ?>
                <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Дополнительные параметры')?></th>
                <th style="border-top: 1px solid #cfd3d0;"><?=Yii::t('app', 'Действие')?></th>        
            </tr>
        </thead>
            
        <? foreach($list as $item => $field) :?>
            <tr<? if (!(bool)$field->is_use) : ?> style="display: none"<? endif; ?> id="tableLine_<?=$field->id?>" data-sort="<?=$field->sort_no?>" data-object="<?=$objectHash?>">
                <td>
					<div style="float: left">
						<? if (Yii::app()->user->checkAccess('AdminRegisterAdminEdit')) : ?>
							&nbsp;&nbsp;
							<?=CHtml::link('<span class="edit" title="' . Yii::t('app', 'Редактировать название') . '" id="linkSpan_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editFieldName(' . $field->id . ')'))?>&nbsp;&nbsp;&nbsp;
						<? else : ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<? endif; ?>
					</div>
					<div id="fieldNameStat_<?=$field->id?>">
						<?=CHtml::encode($field->label)?>
					</div>
					<? if (Yii::app()->user->checkAccess('AdminRegisterAdminEdit')) : ?>
						<div id="fieldNameDyn_<?=$field->id?>" style="display: none;">
							<?=CHtml::activeTextField($field, 'label', array('id' => 'fieldNameText_' . $field->id, 'style' => 'width: 170px;'))?>
							<div style="float: right; width: 60px; margin-top: 5px;">
								<?=CHtml::link('<span class="apply" title="' . Yii::t('app', 'Сохранить название') . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveFieldName(' . $field->id . ')'))?>&nbsp;&nbsp;
								<?=CHtml::link('<span class="cancel" title="' . Yii::t('app', 'Отмена') . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideFieldName(' . $field->id . ')'))?>
							</div>
						</div>
					<? endif; ?>
                </td>
				<? if (Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) : ?>
					<td>
						<?=CHtml::encode($field->table)?>
					</td>
					<td>
						<?=CHtml::encode($field->field)?>
					</td>
				<? endif; ?>
                <? if ((!(bool)$field->is_allowed_to_edit) && ($field->object_alias == 'profile')) : ?>
                    <td colspan="<? if ((bool)$isStep) : ?>3<? else : ?>2<? endif; ?>" style="text-align: center;"> - - </td>
                <? else : ?>
                    <td style="text-align: center;">
                        <? if ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) || ((bool)$field->is_allowed_to_edit)) : ?>
                            <div id="required-checkbox-wrapper-<?=CHtml::encode($field->field)?>-<?=CHtml::encode($field->object_alias)?>" <? if (($field->clone != NULL) && ($field->clone->field->object_alias == $field->object_alias)) : ?> style="display: none;"<? endif; ?>>
                                <?=CHtml::activeCheckBox($field, 'is_required', array('class' => 'requireCheckBoxes', 'attrId' => $field->id, 'id' => 'Fields_is_required_' . $field->id))?>
                            </div>
                        <? else : ?>
                            <? if ((bool)$field->is_required) : ?>
                                <span class="true">&nbsp;</span>
                            <? else : ?>
                                <span class="false">&nbsp;</span>
                            <? endif; ?>					
                        <? endif; ?>
                    </td>
                    <? if ($field->object_alias != UsersRegisterObjectTypes::TypeAliasProfile) : ?>
                        <td>
                            <? if (($field->table == 'profile') && ($field->field == 'sponsor__id')) : ?>
                                <? if ($field->object_alias == UsersRegisterObjectTypes::TypeAliasAdminadd) : ?>
                                    <?=Yii::t('app', 'Заполняется пользователем')?>
                                <? else : ?>
                                    <?=Yii::t('app', 'При отсутствии реф. ссылки заполняется пользователем')?>
                                <? endif; ?>
                                
                            <? elseif (
                                (($field->table == 'profile') && ($field->field == 'attachment__id')) || 
                                (($field->table == 'users') && ($field->field == 'email')) ||
                                (($field->table == 'profile_lang') && ($field->field == 'country_name')) ||
                                (($field->table == 'profile_lang') && ($field->field == 'region_name')) ||
                                (($field->table == 'profile_lang') && ($field->field == 'city_name')) ||
                                (($field->table == 'profile') && ($field->field == 'captcha'))): ?>
                                <?=Yii::t('app', 'Заполняется пользователем')?>
                            <? elseif (($field->table == 'profile') && ($field->field == 'question')): ?>
                                <div style="text-align: center"> - - </div>
                            <? else : ?>
                                <div style="float: left">
                                    <?=CHtml::link('<span class="edit" title="Редактировать тип" id="linkTypeSpan_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editFieldType(' . $field->id . ')'))?>&nbsp;&nbsp;&nbsp;
                                </div>
                                <div id="fieldTypeStat_<?=$field->id?>">
                                    <?=$field->getCurrentFilltype()?>
                                </div>					
                                <div id="fieldTypeDyn_<?=$field->id?>" style="display: none;">
                                    <?=CHtml::listBox('Fields[is_user_filltype]', (($field->is_user_filltype) || ($field->filltype == NULL)) ? (int)FALSE : $field->filltype->type, Fields::getFilltypesArray($field->field), array('id' => 'fieldTypeText_' . $field->id, 'size' => 1, 'onChange' => 'getFieldListForDuplicate(' . $field->id . ', this)'))?>
                                    <span id="fieldCopy_<?=$field->id?>" style="display: none;"></span>
                                    <div style="float: right; width: 60px; margin-top: 5px;">
                                        <?=CHtml::link('<span class="apply" title="Сохранить тип">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveFieldType(' . $field->id . ')'))?>&nbsp;&nbsp;
                                        <?=CHtml::link('<span class="cancel" title="Отмена">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideFieldType(' . $field->id . ')'))?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </td>
                    <? endif; ?>
                    <? if ((bool)$isStep) : ?>
                        <td>
                            <div style="float: left">
                                <?=CHtml::link('<span class="edit" title="Редактировать шаг" id="linkStepSpan_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editFieldStep(' . $field->id . ')'))?>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div id="fieldStepStat_<?=$field->id?>">
                                <? if (($field->step_alias == NULL) || ($field->step == NULL)) : ?>
                                    <?=Yii::t('app', 'Шаг не выбран')?>
                                <? else : ?>
                                    <?=CHtml::encode($field->step->step_name)?>
                                <? endif; ?>
                            </div>
                            <div id="fieldStepDyn_<?=$field->id?>" style="display: none;">
                                <? if (($field->table == 'profile') && ($field->field == 'captcha')) : ?>
                                    <?=CHtml::activeListBox($field, 'step_alias', Fields::getStepsList(), array('id' => 'fieldStepText_' . $field->id, 'size' => 3, 'multiple' => true))?>
                                <? else : ?>
                                    <?=CHtml::activeListBox($field, 'step_alias', Fields::getStepsList(), array('id' => 'fieldStepText_' . $field->id, 'size' => 1))?>
                                <? endif; ?>
                                <div style="float: right; width: 60px; margin-top: 5px;">
                                    <?=CHtml::link('<span class="apply" title="Сохранить шаг">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveFieldStep(' . $field->id . ')'))?>&nbsp;&nbsp;
                                    <?=CHtml::link('<span class="cancel" title="Отмена">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideFieldStep(' . $field->id . ')'))?>
                                </div>
                            </div>
                        </td>
                    <? endif; ?>
                    <td style="text-align: center;">
                        <? if ($field->param != NULL) : ?>
                            <div id="additionalParams_<?=$field->id?>"<? if ($field->is_user_filltype != Fields::USER_FILLTYPE) : ?> style="display: none;"<? endif; ?>>
                                <? if ((($field->field == 'password') || ($field->field == 'finpassword')) && ($field->object_alias == 'register')) : ?>
                                    <div style="float: left">
                                        <?=CHtml::link('<span class="edit" title="Редактировать параметр" id="linkParamSpan_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editFieldParam(' . $field->id . ')'))?>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div id="fieldParamStat_<?=$field->id?>">
                                        <? if ($field->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD) : ?>
                                            <?=Yii::t('app', 'Отображать текстовым полем со скрытым вводом')?>
                                        <? elseif ($field->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_TEXT) : ?>
                                            <?=Yii::t('app', 'Отображать текстовым полем')?>
                                        <? elseif ($field->param->show_type == UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC) : ?>
                                            <?=Yii::t('app', 'Динамически изменяемое поле')?>
                                        <? endif; ?>
                                    </div>					
                                    <div id="fieldParamDyn_<?=$field->id?>" style="display: none;">
                                        <?=CHtml::activeListBox($field->param, 'show_type', array(
                                            UsersRegisterFieldsParams::SHOW_TYPE_PASSWORD => 'Отображать текстовым полем со скрытым вводом',
                                            UsersRegisterFieldsParams::SHOW_TYPE_TEXT => 'Отображать текстовым полем',
                                            UsersRegisterFieldsParams::SHOW_TYPE_DYNAMIC => 'Динамически изменяемое поле'
                                        ), array('size' => 1, 'id' => 'fieldParamText_' . $field->param->id))?>
                                        <div style="float: right; width: 60px; margin-top: 5px;">
                                            <?=CHtml::link('<span class="apply" title="Сохранить параметр">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveFieldParam(' . $field->param->id . ', ' . $field->id . ')'))?>&nbsp;&nbsp;
                                            <?=CHtml::link('<span class="cancel" title="Отмена">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideFieldParam(' . $field->id . ')'))?>
                                        </div>
                                    </div>
                                <? elseif ($field->field == 'sex') : ?>
                                        <?=CHtml::activeCheckBox($field->param, 'show_type', array('id' => 'paramsCheckBoxesSex', 'class' => 'paramsCheckBoxesSex', 'onChange' => 'saveFieldParamForWidgetSex(' . $field->param->id . ', this)'))?>
                                        &nbsp;&nbsp;<?=Yii::t('app', 'Отображать незаполненный вариант')?>
                                <? elseif (($field->field == 'sponsor__id') && ($field->object_alias != UsersRegisterObjectTypes::TypeAliasAdminadd)) : ?>
                                    <div style="float: left">
                                        <?=CHtml::link('<span class="edit" title="Редактировать значение по умолчанию" id="linkParamDefaultSpan_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'editFieldParamDefault(' . $field->id . ')'))?>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div id="fieldParamDefaultStat_<?=$field->id?>">
                                        <? if (empty($field->param->default_value)) : ?>
                                            <span><?=Yii::t('app', 'Значение по умолчанию отсутствует')?></span>
                                        <? else : ?>
                                            <span><?=Yii::t('app', 'Присваиваемый логин при отсутствии реферальной ссылки')?>: "<?=CHtml::encode($field->param->default_value)?>"</span>
                                        <? endif; ?>
                                    </div>					
                                    <div id="fieldParamDefaultDyn_<?=$field->id?>" style="display: none;">
                                        <?=Yii::t('app', 'Назначить спонсором пользователя')?>: <?=CHtml::activeTextField($field->param, 'default_value', array('id' => 'paramsCheckBoxesSponsor_' . $field->id, 'class' => 'paramsCheckBoxesSponsor'))?>
                                        <div style="float: right; width: 60px; margin-top: 5px;">
                                            <?=CHtml::link('<span class="apply" title="Сохранить параметр">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'saveFieldParamDefault(' . $field->param->id . ', ' . $field->id . ')'))?>&nbsp;&nbsp;
                                            <?=CHtml::link('<span class="cancel" title="Отмена">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'hideFieldParamDefault(' . $field->id . ')'))?>
                                        </div>
                                    </div>
                                <? elseif ($field->field == 'phone') : ?>
                                    <? if (Yii::app()->isPackageInstall('PhoneMaskWidget')) : ?>
                                        <?=CHtml::activeCheckBox($field->param, 'is_specific_widget', array('id' => 'paramsCheckBoxesPhone', 'class' => 'paramsCheckBoxesPhone', 'onChange' => 'saveFieldParamForWidget(' . $field->param->id . ', this)'))?>
                                        &nbsp;&nbsp;<?=Yii::t('app', 'Использовать для отображения спецальный виджет')?>
                                    <? else : ?>
                                        &nbsp;&nbsp;-&nbsp;&nbsp;-&nbsp;&nbsp; 
                                    <? endif; ?>
                                <? elseif ($field->field == 'attachment__id') : ?>
                                    <? if (Yii::app()->isPackageInstall('FileUpLoad')) : ?>
                                        <?=CHtml::activeCheckBox($field->param, 'is_specific_widget', array('id' => 'paramsCheckBoxesAttachment', 'class' => 'paramsCheckBoxesAttachment', 'onChange' => 'saveFieldParamForWidget(' . $field->param->id . ', this)'))?>
                                        &nbsp;&nbsp;<?=Yii::t('app', 'Использовать для отображения спецальный виджет')?>
                                    <? else : ?>
                                        &nbsp;&nbsp;-&nbsp;&nbsp;-&nbsp;&nbsp; 
                                    <? endif; ?>								
                                <? elseif ($field->field == 'country_name') : ?>
                                    <?=CHtml::activeCheckBox($field->param, 'is_specific_widget', array('id' => 'paramsCheckBoxesCountry_' . $objectHash, 'class' => 'paramsCheckBoxesCities', 'attrId' => $field->param->id, 'typeCountry' => 'country', 'onChange' => 'saveFieldParamForCities(' . $field->param->id . ', ' . $field->id . ', this, "' . $objectHash . '")'))?>
                                    &nbsp;&nbsp;<?=Yii::t('app', 'Использовать для отображения спецальный виджет')?>
                                <? elseif ($field->field == 'region_name') : ?>
                                    <?=CHtml::activeCheckBox($field->param, 'is_specific_widget', array('id' => 'paramsCheckBoxesRegion_' . $objectHash, 'class' => 'paramsCheckBoxesCities', 'attrId' => $field->param->id, 'typeCountry' => 'region', 'onChange' => 'saveFieldParamForCities(' . $field->param->id . ', ' . $field->id . ', this, "' . $objectHash . '")'))?>
                                    &nbsp;&nbsp;<?=Yii::t('app', 'Использовать для отображения спецальный виджет')?>
                                <? elseif ($field->field == 'city_name') : ?>
                                    <?=CHtml::activeCheckBox($field->param, 'is_specific_widget', array('id' => 'paramsCheckBoxesCity_' . $objectHash, 'class' => 'paramsCheckBoxesCities', 'attrId' => $field->param->id, 'typeCountry' => 'city', 'onChange' => 'saveFieldParamForCities(' . $field->param->id . ', ' . $field->id . ', this, "' . $objectHash . '")'))?>
                                    &nbsp;&nbsp;<?=Yii::t('app', 'Использовать для отображения спецальный виджет')?>
                                <? endif; ?>
                            </div>
                        <? else : ?>
                            &nbsp;&nbsp;-&nbsp;&nbsp;-&nbsp;&nbsp; 
                        <? endif; ?>
                    </td>	
                <? endif; ?>

                <td style="text-align: center;">
                    <? if (($field->sort_no > (int)FALSE) && ($field->objectrel != NULL) && ((bool)$field->objectrel->is_sorting)) : ?>
                        <?=CHtml::link('<span class="arrow_top" id="arrow_top_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'sortChange(' . $field->id . ', "' . $objectHash . '", ' . (int)TRUE . ')', 'style' => 'display: ' . ($field->sort_no <= $minSort ? 'none;' : 'inline;')))?>
                        <?=CHtml::link('<span class="arrow_bottom" id="arrow_bottom_' . $field->id . '">&nbsp;</span>', 'javascript: void(0)', array('onClick' => 'sortChange(' . $field->id . ', "' . $objectHash . '", ' . (int)FALSE . ')', 'style' => 'display: ' . ($field->sort_no >= $maxSort ? 'none;' : 'inline;')))?>
                    <? endif; ?>
                    <div id="delete-checkbox-wrapper-<?=CHtml::encode($field->field)?>-<?=CHtml::encode($field->object_alias)?>" style="display: <? if ($field->clone != NULL) : ?>none<? else : ?>inline-block<? endif; ?>;">
                        <? if ((Yii::app()->user->checkAccess('AdminRegisterAdminDelete')) && ((Yii::app()->user->username == Yii::app()->params['superAdminInfo']['username']) || ((bool)$field->is_allowed_to_edit)) && (!(bool)$field->always_use)) : ?>
                            <?=CHtml::linkButton('<span class="delete" title="Удалить">&nbsp;</span>',array(
                               'submit' => array('admin/delete', 'id' => $field->id),
                               'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                               'confirm' => Yii::t('app', 'Удалить запись ?')));  ?>      
                        <? endif; ?>
                    </div>
                </td>
            </tr>
        <? endforeach; ?>   
    </table>
    
    <div style="margin: 20px 0 0 30px;">
        <?=CHtml::link(Yii::t('app', 'Добавить поле'), 'javascript: void(0)', array('onClick' => 'addFieldBlockShow()', 'id' => 'addFieldBlockLink_' . $objectHash, 'class' => 'addFieldBlockLink btn150 btn purple', 'style' => 'margin-bottom: 30px;'))?>
        <div id="addNewField" style="display: none;">
        
            <?php echo CHtml::beginForm(); ?>
                <?php echo CHtml::HiddenField('name', $model->table, array('id' => 'h_table')); ?>
                <?php echo CHtml::HiddenField('name', $model->step_alias, array('id' => 'h_step_alias')); ?>
                <?php echo CHtml::HiddenField('name', $model->field, array('id' => 'h_field')); ?>
                 <div style="padding: 5px; padding-bottom: 20px;">
                     <? if (Yii::app()->user->checkAccess('AdminRegisterAdminAdd')) : ?>
                        <table>
                            <tr>
                                <td style="width:300px"><?=Yii::t('app', 'Название поля')?></td>
                                <td ><?=CHtml::activeDropDownList($model, 'table', Fields::getAddingFields($objectHash), array('style' => 'width: 200px;', 'class' => 'fieldNameSelect', 'id' => 'fieldNameSelect_' . $objectHash));?></td>
                            </tr>
                            <tr>
                                <td><?=Yii::t('app', 'Обязательно для заполнения')?></td>
                                <td ><?=CHtml::activeCheckBox($model, 'is_required', array('id' => 'is_required_' . $objectHash));?></td>
                            </tr>
                            <? if ((bool)$isStep) : ?>
                                <tr>
                                    <td style="width:100px"><?=Yii::t('app', 'Шаг')?></td>
                                    <td ><?=CHtml::activeDropDownList($model, 'step_alias', Fields::getStepsList(), array('style' => 'width: 200px;')); ?></td>
                                </tr>
                            <? endif; ?>
                            <tr>
                                <td colspan="2" style="border-top: 1px #DEDEE1 solid;">
                                    <?=CHtml::button($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Изменить'), array ('class' => 'btn150 btn green', 'name' => 'btn_save', 'onClick' => 'addNewFieldSubmit("' . $objectHash . '")')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?=CHtml::link(Yii::t('app', 'Отмена'), 'javascript: void(0)', array('onClick' => 'addFieldBlockHide()', 'class' => 'btn150 btn red'))?>
                                </td>
                            </tr>
                        </table>		 

                     <hr />
                     <? endif; ?>
                 </div>

            <?=CHtml::endForm(); ?>  
        </div>
    </div>
    
