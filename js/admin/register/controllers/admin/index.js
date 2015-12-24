function addFieldBlockShow()
{
	$('div#addNewField').show();
	$('a#addFieldBlockLink').hide();
}

function addFieldBlockHide()
{
	$('div#addNewField').hide();
	$('a#addFieldBlockLink').show();
}

function editFieldName(fieldId)
{
	$('div#fieldNameStat_' + fieldId).hide();
	$('span#linkSpan_' + fieldId).hide();
	$('div#fieldNameDyn_' + fieldId).show();
}

function hideFieldName(fieldId)
{
	$('div#fieldNameDyn_' + fieldId).hide();
	$('span#linkSpan_' + fieldId).show();
	$('div#fieldNameStat_' + fieldId).show();	
}

function editFieldParam(fieldId)
{
	$('div#fieldParamStat_' + fieldId).hide();
	$('span#linkParamSpan_' + fieldId).hide();
	$('div#fieldParamDyn_' + fieldId).show();
}

function hideFieldParam(fieldId)
{
    $('div#fieldParamDyn_' + fieldId).hide();
    $('span#linkParamSpan_' + fieldId).show();
    $('div#fieldParamStat_' + fieldId).show();
}

function editFieldParamDefault(fieldId)
{
	$('div#fieldParamDefaultStat_' + fieldId).hide();
	$('span#linkParamDefaultSpan_' + fieldId).hide();
	$('div#fieldParamDefaultDyn_' + fieldId).show();
}

function hideFieldParamDefault(fieldId)
{
    $('div#fieldParamDefaultDyn_' + fieldId).hide();
    $('span#linkParamDefaultSpan_' + fieldId).show();
    $('div#fieldParamDefaultStat_' + fieldId).show();
}

function editFieldType(fieldId)
{
    $('div#fieldTypeStat_' + fieldId).hide();
    $('span#linkTypeSpan_' + fieldId).hide();
    $('div#fieldTypeDyn_' + fieldId).show();
    getFieldListForDuplicate(fieldId, $('select#fieldTypeText_' + fieldId));
}

function hideFieldType(fieldId)
{
    $('div#fieldTypeDyn_' + fieldId).hide();
    $('span#linkTypeSpan_' + fieldId).show();
    $('div#fieldTypeStat_' + fieldId).show();
    getFieldListForDuplicate(fieldId, $('select#fieldTypeText_' + fieldId));
}

function editFieldStep(fieldId)
{
    $('div#fieldStepStat_' + fieldId).hide();
    $('span#linkStepSpan_' + fieldId).hide();
    $('div#fieldStepDyn_' + fieldId).show();
}

function hideFieldStep(fieldId)
{
    $('div#fieldStepDyn_' + fieldId).hide();
    $('span#linkStepSpan_' + fieldId).show();
    $('div#fieldStepStat_' + fieldId).show();
}

