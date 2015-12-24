<style>
.overlay {
    background-color: rgba(0, 0, 0, 0.7);
    bottom: 0;
    cursor: default;
    left: 0;
    opacity: 0;
    position: fixed;
    right: 0;
    top: 0;
    visibility: hidden;
    z-index: 99999;
        -webkit-transition: opacity .5s;
        -moz-transition: opacity .5s;
        -ms-transition: opacity .5s;
        -o-transition: opacity .5s;
        transition: opacity .5s;
}
.popup {
    background-color: #fff;
    border: 3px solid #fff;
    display: inline-block;
    left: 50%;
    opacity: 0;
    padding: 15px;
    width: 500px;
    height: 523px;
    position: fixed;
    text-align: justify;
    top:50%;
    visibility: hidden;
    z-index: 999999;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: opacity .5s, top .5s;
    -moz-transition: opacity .5s, top .5s;
    -ms-transition: opacity .5s, top .5s;
    -o-transition: opacity .5s, top .5s;
    transition: opacity .5s, top .5s;
    border-radius: 11px !important;
}
.popup .close_window {
    font-size: 13px;
    display: block;
    width: 23px;
    height: 23px;
    position: absolute;
    top: -15px;
    right: -15px;
    cursor: pointer;
    color: #fff;
    font-family: 'tahoma', sans-serif;
    background: -webkit-gradient(linear, left top, right top, from(#3d51c8), to(#051fb8));
    background: -webkit-linear-gradient(top, #3d51c8, #051fb8);
    background: -moz-linear-gradient(top, #3d51c8, #051fb8);
    background: -o-linear-gradient(top, #3d51c8, #051fb8);
    background: -ms-linear-gradient(top, #3d51c8, #051fb8);
    background: linear-gradient(top, #3d51c8, #051fb8);
    background-color: #3d51c8;
    border: 1px solid #061fb8;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    -o-border-radius: 50% !important;
    -ms-border-radius: 50% !important;
    border-radius: 50% !important;
    text-align: center;
    box-shadow: -1px 1px 3px rgba(0, 0, 0, 0.5);
}
.popup .close_window:hover {
    background: -webkit-gradient(linear, left top, right top, from(#051fb8), to(#3d51c8));
    background: -webkit-linear-gradient(top, #051fb8, #3d51c8);
    background: -moz-linear-gradient(top, #ff5f0, #3d51c87);
    background: -o-linear-gradient(top, #051fb8, #3d51c8);
    background: -ms-linear-gradient(top, #051fb8, #3d51c8);
    background: linear-gradient(top, #051fb8, #3d51c8);
    background-color: #051fb8;
    border: 1px solid #00385E;
}
.popup .close_window:active {
    background: #8f9be0;
}
	
.pagination > li.selected > a {
	background-color: #eee;	
}
</style>
   
    <script type="text/javascript">
        $(document).ready(function(){
            $('.popup .close_window, .overlay').click(function (){
                $('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
            });
            $('a.open_window').click(function (e){
                $('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
                e.preventDefault();
            });            
        });
    </script>


<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Список комментариев') => array('index')
);?>

<?php if ((count($comments) == 0) and (empty($filter))) : ?>
     <div class="note note-success" style="margin-top:25px">
        <?=Yii::t('app', 'Еще не создано ни одного комментария')?>.
    </div>
<?php else : ?>
    <div class="portlet box yellow" style=" margin-top: 25px;">
        <div class="portlet-title">
            <h3 class="caption"><i class="fa fa-comments" style="margin-right: 10px;"></i><?=Yii::t('app','Список комментариев') ?></h3>
        </div>
        <div class="portlet-body">
            <?php echo $this->renderPartial('_filter', array('filter' => $filter, 'comments' => $comments )); ?>
            <div class="table-scrollable">
                <table class="table table-hover">
                   <thead>
                        <tr>
                            <th class="text-center"><?=Yii::t('app', 'Ун.№')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Модуль')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Название статьи')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Пользователь')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Комментарий')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Статус')?></th>
                            <th class="text-center"><?=Yii::t('app', 'Действия')?></th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php foreach($comments as $comment) : ?>
                        <? 
                    	
                    	//vg($comments);die;?>
                    	
                    	<tr>
                            <td class="text-center"><?=$comment->id ?></td>	
                            <td class="text-center"><?= !empty($comment->alias->object->module_name)?$comment->alias->object->module_name:'' ?></td> 
                            <td class="text-center tooltips" data-container = "body" data-placement = "top" data-original-title = "<? eval($comment->alias->object->commet_title_notice)?>"><? !empty($comment->alias->object->commet_title_code)? eval($comment->alias->object->commet_title_code):'' ?></td>
                            <td class="text-center"><?=!empty($comment->user->username)?$comment->user->username:"" ?></td> 
                            <? //$test =$comment->comment_text; vg( mb_substr($test, 0, 10, "UTF-8"));die;?>
                            <td class="text-center"> <a onclick ="post('<?=$comment->id?>')" class="open_window" href="#"><?=mb_substr(strip_tags($comment->comment_text), 0, 40,'UTF8').((mb_strlen(strip_tags($comment->comment_text),'UTF8')>40)?'...':''); ?></a> </td> 
                            <td class="text-center"><?=Comments::LabelStatus($comment->status_id) ?></td> 
                            <td class="text-center">
                                <a href="<?=$this->createUrl('edit', array('id' => $comment->id))?>" class="btn green-seagreen btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Редактировать')?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                <a href="<?=$this->createUrl('delete', array('id' => $comment->id))?>" onClick="if (!confirm('<?=Yii::t('app','Вы действительно хотите удалить комментарий?')?>')){return false;}" class="btn red btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Удалить навсегда')?>"><i class="glyphicon glyphicon-remove"></i></a>
                                <a href="<?=$this->createUrl('markdelete', array('id' => $comment->id))?>" class="btn green-seagreen btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Пометить удаленным')?>"><i class="glyphicon glyphicon-remove"></i></a>                                                               
								<a href="<? (eval($comment->alias->object->link_code))?>" target="_blank" class="btn blue-steel btn-icon tooltips" data-container = "body" data-placement = "top" data-original-title = "<?=Yii::t('app','Ссылка на комментарий')?>" target="_blank"><i class="fa fa-book"></i></a>								
							</td> 
                        </tr>
                        <?php endforeach; ?>
                    </tbody>    
                </table>
            </div>  

            <? 
            Yii::app()->urlManager->appendParams = false;
            $this->widget('CLinkPager', array(
                'pages' => $pages, 
                'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>', 
                'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>', 
                'header' => '', 
                'htmlOptions' => array(
                    'class' => 'pagination'
                )
            ));
            Yii::app()->urlManager->appendParams = true; 
             ?>  

        </div>      
    </div>  
<?php endif?>   
<div class="overlay" title="окно"></div>
<div class="popup">
<div class="close_window">x</div>
    <p id = "postblog">Тут будет текст</p>
</div>
<script>
function post(id)
            {
                var st ;
                st =document.getElementById('postblog');
                
                $.ajax({
                    url : app.createAbsoluteUrl('admin/comments/AjaxComments/getPost/id/'+id),
                    error   : function ()
                    {
                        alert(T('Ошибка запроса'));
                    },
                    success : function(data)
                    {   
                       console.log(data);
                       st.innerHTML = data;
                    },
                    data    :
                    {
                        YII_CSRF_TOKEN      : app.csrfToken,
                        id               : 'admin_blog_index'                       
                    },
                    async       : false,
                    cache       : false
                });
                              
            }
</script>
