function showEditor()
{
    if ($('input#showEditorBox').val() != true)
    {
        return;
    }
    
    if ($('input#showEditorBox').is(':checked'))
    {
        $('textarea#textareablock').css('display', 'none');
        $('textarea#textareablock').css('width', '90%');
        $('textarea#textareablock').css('height', '390px');
        $('textarea#textareablock').css('visibility', 'hidden');
        CKEDITOR.instances['textareackeditor'].setData($('textarea#textareablock').val());
        $('div#cke_textareackeditor').show();
        
    }
    else
    {
        $('textarea#textareablock').css('display', 'block');
        $('textarea#textareablock').css('visibility', 'visible');
        $('textarea#textareablock').css('width', '90%');
        $('textarea#textareablock').css('height', '390px');
        $('textarea#textareablock').val(CKEDITOR.instances['textareackeditor'].getData());
        $('div#cke_textareackeditor').hide();
    }
} 

function deleteFile(elem, file_id)
{
    $(elem).closest('div').remove();
    $('#attachmentsForDel_'+file_id).val('1');
}

function createFileUpload()
{
    $('#createFileUpload').closest('.form-group').before("<div class='form-group'><label class='col-md-3 control-label'></label><div class='col-md-9'><input type='file' value=" + T('Выберите файл') + " name='files[]'></div></div>");
}
 
$(function(){
    $("input[type='submit']").click(function(e){
        if ($('#showEditorBox').val() != true)
        {
            $('#bodyresult').val(CKEDITOR.instances['textareackeditor'].getData());
            $('#mail-letters-form').submit();
            return;
        }
        
        if ($('#showEditorBox').is(':checked'))
        {
            $('#bodyresult').val(CKEDITOR.instances['textareackeditor'].getData());
        }
        else
        {
            $('#bodyresult').val($('#textareablock').val());
        }   

        $('#mail-letters-form').submit();

    });

    setTimeout(function(){
        showEditor();
    }, 300);    
})

