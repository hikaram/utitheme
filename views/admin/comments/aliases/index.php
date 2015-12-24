<?php $this->breadcrumbs=array(
    Yii::t('app', 'Панель управления') => array('/admin'),
    Yii::t('app', 'Комментарии') => array('/admin/comments'),
    Yii::t('app', 'Алиасы') => array('index')
);?>
<a href="/admin/comments/aliases/add"><?=Yii::t('app', 'Добавить Алиас')?></a>
<?php include('list.php');