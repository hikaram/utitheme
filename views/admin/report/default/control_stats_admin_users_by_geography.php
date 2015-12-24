<? 
Yii::app()->getClientScript()->registerCss('AdminReport',
"
.help-link { position: relative; color: #80D9DE; }
.help-link .help-text { z-index: 100; display: none; position: absolute; top: 0; left: 0; width: 200px; padding: 10px; border: 1px solid #EBEBEB; background: white; color: black; font-weight: normal; }
.help-link:hover .help-text { display: block; }

"
);

//Реализовано в шаблоне, т.к. сильно связано с логикой отображения. Для возможности перенатянуть дизайн.
//не пугаться, анонимная функция, чтобы не засорять глобальное пространство имен.
$getLangData = function ($id, $data) 
{
	$help = <<<EOD
	<span class="help-link">?<span class="help-text">Нет данных - означает, что для региона в котором зарегистрированы пользователи, нет перевода для текущего языка, на котором просматривается сайт.
		Добавьте перевод на этот язык, для соответствующих регионов. "Id" означает идентификатор региона.
	</span></span>
EOD;

	if ($data == '' || $data == null)
	{
		return Yii::t('app', 'Нет данных для id={id} ', array('{id}' => $id)) . $help;
	}
	
	return CHtml::encode($data);
}
?>

<? if (array_key_exists('country', $regions)) : ?>
    <? foreach ($regions['country'] AS  $country) : ?>
        <table class="table table-hover">
            <tr>
                <th colspan="2" style="text-align: center;">
                    <div style="margin: 0 auto; display: inline-block;"><?=$getLangData($country['cities__id'], $country['country'])?></div>
                    <div style="float: right; display: inline-block;">(<?=$country['users_count']?>&nbsp;<?=Yii::t('app', 'чел.')?>)</div>
                </th>
            </tr>
            <? foreach ($regions['region'] AS  $region) : ?>
                <? if ($region['parent_id'] == $country['id']) : ?>
                    <tr>
                        <td width="120" colspan="2" style="text-align: center;">
                            <div style="margin: 0 auto; display: inline-block;"><?=$getLangData($region['cities__id'], $region['region'])?></div>
                            <div style="float: right; display: inline-block;">(<?=$region['users_count']?>&nbsp;<?=Yii::t('app', 'чел.')?>)</div>
                        </td>
                    </tr>
                    <? foreach ($regions['city'] AS  $city) : ?>
                        <? if ($city['parent_id'] == $region['id']) : ?>
                            <tr>
                                <td width="120"><?=$getLangData($city['cities__id'], $city['city'])?></td>
                                <td style="text-align: right;"><?=$city['users_count']?>&nbsp;<?=Yii::t('app', 'чел.')?></td>
                            </tr>
                        <? endif; ?>
                    <? endforeach; ?>
                <? endif; ?>
            <? endforeach; ?>
        </table>
    <? endforeach; ?>
    <hr />
    <div class="right">
        <?=CHtml::link(Yii::t('app', 'Всего партнёров') . ': ' . $report['all']['all'], $this->createUrl('/admin/user/user'), array('title' => Yii::t('app', 'Перейти к списку пользователей')))?>
    </div>
<? endif; ?>