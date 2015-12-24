<?php
$this->breadcrumbs=array(
	'Загрузка файлов'=>array('index'),
	'Добавить',
);
?>
<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('uploads.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<?php
 $options = array();
        foreach ($modelsCategories as $key => $modelParent)  
        {
            $options[$modelParent->id] = array('class' => 'tree-level-' . $modelParent['tree_level']);
        }
     
?>
<style>
   <?php for($i = 0; $i < 10; $i++) : ?>
    .tree-level-<?=$i+1?> { padding-left : <?=$i * 20?>px }
    <?php endfor; ?>
    .progress-wrap {
    background: none repeat scroll 0 0 #ededed;
    border-radius: 3px;
    box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2) inset;
    height: 18px;
    width: 340px;
    overflow: hidden;
    }
    #progress-status {
        background: none repeat scroll 0 0 #0c0;
        border-radius: 3px 0 0 3px;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2) inset;
        height: 18px;
        width: 0%;
    }
    #progress-status.success
        {
            background: #0c0 none 0 0 no-repeat;
        }
    #progress 
    {
            display: block;
            width: 340px;
            padding: 2px 5px;
            margin: 2px 0;
            border: 1px inset #446;
            border-radius: 5px;
            height: 15px;
            background: #0c0 none 0 0 no-repeat;
            background-color: #0c0;
            background-position: 0%;
    }
    #progress.success
    {
        background: #0c0 none 0 0 no-repeat;
    }

    #progress.failed
    {
        background: #c00 none 0 0 no-repeat;
    }
    
</style>

<h1>Выберите файл и заполните форму</h1>
<p class="note">Разрешенные типы файлов для загрузки в библиотеку: <?=Yii::app()->controller->module->params->file_list?></p>
<p class="note">Внимание: при загрузке картинок в данной форме картинка предпросмотра сгенерирована не будет.</p>
<p class="note">Используйте для загрузки картинок другие методы.</p>
<p class="note">Поля с <span class="required">*</span> обязательно должны быть заполнены.</p>
<div class="error-summary"><?=CHtml::errorSummary(array($model)); ?></div>
    <div class="error-summary"><?=CHtml::errorSummary(array($preview)); ?></div>
    <div class="pad"></div>
    <div id="js_errors" style="color:red; text-align: left;"></div>

    
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploads-admin-form', 'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class'=>'reg-form'),
	'enableAjaxValidation'=>TRUE,
)); ?>
    <table class="form" style='float:left; width: 50%;'>
    <tbody>
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'name'); ?></td>
                <td><?=CHtml::activeTextField($model,'name', array('class' => 'normal', 'size' => '0', 'style' => 'width: 143px;')); ?></td>
        </tr>
        
        <tr>
            <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model,'category__id'); ?>*</td>
            <td>
            <!--Вывод дерева категорий-->
            <input type="text" value="" readonly="readonly" required id="cat_text">
            <a href="#" id="tree_category">Показать дерево категорий</a>
            <table id="cats" style="display: none;">
            <?php foreach($cats as $key => $tree) :?>  
                 <tr class="tn-container" node="<?=$tree->id?>" parent="<?=$tree->parent_id?>" children_count="<?=count($tree->childs)?>" level="<?=$tree->tree_level?>">
                      <td class="tn-manager"  width="500">
                        <div class="tnm-children"></div>
                        <div class="tnm-content"><?=CHtml::encode($tree->category)?></div>
                      </td>
                      <td>
                          <div class="choice" id="<?=CHtml::encode($tree->id)?>" style='float:left;'>+</div>
                      </td>
                </tr>
                <?php endforeach; ?> 
            </table>
                <?php echo CHtml::activeHiddenField($model,'category__id', array('id' => 'choosed_category_id')); ?>
                <?php echo CHtml::activeHiddenField($model,'image', array('id' => 'choosed_file')); ?>
           
            </td>
        </tr>
        
        <tr>
                <td width="120" style="padding-top: 10px;"><?php echo $form->labelEx($model,'is_paid', array('style'=>'width:300px;')); ?></td>
                <td><?php echo $form->checkBox($model,'is_paid', array()); ?></td>
        </tr>
        
         <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'comments'); ?></td>
                <td><?=CHtml::activeTextArea($model,'comments', array('class' => 'normal', 'size' => '6', 'style' => 'width: 143px;')); ?></td>
        </tr>
         <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model_lang,'key_words'); ?></td>
                <td><?=CHtml::activeTextArea($model_lang,'key_words', array('class' => 'normal', 'size' => '6', 'style' => 'width: 143px;')); ?></td>
        </tr>
        <?php if(isset($all_roles)):?>
            <tr>
                    <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabel($model,'role'); ?></td>
                    <td><?php echo $form->dropDownList($model,'role', $all_roles, array());?></td>
            </tr>
        <?php endif;?>

       <!--Загрузка превью--> 
        <tr>
            <td width="120" style="padding-top: 10px;"><?php echo $form->labelEx($preview,'preview'); ?></td>
            
            <td style="position:relative;">
            <?php echo CHtml::activeFileField($preview,'preview', array('title'=>'Допустимые типы файлов '.Yii::app()->controller->module->params->file_list, 'style'=>'display:none;', 'id' => 'preview_hid')); ?>
            <?php echo CHtml::button('Обзор...', array('id'=>'sel_but', 'style'=>'position:relative;')); ?>
            <span  id="target_text">Файл не выбран</span>
            </td>
        </tr>
        <tr>
                <td width="120" style="padding-top: 10px;"><?=CHtml::activeLabelEx($model_lang,'author'); ?></td>
                <td><?=CHtml::activeTextField($model_lang,'author', array('class' => 'normal', 'size' => '0', 'style' => 'width: 250px;')); ?></td>
        </tr>
        <tr><td><?php echo CHtml::submitButton('Сохранить'); ?></td></tr>
 
