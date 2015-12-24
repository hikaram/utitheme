
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) 
    {
        if ($key == 'error')
        {
            $key = 'danger';
        }
        
        echo <<<EOD
        
        <div class="note note-$key">
            <p>$message</p>
        </div>        

EOD;
    }
    ?>
