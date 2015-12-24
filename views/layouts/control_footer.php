</div>

</div> <!-- END CONTENT -->
</div> <!-- END SUPER -->
<div class="footer-wrap">
	<? /* Вставка кода из AdminRegisterCode */?>
	<?$this->widget('application.modules.admin.modules.registercode.widgets.registercodewidget',
	 array('position' => 'POS_FOOTER')
	)?>
	<div class="pre-footer">
		<div class="container">
			<div class="row">
				<?php
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
</div>
<!-- END FOOTER -->