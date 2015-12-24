function addFirstPhone()
{
    var html = '<div class="form-group" id="phone_tr_first_0"><div class="col-md-3 text-right"><label class="control-label required" for="CompanyPhones_value">' + T('Телефон компании') + '<span class="required">*</span></label></div><div class="col-md-9"><input id="CompanyPhones_value_0" class="form-control input-inline phones" style="width: 190px;" type="text" maxlength="20" name="CompanyPhones[0][value]"><label class="control-label" for="CompanyPhones_comment" style="margin-left: 15px;">' + T('Описание телефона') + '</label><input type="text" value="" id="CompanyPhones_0_comment" name="CompanyPhones[0][comment]" style="width: 190px; margin-left: 5px;" class="form-control input-inline"><a href="javascript:void(0)" class="btn red" onclick="deletePhone(0)"><i class="fa fa-times"></i></a><div id="phone_tr_0"></div></div></div>';
    $('#tr_before_phone').after(html);
}

function addFirstSkype()
{
    var html = '<div class="form-group" id="skype_tr_first_0"><div class="col-md-3 text-right"><label class="control-label required" for="CompanySkypes_value">' + T('Скайп компании') + '<span class="required">*</span></label></div><div class="col-md-9"><input id="CompanySkypes_value_0" class="form-control input-inline input-large skypes" type="text" maxlength="20" name="CompanySkypes[0][value]"> <a href="javascript:void(0)" class="btn red" onclick="deleteSkype(0)"><i class="fa fa-times"></i></a><div id="skype_tr_0"></div></div></div>';
    $('#tr_before_skype').after(html);
}

function addFirstAddress()
{
    var html = '<div class="form-group" id="address_tr_first_0"><div class="col-md-3 text-right"><label class="control-label required" for="CompanyAddress_value">' + T('Адрес') + '</label></div><div class="col-md-9"><textarea id="CompanyAddress_value_0" class="form-control input-inline input-large address" type="text" name="CompanyAddress[0][value]"></textarea> <a href="javascript:void(0)" class="btn red" onclick="deleteAddress(0)"><i class="fa fa-times"></i></a><div id="address_tr_0"></div></div></div>';
    $('#tr_before_address').after(html);
}

function addPhone()
{
    var max_phone = $('.phones').length;

    if (max_phone == 0)
    {
        addFirstPhone();
        return;
    }
    
	var html = '<div class="margin-top-20" id="phone_tr_' + max_phone + '"><input id="CompanyPhones_value_' + max_phone + '" class="form-control input-inline phones" style="width: 190px;" type="text" maxlength="20" name="CompanyPhones[' + max_phone + '][value]"><label class="control-label" for="CompanyPhones_comment" style="margin-left: 15px;">' + T('Описание телефона') + '</label><input type="text" value="" id="CompanyPhones_' + max_phone + '_comment" name="CompanyPhones[' + max_phone + '][comment]" style="width: 190px; margin-left: 5px;" class="form-control input-inline"><a href="javascript:void(0)" class="btn red" onclick="deletePhone(' + max_phone + ')"><i class="fa fa-times"></i></a></div>'
	
    max_phone = max_phone - 1;
    $('#phone_tr_' + max_phone).after(html);
}

function addSkype()
{
    var max_skype = $('.skypes').length;
    
    if (max_skype == 0)
    {
        addFirstSkype();
        return;
    }    

	var html = '<div class="margin-top-20" id="skype_tr_' + max_skype + '"><input id="CompanyPhones_value_' + max_skype + '" class="form-control input-inline input-large skypes" type="text" name="CompanySkypes[' + max_skype + '][value]"> <a href="javascript:void(0)" class="btn red" onclick="deleteSkype(' + max_skype + ')"><i class="fa fa-times"></i></a></div>'

    max_skype = max_skype - 1;

    $('#skype_tr_' + max_skype).after(html);
}

function addAddress()
{
    var max_address = $('.address').length;
    
    if (max_address == 0)
    {
        addFirstAddress();
        return;
    }    

	var html = '<div class="margin-top-20" id="address_tr_' + max_address + '"><textarea id="CompanyAddress_value_' + max_address + '" class="form-control input-inline input-large address" type="text" name="CompanyAddress[' + max_address + '][value]"> </textarea><a href="javascript:void(0)" class="btn red" onclick="deleteAddress(' + max_address + ')"><i class="fa fa-times"></i></a></div>'

    max_address = max_address - 1;
    $('#address_tr_' + max_address).after(html);
}

function deletePhone(key)
{
    if (!confirm(T('Удалить телефон?')))
    {
        return;
    }
    $('#phone_tr_' + key).remove();
    $('#phone_tr_first_' + key).remove();
}

function deleteSkype(key)
{
    if (!confirm(T('Удалить скайп?')))
    {
        return;
    }
    $('#skype_tr_' + key).remove();
    $('#skype_tr_first_' + key).remove();
}

function deleteAddress(key)
{
    if (!confirm(T('Удалить адрес?')))
    {
        return;
    }
    $('#address_tr_' + key).remove();
    $('#address_tr_first_' + key).remove();
}