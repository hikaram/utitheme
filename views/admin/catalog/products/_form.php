<style>
.nav
{
	background: none !important;
	border:  none !important;
	font-family: "Open Sans", sans-serif !important;
	padding: 0 !important;
	border-bottom: 1px solid #ddd !important;
}

.nav li
{
	background: none !important;
	border:  none !important;
	font-family: "Open Sans", sans-serif !important;
	padding: 0 !important;
}


.nav li:active
{
	background: none !important;
	font-family: "Open Sans", sans-serif !important;
	padding: 0 !important;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus
{
	border: 1px solid #ddd !important;
	border-bottom-color: transparent !important;
	background-color: #fff;
}
.nav li a
{
	background: none !important;
	
}
.tabbable
{
	border:  none !important;
}
</style>
<div id="product_form_tabs" class="tabbable">
    <ul class="nav nav-tabs">
		
        <li><?=CHtml::link(Yii::t('app', 'Основные данные'), array('ajaxproducts/form_main'), array('data-product-id' => $model->getPrimaryKey(), 'data-toggle' => 'tab'))?></li>
        <li><?=CHtml::link(Yii::t('app', 'Настраиваемые поля'), array('ajaxproducts/form_custom_fields'), array('data-product-id' => $model->getPrimaryKey(), 'data-toggle' => 'tab'))?></li>
        <li><?=CHtml::link(Yii::t('app', 'Загрузка изображений'), array('ajaxproducts/form_attachments'), array('data-product-id' => $model->getPrimaryKey(), 'data-toggle' => 'tab'))?></li>
        <?/*<li><?=CHtml::link(Yii::t('app', 'Сетка цен'), array('ajaxproducts/form_grid'), array('data-product-id' => $model->getPrimaryKey()))?></li>*/?>
    </ul>
    <div class="jquery-ui-tabs-preloader-wrapper">
        <div class="preloader-fade">

        </div>
        <div class="preloader-inner">
            <div class="spinner"></div>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>

<script type="text/javascript">
$.ajaxSetup({
type : "POST",
async : false,
dataType : 'html'
});

    var ProductTabsForm = {
        productId: <?=(int)$model->getPrimaryKey()?>,
        tab: null,
        ajaxOptions: {
            type: 'post',
            error: function(xhr, status, index, anchor) {
                $(anchor.hash).html(xhr.responseText);
            },
            beforeSend: function(xhr){
               // ProductTabsForm.preloader('show');
            },
            dataFilter: function(result, type){
                this.dataTypes=['html'];
                result =  $.parseJSON(result);
                return result.content;
            },
            success: function(result){
                //alert(result);
                ProductTabsForm.preloader('hide');
	            ProductTabsForm.ckfinderUpdate();
            }
        },

        preloader: function(action){
            if (action == 'show'){
                $('#product_form_tabs .jquery-ui-tabs-preloader-wrapper').show();
            }
            else if(action == 'hide'){
                $('#product_form_tabs .jquery-ui-tabs-preloader-wrapper').hide();
            }

        },
        // Метод срабатывающий до отправки данных ajaxForm отдельно взятого таба, показывает прелоадер
        ajaxFormBeforeSubmit: function(arr, $form, options){
            ProductTabsForm.preloader('show');
        },

        /**
         * Метод обработки данных ответа для ajaxForm отдельно взятого таба, вставляет в нужный блок контент
         * Проводит очистку инстансов ckeditor-а
         * Обновляет product_id разблокирует табы, если это создание продукта
         * Обновляет хлебные крошки
         * Скрывает прелоадер
         * @param result
         * @param status
         * @param xhr
         * @param form
         */
        ajaxFormSuccess: function(result, status, xhr, form){
            
            var tab =  form.closest('.ui-tabs-panel');
	        $('#flash-messages').html(result.messages);
            if (tab.prop('id') == 'ui-tabs-1')
            {
                $.each(CKEDITOR.instances, function(key, value){
                    value.destroy(true);
                });
                ProductTabsForm.setProductId(result.product_id);
                $('.product-title').html(result.breadcrumbLastItem);
            }
            tab.html(result.content);
			if(result.product_id > 0)
			{
				$(".note-danger").hide();
				$('body,html').animate({scrollTop: 0}, 1000);
				$(".note-success").show();
			}
			else
			{
				$(".error").show();
			}
			
            ProductTabsForm.preloader('hide');
			ProductTabsForm.ckfinderUpdate();


        },

        init: function(){
            
            this.ajaxOptions.data = {
                product_id: ProductTabsForm.productId,
                preset_data: <?=$presetData?>,
                YII_CSRF_TOKEN : globalcsrfToken
            };
            this.tab = $( "#product_form_tabs" ).tabs({
                cache: true,
//                Очищаем все сообщения
                select: function(event, ui){
                    ProductTabsForm.ajaxOptions.data = {product_id: ProductTabsForm.productId, YII_CSRF_TOKEN : globalcsrfToken};
                    $(this).tabs('option', {ajaxOptions: ProductTabsForm.ajaxOptions});
                    $('#dialog-message').hide().empty();
                },
                load: function(e, ui){
                    //$(ui.panel).find('span').empty();
                },

                ajaxOptions: ProductTabsForm.ajaxOptions
            });

            // Отключаем все табы кроме первого, если это новый продукт
            if (this.productId < 1)
            {
                this.tab.tabs('option', 'disabled', [1, 2, 3]);
            }
        },
        setProductId: function(id){
            this.productId = id;
            if (this.productId > 0 && this.tab.tabs('option', 'disabled').length > 0)
            {
                this.tab.tabs('option', 'disabled', []);
            }
        },
	    ckfinderUpdate: function(){
		    $('.ckfinder-replacing').each(function(obj){
			    var ProductsLangbrief_text = CKEDITOR.replace($(this).prop('name'), { height : '390', width : '100%', language : 'ru', toolbar : 'Basic', customConfig : '/library/ckeditor/config.js'});
			    CKFinder.setupCKEditor( ProductsLangbrief_text, { basePath : '/library/ckfinder/', rememberLastFolder : false } ) ;
		    });
	    }
    };
    ProductTabsForm.init();
</script>
