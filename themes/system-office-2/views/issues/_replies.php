<?php
$x=array();
$i=1;
foreach ($replies as $reply) {
$x['Reply #'.$i]=$this->renderPartial('_reply',array('reply'=>$reply),true);
$i++;
}
$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>$x,
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>