</div> <!-- END CONTENT -->
</div> <!-- END SUPER -->
<div class="footer-wrap">
	<!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
		<div class="container">
			<div class="row">
			<?
				Yii::import('application.modules.admin.modules.content.models.Contents');
				Yii::import('application.modules.admin.modules.content.models.ContentsLang');

				$criteria = new CDbCriteria(array(
					'condition' => 'name = :name',
					'params' => array(
						'name' => 'Контакты футер'
					),
					'with' => array(
						'lang'
					)
				));

				$content = Contents::model()->find($criteria);

				$text = '';

				if (!empty($content) && !empty($content->lang))
				{
					$text = $content->lang->text;
				}

				echo $text;

			?>
			</div>
		</div>
    </div>
    <!-- END PRE-FOOTER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<!-- BEGIN COPYRIGHT -->
				<div class="col-md-6 col-sm-6 padding-top-10">
					<?= date('Y') ?> © UTI.CMS <a href="<?= $this->createUrl('/privacy_policy') ?>"><?=Yii::t('app', 'Политика конфиденциальности')?></a> | <a href="<?= $this->createUrl('/terms_of_service') ?>"><?=Yii::t('app', 'Условия предоставления услуг')?></a>
				</div>
				<!-- END COPYRIGHT -->

				<!-- BEGIN PAYMENTS -->
				<div class="col-md-6 col-sm-6">
                    <? if (Yii::app()->isPackageInstall('SocialShareWidget')) : ?>
                        <?php
                        $this->widget('application.widgets.SocialShareWidget', array(
                            'url' => 'http://' . $_SERVER['HTTP_HOST'],
                            'img' => 'http://' . $_SERVER['HTTP_HOST'] . Yii::app()->theme->baseUrl . '/public/site/img/social.png',
                            'title' => '',
                            'description' => '',
                            'services' => array(
                                'facebook',
                                'vkontakte',
                                'twitter',
                                'linkedin',
                                'google',
                                'pinterest'
                            ),
                            'htmlOptions' => array('class' => 'social'),
                            'popup' => false,
                        ));
                        ?>
                    <? endif; ?>
				</div>
				<!-- END PAYMENTS -->
			</div>
		</div>
	</div>
	<!-- END FOOTER -->
</div>


<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>  
<![endif]-->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>     
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/scripts/footer.js" type="text/javascript"></script>
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<!-- BEGIN LayerSlider -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script src="<?=Yii::app()->params['hostMetronikStatic']?>/public/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		Layout.init();    
		Layout.initOWL();
		LayersliderInit.initLayerSlider();
		Layout.initImageZoom();
		Layout.initTouchspin();
		Layout.initTwitter();
	});
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
</html>