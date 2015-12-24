<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3">Параметр "<?=CHtml::encode($model->lang->name);?>"</span></h1>
       
        <table class="list" id="news">
            <tbody>
                <tr>
                    <td width="150">Псевдоним параметра:</td>
                    <td width="500"><?=CHtml::encode($model->alias)?></td>
                </tr>
                <tr>
                    <td>Название параметра:</td>
                    <td><?=CHtml::encode($model->lang->name)?></td>
                </tr>
                <tr>
                    <td>Описание параметра:</td>
                    <td><?=CHtml::encode($model->lang->description)?></td>
                </tr>
            </tbody>
        </table>
        <form action="<?=$this->createUrl('params/create/action/edit/id/' . $model->id)?>">
            <input type="submit" value="Редактировать параметр" class="btn200" />
            <a style="position: relative; left: 40px; top: 7px;" href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('index')?>'">Назад</a>
        </form>
    </div>
</div><!-- .content-inner-->
