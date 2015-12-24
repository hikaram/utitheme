<div class="content">
    <div class="content-inner">

        <h1><span class="wrapper-3">Действие "<?=CHtml::encode($model->lang->name);?>"</span></h1>
       
        <table class="list" id="news">
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
        <form action="<?=$this->createUrl('fillpriorities/create/action/edit/id/' . $model->id)?>">
            <input type="submit" value="Редактировать приоритет заполнения" class="btn200" />
            <a style="position: relative; left: 40px; top: 7px;" href="javascript:void(0)" onClick="window.location = '<?=$this->createUrl('index')?>'">Назад</a>
        </form>
    </div>
</div><!-- .content-inner-->
