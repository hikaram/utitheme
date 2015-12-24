<link rel="stylesheet" href="<?=Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('register.css')); ?>/css/style.css" type="text/css" media="screen, projection" />
<div class="register_step2">
    <?=CHtml::beginForm()?>
        <? if ($free) : ?>
            <div class="free_register">
                <div class="center"><?=Yii::t('app', 'Бесплатная регистрация')?></div>
                <div class="free_checkbox"><?=CHtml::checkBox('matrix[0]', false, array('id' => 'matrix_0', 'class' => 'checkboxes', 'onChange' => 'checkboxesmanage(this, 0)'))?>&nbsp;&nbsp;Выбрать</div>
            </div>
        <? endif; ?>
        <? foreach ($matrix_list as $key => $value) : ?>
            <div class="pay_register">
                <div class="center"><? if ($value->alias != 'matrix_1') : ?><?=$value->lang->name?><? endif; ?></div>
				<? if ($value->alias == 'matrix_1') : ?>
					<div class="matrix_description" style="margin-top: 0; font-size: 15px;"><?=Yii::t('app', 'Покупка книги "Рецепты ортодоксальной медицины" (дополнительно: участие в матрице 1)')?></div>
				<? else : ?>
					<div class="matrix_description"><?=$value->lang->description?></div>
				<? endif; ?>
                <div class="pay_checkbox"><?=CHtml::checkBox('matrix[' . $value->alias . ']', false, array('id' => 'matrix_' . $value->alias, 'class' => 'checkboxes', 'onChange' => 'checkboxesmanage(this, "' . $value->alias . '")'))?>&nbsp;&nbsp;Выбрать</div>
            </div>
        <? endforeach; ?>
        <br /><br />
        <?=CHtml::submitButton(Yii::t('app', 'Перейти к оплате'), array('name' => 'btn_pay', 'id' => 'pay_button', 'class' => 'btn200', 'style' => 'display: none;'));?>
        <?=CHtml::submitButton(Yii::t('app', 'Завершить регистрацию'), array('name' => 'btn_free', 'id' => 'free_button', 'class' => 'btn250', 'style' => 'display: none;'));?>
    <?=CHtml::endForm()?>
</div>