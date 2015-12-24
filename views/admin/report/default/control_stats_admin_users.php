<h2><?=Yii::t('app', 'За последние 7 дней')?></h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th><?=Yii::t('app', 'Период')?></th>
            <th><?=Yii::t('app', 'Дата')?></th>
            <th class="text-right"><?=Yii::t('app', 'Пользователи')?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'За вчера')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day1']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day1']['day1']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Позавчера')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day2']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day2']['day2']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', '3 дня назад')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day3']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day3']['day3']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', '4 дня назад')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day4']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day4']['day4']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', '5 дней назад')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day5']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day5']['day5']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', '6 дней назад')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day6']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day6']['day6']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', '7 дней назад')?>
            </td>
            <td class="text-left">
                <b><?=MSmarty::date_format($report['day7']['date'], 'd.m.Y')?></b>
            </td>
            <td class="text-right">
                <?=$report['day7']['day7']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>    
    </tbody>
</table>
     
<h2><?=Yii::t('app', 'За последние недели')?></h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th><?=Yii::t('app', 'Период')?></th>
            <th><?=Yii::t('app', 'Даты')?></th>
            <th class="text-right"><?=Yii::t('app', 'Пользователи')?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'На текущую неделю')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week']['week']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Неделю назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week1']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week1']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week1']['week1']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Две недели назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week2']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week2']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week2']['week2']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Три недели назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week3']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week3']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week3']['week3']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Четыре недели назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week4']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week4']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week4']['week4']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Пять недель назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week5']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week5']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week5']['week5']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Шесть недель назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week6']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week6']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week6']['week6']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Cемь недель назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['week7']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['week7']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['week7']['week7']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
    </tbody>
</table>

<h2><?=Yii::t('app', 'За последние годы')?></h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th><?=Yii::t('app', 'Период')?></th>
            <th><?=Yii::t('app', 'Дата')?></th>
            <th class="text-right"><?=Yii::t('app', 'Пользователи')?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'За последние пол года')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['month6']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['month6']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['month6']['month6']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'За текущий год')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['year']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['year']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['year']['year']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Год назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['years1']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['years1']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['years1']['years1']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Два года назад')?>:
            </td>
            <td>
                <b>
                    <?=MSmarty::date_format($report['years2']['date_from'], 'd.m.Y')?> -
                    <?=MSmarty::date_format($report['years2']['date_end'], 'd.m.Y')?>
                </b>
            </td>
            <td class="text-right">
                <?=$report['years2']['years2']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
    </tbody>
</table>

<h2><?=Yii::t('app', 'Пол')?></h2>
<table class="table table-hover">
    <tbody>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Мужской')?>
            </td>
            <td class="text-right">
                <?=$report['users_male']['users_male']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
        <tr>
            <td class="text-left">
                <?=Yii::t('app', 'Женский')?>
            </td>
            <td class="text-right">
                <?=$report['users_female']['users_female']?> <?=Yii::t('app', 'чел.')?>
            </td>
        </tr>
    </tbody>
</table>

<hr />
<div class="right">
	<?=CHtml::link(Yii::t('app', 'Всего партнёров') . ': ' . $report['all']['all'], $this->createUrl('/admin/user/user'), array('title' => Yii::t('app', 'Перейти к списку пользователей')))?>
</div>