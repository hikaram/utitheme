<? if (!empty($list)) : ?>
    <ul class="list-unstyled">
        <? foreach ($list as $catalog) : ?>
            <li>
                <label><input type="checkbox" name="product[categories][]" value="<?=$catalog['id']?>" class="categoriesChecked" <? if (array_key_exists($catalog['id'], $catalogProducts)) : ?>checked="checked"<? endif; ?>><?=CHtml::encode($catalog['name'])?></label>
                <?php echo $this->renderPartial('_catalog_selector_1', [
                    'list'  => $catalog['nodes'],
                    'catalogProducts'   => $catalogProducts
                ]); ?>
            </li>
        <? endforeach; ?>
    </ul>
<? endif; ?>