</tbody>
</table><!-- form -->

<?php $this->endWidget(); ?>
<table style='float:left; width: 50%;'>
    <tr>
        <td width="120" style="padding-top: 10px;"><label>Файл для загрузки *</label></td>
        <td><?php echo CHtml::activeFileField($model, 'image', array('title'=>'Допустимые типы файлов '.Yii::app()->controller->module->params->file_list,
            'id' => 'file', 'onChange' => 'uploadchange();')); ?></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-top:20px;">
            <div id="progressNumber"></div>
            <div class="progress-wrap"><div id="progress-status"></div></div>
            <div id="uploadlist"></div>
        </td></tr>
</table>

<script type="text/javascript" > 
    $(function(){ 
    var form = document.forms[0];
    form.addEventListener('submit', function(ev) {
    error = ''; 
    ev.preventDefault(); 
    if(form["UploadsAdmin[name]"].value.length <= 0)
        error = error + 'Введите имя загружаемого файла. <br>';
   
    if(form["UploadsAdmin[category__id]"].value.length <= 0)
        error = error + 'Выберите категорию. <br>';
   
    var fff = document.getElementById("file");
    
    if(fff.files.length <= 0)
         error = error + 'Выберите файл для загрузки. <br>';
    
    if(error.length > 0)
    {
        $('#js_errors').html(error);
        return false;
    }
    else
    {
       form.submit(); 
    }
      
    }, false);

});

function uploadchange() {
            var input = document.getElementById("file");
            var ul = document.getElementById("uploadlist");
            var ext = input.files[0]['type'].split('/');
            
			var fname = input.files[0]['name'].split('.');
			
if(('<?=Yii::app()->controller->module->params->file_list?>'.indexOf(fname[fname.length-1]) == -1) )
            {
                ul.innerHTML = '<p>Недопустимый тип файла!</p>'
                return false;
            }
            
            var model_field = $('#choosed_file');
            model_field.val(input.files[0].name);
            
            while (ul.hasChildNodes()) {
                ul.removeChild(ul.firstChild);
            }
            for (var i = 0; i < input.files.length; i++) {
                var li = document.createElement("li");
                thefilesize = input.files[i].fileSize||input.files[i].size;
                if (thefilesize > 1024 * 1024)
                {
                    thefilesize = (Math.round(thefilesize  * 100 / (1024 * 1024)) / 100).toString() + 'MB';
                }
                else
                {
                    thefilesize = (Math.round(thefilesize  * 100 / 1024) / 100).toString() + 'KB';
                }

                li.innerHTML = input.files[i].name + " " + thefilesize ;
                ul.appendChild(li);             
            }
            //console.log(input.files[0].name);
            if(!ul.hasChildNodes()) {
                var li = document.createElement("li");
                li.innerHTML = 'No Files Selected';
                ul.appendChild(li);
            }
            sendRequest();
        }

