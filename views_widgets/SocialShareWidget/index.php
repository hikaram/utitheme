<?php
echo CHtml::tag('div', $opts, null ,false);
?>
<ul class="social-footer list-unstyled list-inline pull-right">

	<?php
	foreach ($services as $service)
	{
		if (!array_key_exists($service, $serviceUrls))
			throw new CHttpException(500, "Non-existant service: '$service'");

		$serviceName = isset($tserviceNames[$service]) ? $serviceNames[$service] : $service;
		$url = $serviceUrls[$service] . urlencode($url);		
		?>
		<li>
			<a href="<?php echo $url; ?>" target="_blank" title="<?php echo $serviceName; ?>"><i class="<?php echo $serviceIcons[$service]; ?>"></i></a>
		</li>

		<?php } ?>

	</ul>

	<?php echo CHtml::closeTag('div'); ?>