<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		<i class="icon-envelope-open"></i>
		<span class="badge badge-default">
			<?php echo $count; ?> </span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<p>
					<?= Yii::t('app', 'Последние сообщения');?>
				</p>
			</li>
			<li>
				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: <?php echo (count($messages) ==0) ? 145 : 250 ?>px;">
					<ul class="dropdown-menu-list scroller" style="overflow: hidden; width: auto; height: 250px;" data-initialized="1">
						<?php if(count($messages) == 0) {?>
							<div class="office-mail-widget"><?= Yii::t('app', 'Сообщений нет');?></div>
						<?php }?>
						<?php foreach ($messages as $message) { ?>
						<li>
							<a href="<?=Yii::app()->createUrl('/office/message/inbox/read/id/' . $message['id'])?>">
								<span class="photo">
									
									<tr>
										<td colspan="2">
											<div id="show_picture">
												<div id="picture_inner">
													<? if (($message['sender_image_secret_name'] != null)) : ?>
													<?=CHtml::image(MSmarty::attachment_get_file_name($message['sender_image_secret_name'], $message['sender_image_raw_name'], $message['sender_image_file_ext'], '_office_profile', 'office_photo'), '', array('align' => 'left', 'style' => 'margin:0 15px 0 0;')); ?>
												<? else : ?>
												<i class="fa fa-user"></i>
											<? endif; ?>
										</div>
									</div>
								</td>
							</tr>
						     
					</span>
					<span class="subject">
						<span class="from">
							<?php echo $message['sender_name']; ?> </span>
							<span class="time">
								<?php echo date("d.m.Y", strtotime($message['created_at'])); ?> </span>

							</span>
							<span class="message">
								<?php echo $message['text']; ?> </span>
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</li>
			<li class="external">
				<a href="/office/message">
					<?= Yii::t('app', 'Посмотреть все сообщения');?> <i class="fa fa-arrow-circle-o-right"></i>
				</a>
			</li>
		</ul>
	</li>