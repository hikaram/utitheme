$(function(){

    $('#td_upload_link_change').bind('click', function(){
        $('#td_upload_photo').hide();
        $('#td_upload_link_change').hide();
        $('#td_upload_form_block').show();
        $('#td_upload_link_cancel').show();
        $('input#changePicture').val(1);
    });
    
    $('#td_upload_link_cancel').bind('click', function(){
        $('#td_upload_form_block').hide();
        $('#td_upload_link_cancel').hide();
        $('#td_upload_photo').show();
        $('#td_upload_link_change').show();
        $('input#changePicture').val(0);
    });
    
    
    $('#td_upload_link_change_nonactive').bind('click', function(){
        $('#td_upload_photo_nonactive').hide();
        $('#td_upload_link_change_nonactive').hide();
        $('#td_upload_form_block_nonactive').show();
        $('#td_upload_link_cancel_nonactive').show();
        $('input#changePicture_nonactive').val(1);
    });
    
    $('#td_upload_link_cancel_nonactive').bind('click', function(){
        $('#td_upload_form_block_nonactive').hide();
        $('#td_upload_link_cancel_nonactive').hide();
        $('#td_upload_photo_nonactive').show();
        $('#td_upload_link_change_nonactive').show();
        $('input#changePicture_nonactive').val(0);
    });    
    
    
})