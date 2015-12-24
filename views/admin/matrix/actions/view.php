<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3">Действие "<?=CHtml::encode($model->lang->name);?>"</span></h1>
       
        <table class="list" id="actions">
            <tbody>
                <tr>
                    <td width="150">Псевдоним действия:</td>
                    <td width="500"><?=CHtml::encode($model->alias)?></td>
                </tr>
                <tr>
                    <td>Название действия:</td>
                    <td><?=CHtml::encode($model->lang->name)?></td>
                </tr>
                <tr>
                    <td>Описание действия:</td>
                    <td><?=CHtml::encode($model->lang->description)?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <article class="module width_full" style="margin-left: 0;">
            <header><h3>Парамтеры для действия</h3></header>
            
            <table class="list" id="actionparams" style="width: 100%">
                <tbody>
                    <tr class="top-table">
                        <th class="photo" style="width: 30%">Название параметра</th>
                        <th class="photo">Описание параметра</th>
                    </tr>
                    <? if(empty($model->matrix_actions_params)) :?>
                        <tr><td colspan="2">Для действия не задано ни одного параметра</td></tr>
                    <? else : ?>                         
                        <? foreach ($model->matrix_actions_params as $key => $param) : ?>
                            <tr>
                                <td><?=CHtml::encode($param->matrix_param->lang->name)?></td>
                                <td><?=CHtml::encode($param->matrix_param->lang->description)?></td>
                                <td>
                                    
                                </td>
                            </tr>
                        <? endforeach; ?>
                    <? endif; ?>
                </tbody>                    
            </table>
        </article>        
        <br />
        <form action="<?=$this->createUrl('actions/create/action/edit/id/' . $model->id)?>">
            <input type="submit" value="Редактировать действие" class="btn200" />
            <a style="position: relative; left: 40px; top: 7px;" href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('index')?>'">Назад</a>
        </form>
    </div>
</div><!-- .content-inner-->
