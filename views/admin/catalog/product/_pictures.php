<? if (!empty($pictures)) : ?>
    <table class="table table-bordered table-hover pictures-list">
        <thead>
            <tr role="row" class="heading">
                <th width="15%">
                    <?=Yii::t('app', 'Изображение') ?>
                </th>
                <th>
                    <?=Yii::t('app', 'Главное') ?>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($pictures as $picture) : ?>
                <tr pictureId="<?=$picture->id?>">
                    <td>
                        <a href="<?=MSmarty::attachment_get_file_name($picture->secret_name, $picture->raw_name, $picture->file_ext, '', 'products')?>" class="fancybox-button" data-rel="fancybox-button">
                            <img class="img-responsive" src="<?=MSmarty::attachment_get_file_name($picture->secret_name, $picture->raw_name, $picture->file_ext, '', 'products')?>" alt="">
                        </a>
                    </td>
                    <td>
                        <input type="radio" name="Pictures[main]" value="<?=$picture->id?>" style="margin-left: -10px;" <? if ((bool)$picture->is_main) : ?>checked="checked"<? endif; ?>>
                    </td>
                    <td>
                        <a href="javascript: void(0)" class="btn red btn-sm remove-upload-product" data-productid="<?=$picture->id?>">
                        <i class="fa fa-times"></i> <?=Yii::t('app', 'Удалить')?> </a>
                    </td>
                </tr>            
            <? endforeach; ?>
        </tbody>
    </table>

<? endif; ?>