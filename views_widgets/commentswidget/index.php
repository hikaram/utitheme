<script type="text/template" id="edit_template">

    <div class="form-group">
        <textarea class="form-control" rows="8"></textarea>
    </div>
    <p>
        <button class="btn btn-primary"><?=Yii::t('app', 'изменить')?></button>
    </p>
</script>
<script type="text/template" id="answer_template">
    <div class="form-group">
        <textarea class="form-control" rows="8"></textarea>
    </div>
    <p>
        <button class="btn btn-primary"><?=Yii::t('app', 'ответить')?></button>
    </p>
</script>
<script type="text/javascript">
    (function(){
        var Comments = function(params){
            this.settings = {
                urlAdd : '/comments/ajax/add',
                urlGet : '/comments/ajax/get',
                urlAnswer : '/comments/ajax/answer',
                urlEdit : '/comments/ajax/edit'
            };
            
            this.object_id = null;
            this.object_alias = null;
            
            this.init = function(params){
                if (params)
                {
                    if (params.object_id) this.object_id = params.object_id;
                    if (params.object_alias) this.object_alias = params.object_alias;
                }
                
                this.bindEvents();
            }
            
            this.bindEvents = function(){
                $('#comments_list-comments')
                .on('click', '.comment_answer-comment', {object : this}, this.answer)
                .on('click', '.comment_edit-comment', {object : this}, this.edit);
                
                $('#comment_add-comment').on('click', {object : this}, this.add);
            };
            
            this.add = function(event){
                event.preventDefault();
                
                $.ajax({
                    url : event.data.object.settings.urlAdd,
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        YII_CSRF_TOKEN : app.csrfToken,
                        object_id   : event.data.object.object_id,
                        object_alias   : event.data.object.object_alias,
                        comment_text   : $('#comments_comment-text').val()
                    },
                    success : function(data){
                        event.data.object.get();
                        $('#comments_comment-text').val('');
                    }
                });
            };
            
            this.answer = function(event){
                event.preventDefault();
                


                var textBlock = $(this).closest('.comments_comment-block'),
                textEditBlock = $('<div class="answer-block" style="display: none;"></div>').html($('#answer_template').text());
                
                if (textBlock.find('.answer-block').length)
                {
                    textBlock.find('.answer-block').hide(300, function(){
                        $(this).remove();
                    });
                    return;
                }
                
                textBlock.append(textEditBlock);

                textEditBlock.stop(false, true).show(300);
                
                $(textEditBlock).on('click', 'button', function(){
                    $.ajax({
                        url : event.data.object.settings.urlAnswer,
                        dataType : 'json',
                        type : 'POST',
                        data : {
                            YII_CSRF_TOKEN : app.csrfToken,
                            object_id   : event.data.object.object_id,
                            object_alias   : event.data.object.object_alias,
                            comment_id     : $(this).closest('.comments_comment-block').attr('data-message-id'),
                            comment_text   : textEditBlock.find('textarea').val()
                        },
                        success : function(){
                            event.data.object.get();
                            $('#comments_comment-text').val('');
                            textBlock.find('.answer-block').hide(300, function(){
                                $(this).remove();
                            });
                        }
                    });
                });                
            };
            
            this.edit = function(event){
                event.preventDefault();
                var textBlock = $(this).closest('.comments_comment-block').find('.comments_comment-text');
                
                textBlock.hide();

                var textEditBlock = $('<div></div>').html($('#edit_template').text());
                
                textEditBlock.find('textarea').text(textBlock.text());

                $(textEditBlock).on('click', 'button', {textEditBlock : textEditBlock, textBlock : textBlock, self : event.data.object}, function(event){
                    event.preventDefault();
                    
                    event.data.textBlock
                    .text(event.data.textEditBlock.find('textarea').val())
                    .show();
                    
                    event.data.textEditBlock.remove();
                    
                    $.ajax({
                        url : event.data.self.settings.urlEdit,
                        type : 'POST',
                        data : {
                            YII_CSRF_TOKEN : app.csrfToken,
                            object_id   : event.data.self.object_id,
                            object_alias  : event.data.self.object_alias,
                            comment_id     : event.data.textBlock.closest('.comments_comment-block').attr('data-message-id'),
                            comment_text   : event.data.textBlock.text()
                        },
                        success : function(data){
                            event.data.self.get();
                        }
                    });
                    
                    $(this).remove();
                });

textBlock.after(textEditBlock);
};

this.get = function(){
    $.ajax({
        url : this.settings.urlGet,
        dataType : 'json',
        type : 'POST',
        data : {
            YII_CSRF_TOKEN  : app.csrfToken,
            object_id       : this.object_id,
            object_alias    : this.object_alias,
            template        : 'comments',
            isRatio         : <?=(int)$this->isRatio?>
        },
        success : function(data){
            if (data && data.html)
            {
                $('#comments_list-comments').empty().html(data.html);
            }
        }
    });
};

this.init(params);
}

$(function(){
    var comments = new Comments({
        object_id : "<?=$object_id ?>",
        object_alias : "<?=$object_alias ?>"
    });
});
})();
</script>
<div id="comments_list-comments">
    <?php include ('comments.php'); ?>
</div>
<?php if (Yii::app()->user->checkAccess('Comments')) : ?>
    <?php include('add.php') ?>
<?php endif; ?>