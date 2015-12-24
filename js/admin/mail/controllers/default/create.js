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

function createFileUpload()
{
    $('#createFileUpload').closest('.form-group').before("<div class='form-group'><label class='col-md-3 control-label'></label><div class='col-md-9'><input type='file' value=" + T('Выберите файл') + " name='files[]'></div></div>");
}
 
$(function(){
    $("input[type='submit']").click(function(e){
        if ($("input[name='type']:checked").length === 0)
        {
            $("input[name='type']").closest('.form-group').find('.text-danger').html(T('Необходимо выбрать тип E-mail получателя'));
            return false;
        }

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

    $("input[name='type']").change(function(){
        if ($( this ).val() == 0)
        {
            $('#emailRow').hide();
            $('#MailLetters_to').val('all@all.com');
        }
        else
        {
            $('#MailLetters_to').val('');
            $('#emailRow').show();
        }
    });

    var nameChecked = $("input[name='type']:checked").val();
    
    if (nameChecked != undefined)
    {
        if (nameChecked == 0)
        {
            $('#emailRow').hide();
            $('#MailLetters_to').val('all@all.com');
        }
        else
        {
            $('#MailLetters_to').val('');
            $('#emailRow').show();
        }    
    }
    
    setTimeout(function(){
        showEditor();
    }, 300);    
})

