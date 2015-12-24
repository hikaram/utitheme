<table class="table table-striped table-bordered table-hover" id="datatable_reviews">
    <thead>
        <tr role="row" class="heading">
            <th width="10%">
                <?=Yii::t('app', 'Дата отзыва')?>
            </th>
            <th width="25%">
                <?=Yii::t('app', 'Имя пользователя')?>
            </th>
            <? if ((bool)$isRatio) : ?>
                <th width="15%">
                    <?=Yii::t('app', 'Оценка')?>
                </th>
            <? endif ; ?>
            <th width="40%">
                <?=Yii::t('app', 'Поиск по тексту отзыва')?>
            </th>
            <th width="10%">
                <?=Yii::t('app', 'Действия')?>
            </th>
        </tr>
        <tr role="row" class="filter">
            <td>
                <div class="input-group date datetime-picker margin-bottom-5" style="width: 100%;">
                    <?=CHtml::textField('review_created_at_from', array_key_exists('review_created_at_from', $filter) ? $filter['review_created_at_from'] : (string)FALSE, array('class' => 'form-control form-filter input-sm storedatepicker', 'style' => 'width: 100%', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy', 'placeholder' => Yii::t('app', 'От')))?>
                </div>
                <div class="input-group date datetime-picker" style="width: 100%;">
                    <?=CHtml::textField('review_created_at_to', array_key_exists('review_created_at_to', $filter) ? $filter['review_created_at_to'] : (string)FALSE, array('class' => 'form-control form-filter input-sm storedatepicker', 'style' => 'width: 100%', 'readonly' => 'readonly', 'data-date-format' => 'dd.mm.yyyy', 'placeholder' => Yii::t('app', 'До')))?>
                </div>
            </td>
            <td>
                <?=CHtml::textField('review_name', array_key_exists('review_name', $filter) ? $filter['review_name'] : (string)FALSE, ['class' => 'form-control form-filter input-sm'])?>
            </td>
            <? if ((bool)$isRatio) : ?>
                <th></th>
            <? endif ; ?>
            <td>
                <?=CHtml::textField('review_text', array_key_exists('review_text', $filter) ? $filter['review_text'] : (string)FALSE, ['class' => 'form-control form-filter input-sm'])?>
            </td>
            <td>
                <div class="margin-bottom-5">
                    <a href="javascript: void(0)" class="btn btn-sm yellow filter-submit margin-bottom" onClick="saveFilterForReview()"><i class="fa fa-search"></i> <?=Yii::t('app', 'Поиск')?></a>
                </div>
                <a href="javascript: void(0)" class="btn btn-sm red filter-cancel" onClick="clearFilterForReview()"><i class="fa fa-times"></i> <?=Yii::t('app', 'Сбросить')?></a>
            </td>
        </tr>
    </thead>
    <tbody>
        <? if (empty($dataset)) : ?>
            <tr>
                <td colspan="4"><?=Yii::t('app', 'Не найдно ни одной записи')?></td>
            </tr>
        <? else : ?>
            <? foreach ($dataset as $value) : ?>
                <tr>
                    <td>
                        <?=MSmarty::date_format($value->created_at, 'd.m.Y')?> <?=MSmarty::date_format($value->created_at, '%H:%M')?>
                    </td>
                    <td><?=CHtml::encode($value->name)?> <? if ($value->user != NULL) : ?> (<?=Yii::t('app', 'Логин пользователя')?>: <?=CHtml::encode($value->user->username)?>)<? endif; ?></td>
                    <? if ((bool)$isRatio) : ?>
                        <td>
                            <? if ($value->rating > 0) : ?>
                                <?=sprintf('%.1f', $value->rating)?>
                            <? endif; ?>
                        </td>
                    <? endif ; ?>
                    <td><?=$value->comment_text?></td>
                    <td></td>
                </tr>
            <? endforeach; ?>
        <? endif; ?>
    </tbody>
</table>