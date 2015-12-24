<form>
    <table>
        <tr>
            <td width="10"><input type="checkbox" name="site_down" checked="checked" /></td>
            <td>Сайт выключить?</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="backup_files" checked="checked" /></td>
            <td>Резервную копию файлов сделать?</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="backup_db" checked="checked" /></td>
            <td>Резервную копию базы данных сделать?</td>
        </tr>
        <tr>
            <td colspan="2">Комментарий от имени администрации</td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="comment_down" cols="100" >На сайте проводятся профилактические работы. <br/> Пожалуйста зайдите позже. <br /> С уважением, администрация сайта <?=Yii::app()->name?> </textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btnInstall" value="Установить" /></td>
        </tr>
    </table>
</form>
