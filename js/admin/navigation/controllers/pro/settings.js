function changeRelations(object)
{
    const ALLOWED_ALL   = 'allowed_fill_picture';
    const ALLOWED_ADMIN = 'allowed_admin_fill_picture';

    if ($(object).attr('id') == ALLOWED_ALL)
    {
        if ($(object).is(':checked'))
        {
            $('input#' + ALLOWED_ADMIN).removeAttr('disabled');
        }
        else
        {
            $('input#' + ALLOWED_ADMIN).removeAttr('checked');
            $('input#' + ALLOWED_ADMIN).attr('disabled', 'disabled');
        }        
    }

}

$(function(){
    
    $('input.checkBoxSettings').bind('change', function(){
        changeRelations(this);
    });

    $.each($('.checkBoxSettings'), function(){
        changeRelations(this);
    });    
})