window.BlobBuilder = window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder;
var progress = document.getElementById('progress-status');
            function sendRequest() {
                
                var blob = document.getElementById('file').files[0];
                var BYTES_PER_CHUNK = 1048576; // 1MB chunk sizes.
                var SIZE = blob.size;
                var start = 0;
                var end = BYTES_PER_CHUNK;
                window.uploadcounter=0;
                window.uploadfilearray = [];
                
                document.getElementById('progressNumber').innerHTML = "Процент загрузки: 0 % ";
                while( start < SIZE ) {

                    var chunk = blob.slice(start, end);
                    window.uploadfilearray[window.uploadcounter] = chunk;
                    window.uploadcounter = window.uploadcounter+1;
                    start = end;
                    end = start + BYTES_PER_CHUNK;
                }
                window.uploadcounter=0;
                //alert(transliterate(document.getElementById('file').files[0].name));return false;
                uploadFile(window.uploadfilearray[window.uploadcounter], document.getElementById('file').files[0].name);
                }

            function fileSelected() {
                var file = document.getElementById('fileToUpload').files[0];
                if (file) {
                    var fileSize = 0;
                    if (file.size > 1024 * 1024)
                        fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
                    else
                        fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

                    document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
                    document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
                    document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
                }
            }

            function uploadFile(blobFile,filename) {
                var fd = new FormData();
                fd.append("fileToUpload", blobFile);

                var xhr = new XMLHttpRequest();


                xhr.addEventListener("load", uploadComplete, false);
                xhr.addEventListener("error", uploadFailed, false);
                xhr.addEventListener("abort", uploadCanceled, false);

                xhr.open("POST", "/admin/uploads/default/bigfile?filename="+filename);

                xhr.onload = function(e) {
            window.uploadcounter=window.uploadcounter+1;
            if (window.uploadfilearray.length > window.uploadcounter ){
                uploadFile(window.uploadfilearray[window.uploadcounter],document.getElementById('file').files[0].name); 
                var percentloaded2 = parseInt((window.uploadcounter/window.uploadfilearray.length)*100);
                document.getElementById('progressNumber').innerHTML = 'Процент загрузки: '+percentloaded2+' % '; 
                console.log(progress);
                console.log(percentloaded2 + "%");
                progress.style.width = percentloaded2 + "%"; 
                
            }else{
                document.getElementById('progressNumber').innerHTML = "Файл загружен";
                progress.className = "success";
                progress.style.width = "100%"; 
                //loadXMLDoc('./system/loaddir.php?url='+ window.currentuploaddir);

            }
                  };

                xhr.send(fd);

            }

           function uploadComplete(evt) {
                /* This event is raised when the server send back a response */
        if (evt.target.responseText != ""){
                    //alert(evt.target.responseText);
        }
            }

            function uploadFailed(evt) {
                alert("Произошла ошибка во время загрузки файла.");
            }

            function uploadCanceled(evt) {
                xhr.abort();
                xhr = null;
                //alert("The upload has been canceled by the user or the browser dropped the connection.");
            }
            //Если с английского на русский, то передаём вторым параметром true.
transliterate = (
	function() {
		var
			rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ  ы  э  а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
			eng = "sch sh ch cz yu ya yo zh `` y e a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g)
		;
		return function(text, engToRus) {
			var x;
			for(x = 0; x < rus.length; x++) {
				text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
				text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());	
			}
			return text;
		}
	}
)();

</script>



