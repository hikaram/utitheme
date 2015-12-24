function isUser()
{  
    var type = $('select#WarWarehouse_war_type__id').val();
    
    if (type == 1)
    {
        $('div#users_tr').hide();
    }
    else
    {
        $('div#users_tr').show();
    }
}

$(function(){
    isUser();
});