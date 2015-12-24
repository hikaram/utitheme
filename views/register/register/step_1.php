<?php echo $this->renderPartial('_form', array('model'=>$model, 
                                                'profile'=>$profile, 
                                                'profilelang'=>$profilelang, 
                                                'list'=>$list,
                                                'steps_array'=>$steps_array,
                                                'form_agree_step'=>$form_agree_step)); ?>