function saveFieldName(fieldId)
{
	var newName = $('input#fieldNameText_' + fieldId).val();
	if ((newName == '') || (newName == undefined))
	{
		return;
	}
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldName'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldId,
			newName			: newName
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('div#fieldNameStat_' + fieldId).html(newName);
			hideFieldName(fieldId);
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldType(fieldId)
{
	var newType     = $('select#fieldTypeText_' + fieldId).val();
	var cloneField  = $('select#fieldTypeCopyText_' + fieldId).val();
    
	if ((newType == '') || (newType == undefined))
	{
		return;
	}
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldType'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldId,
			newType			: newType,
            cloneField      : cloneField
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('div#fieldTypeStat_' + fieldId).html(json.text);
			hideFieldType(fieldId);
			
			if (newType != 0)
			{
                $('div#additionalParams_' + fieldId).hide();
			}
			else
			{
				$('div#additionalParams_' + fieldId).show();
			}
            
            if ((json.duplicateResult != undefined) && (json.duplicateResult.new != undefined))
            {
                $('div#required-checkbox-wrapper-' + json.duplicateResult.new.name + '-' + json.duplicateResult.new.object).hide();
                $('div#delete-checkbox-wrapper-' + json.duplicateResult.new.name + '-' + json.duplicateResult.new.object).css('display', 'none');
            }

            if ((json.duplicateResult != undefined) && (json.duplicateResult.old != undefined))
            {
                $('div#required-checkbox-wrapper-' + json.duplicateResult.old.name + '-' + json.duplicateResult.old.object).show();
                $('div#delete-checkbox-wrapper-' + json.duplicateResult.old.name + '-' + json.duplicateResult.old.object).css('display', 'inline-table');
            }                        
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldStep(fieldId)
{
    var newStep = $('select#fieldStepText_' + fieldId).val();

    if ((newStep == '') || (newStep == undefined))
    {
        return;
    }

    $.ajax({
        url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldStep'),
        data:
        {
            YII_CSRF_TOKEN	: globalcsrfToken,
            fieldId			: fieldId,
            newStep			: newStep
        },
        success: function(json)
        {
            if (json.error != undefined)
            {
                alert(json.error);
                return;
            }
            $('div#fieldStepStat_' + fieldId).html(json.text);
            hideFieldStep(fieldId);

            if (json.is_refresh)
            {
                location.reload();
            }
        },
        error: function(xhr)
        {
            alert(T('Ошибка запроса'))
        }
    });
}

function saveFieldParam(fieldParamId, fieldId)
{
	var newParam = $('select#fieldParamText_' + fieldParamId).val();
	
	if ((newParam == '') || (newParam == undefined))
	{
		return;
	}
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldParam'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldParamId,
			newParam		: newParam
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('div#fieldParamStat_' + fieldId).html(json.text);
			hideFieldParam(fieldId);
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldParamDefault(fieldParamId, fieldId)
{
	var newParam = $('input#paramsCheckBoxesSponsor_' + fieldId).val();
	
	if (newParam == undefined)
	{
		return;
	}
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldParamDefault'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldParamId,
			newParam		: newParam
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('div#fieldParamDefaultStat_' + fieldId).html(json.text);
			hideFieldParamDefault(fieldId);
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function getFieldListForDuplicate(fieldId, obj)
{
    if ($(obj).val() != $('input#showField').val())
    {
        $('span#fieldCopy_' + fieldId).hide();
        $('span#fieldCopy_' + fieldId).html('');
        return;
    }
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxFieldCopy'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldId
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('span#fieldCopy_' + fieldId).html(json.content);
            $('span#fieldCopy_' + fieldId).show();

		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldParamForCities(fieldParamId, fieldId, object, hash)
{
	var checked = $(object).is(':checked');
	var type = $(object).attr('typeCountry');
	
	if ((type == '') || (type == undefined))
	{
		return;
	}
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldParamCities'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			checked			: checked,
			type			: type,
            hash            : hash
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			
			if (checked)
			{
				if (type == 'region')
				{
					$('input#paramsCheckBoxesCountry_' + hash).attr('checked', 'checked');
                    $('input#paramsCheckBoxesCountry_' + hash).parent().addClass('checked');
				}
				
				if (type == 'city')
				{
					$('input#paramsCheckBoxesCountry_' + hash).attr('checked', 'checked');
                    $('input#paramsCheckBoxesCountry_' + hash).parent().addClass('checked');
					$('input#paramsCheckBoxesRegion_' + hash).attr('checked', 'checked');
                    $('input#paramsCheckBoxesRegion_' + hash).parent().addClass('checked');
				}
			}
			else
			{
				if (type == 'region')
				{
					$('input#paramsCheckBoxesCity_' + hash).removeAttr('checked');
                    $('input#paramsCheckBoxesCity_' + hash).parent().removeClass('checked');
				}
				
				if (type == 'country')
				{
					$('input#paramsCheckBoxesCity_' + hash).removeAttr('checked');
                    $('input#paramsCheckBoxesCity_' + hash).parent().removeClass('checked');
					$('input#paramsCheckBoxesRegion_' + hash).removeAttr('checked');
                    $('input#paramsCheckBoxesRegion_' + hash).parent().removeClass('checked');
				}				
			}
			
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldParamForWidget(fieldParamId, object)
{
	var checked = $(object).is(':checked');

	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldParamPhone'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldParamId	: fieldParamId,
			checked			: checked
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function saveFieldParamForWidgetSex(fieldParamId, object)
{
	var checked = $(object).is(':checked');

	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldParamSex'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldParamId	: fieldParamId,
			checked			: checked
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function sortChange(fieldId, object, direction)
{
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxSaveFieldSorting'),
		data:
		{
			YII_CSRF_TOKEN  : globalcsrfToken,
			fieldId	        : fieldId,
			direction		: direction
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
            
            minSort = json.minSort;
            maxSort = json.maxSort;
            currentSort = json.currentSort;
            
            closesSort  = json.closest;
            diff        = json.diff;
            
            if (direction)
            {
                newSort = parseInt(currentSort) - diff;
            }
            else
            {
                newSort = parseInt(currentSort) + diff;
            }
            
            
            //console.log('currentSort = ' + currentSort);
            //console.log('newSort = ' + newSort);
            //console.log('diff = ' + diff);
            
           // alert(newSort);
            
            newString       = $('table#list_feilds').find('tr[data-sort=' + newSort + '][data-object=' + object + ']');
            oldString       = $('table#list_feilds').find('tr[data-sort=' + currentSort + '][data-object=' + object + ']');
            diffCopy        = diff;
            oldStringObject = oldString;
            
            if (direction)
            {
                while(diffCopy > 0)
                {
                    diffCopy--;
                    oldStringObject = oldStringObject.prev();
                }
            
                oldString.insertBefore(oldStringObject);
                oldString.attr('data-sort', newSort);
                newString.attr('data-sort', parseInt(newSort) + diff);
            }
            else
            {
                while(diffCopy > 0)
                {
                    diffCopy--;
                    oldStringObject = oldStringObject.next();
                }
                
                oldString.insertAfter(oldStringObject);
                oldString.attr('data-sort', newSort);
                newString.attr('data-sort', parseInt(newSort) - diff);
            }
            
            console.log('currentSort = ' + currentSort);
            console.log('newSort = ' + newSort);
            console.log('minSort = ' + minSort);
            console.log('maxSort = ' + maxSort);
            
            if (newSort == minSort)
            {
                $('span#arrow_top_' + fieldId).parent().hide();
                $('span#arrow_top_' + json.closestId).parent().show();
            }
            if (newSort == maxSort)
            {
                $('span#arrow_bottom_' + fieldId).parent().hide();
                $('span#arrow_bottom_' + json.closestId).parent().show();
            }
            
            if (currentSort == minSort)
            {
                $('span#arrow_top_' + json.closestId).parent().hide();
                $('span#arrow_top_' + fieldId).parent().show();
                
            }
            if (currentSort == maxSort)
            {
                $('span#arrow_bottom_' + json.closestId).parent().hide();
                $('span#arrow_bottom_' + fieldId).parent().show();
            }
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });    
}

function addNewFieldSubmit(hash)
{	
	var fieldId = $('select#fieldNameSelect_' + hash).val();
	var is_require = $('input#is_required_' + hash).is(':checked');

	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxAddField'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldId,
			is_require		: is_require
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
			$('tr#tableLine_' + fieldId).show();
			$('select#fieldNameSelect_' + hash).find('option[value="' + fieldId + '"]').remove();
			
			if ($('select#fieldNameSelect_' + hash).find('option').length == 0)
			{
				addFieldBlockHide();
				$('a#addFieldBlockLink_' + hash).hide();
			}			
			$('input#Fields_is_required_' + hash).removeAttr('checked');

			if (is_require)
			{
				$('input#Fields_is_required_' + fieldId).attr('checked', 'checked');
                $('input#Fields_is_required_' + fieldId).parent().addClass('checked');
			}
			else
			{
				$('input#Fields_is_required_' + fieldId).removeAttr('checked');
                $('input#Fields_is_required_' + fieldId).parent().removeClass('checked');
			}

            minSort = $('input#minSort_' + hash).val();
            maxSort = $('input#maxSort_' + hash).val();
            
            currentSort   = $('table#list_feilds').find('tr[id=tableLine_' + fieldId + ']').attr('data-sort');
            
            if (currentSort < 0)
            {
                return;
            }
            
            $('span#arrow_bottom_' + fieldId).parent().show();
            $('span#arrow_top_' + fieldId).parent().show();
            
            if (currentSort < minSort)
            {
                $.each($('span.arrow_top'), function(){
                    if ($(this).attr('id') == 'arrow_top_' + fieldId)
                    {
                        $(this).parent().hide();
                    }
                    else
                    {
                        $(this).parent().show();
                    }
                });
            }
            if (currentSort > maxSort)
            {
                $.each($('span.arrow_bottom'), function(){
                    if ($(this).attr('id') == 'arrow_bottom_' + fieldId)
                    {
                        $(this).parent().hide();
                    }
                    else
                    {
                        $(this).parent().show();
                    }
                });
            }
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	
}

function changeRequire(object)
{
	var fieldId = $(object).attr('attrId');
	var checked = $(object).is(':checked');
	
	$.ajax({
		url:    app.createAbsoluteUrl('admin/register/Ajaxadmin/AjaxEditRequire'),
		data:
		{
			YII_CSRF_TOKEN	: globalcsrfToken,
			fieldId			: fieldId,
			checked			: checked
		},
		success: function(json)
		{
			if (json.error != undefined)
			{
				alert(json.error);
				return;
			}
		},
		error: function(xhr)
		{
			alert(T('Ошибка запроса'))
		}
   });	

}

$(document).ready(function(){

	$.ajaxSetup({
	   type 	: "POST",
	   async	: false,
	   dataType	: 'json'
	});

    $.each($('select.fieldNameSelect'), function(){
        if ($(this).find('option').length == 0)
        {
            $(this).parent().parent().parent().parent().parent().parent().parent().parent().find('a.addFieldBlockLink').hide();
        }
    });
	
	$('input.requireCheckBoxes').bind('change', function(){
		changeRequire(this);
	});
    
    $("#admin-register-fields").tabs();    
	
});