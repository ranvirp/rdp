
<div class="comment" id="c<?php echo $reply->id; ?>">

	
	<div class="author">
		<?php 
		if ($reply->author!=null)
		echo $reply->author->username; 
		?> says:
	</div>

	<div class="time">
		<?php
 echo date('F j, Y \a\t h:i a',$reply->create_time);
 ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($reply->content)); ?>
		<?php echo Files::model()->showAttachments($reply);?>
	</div>

</div><!-- comment -->