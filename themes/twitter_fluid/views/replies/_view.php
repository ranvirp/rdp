<div class="comment" id="c<?php echo $data->id; ?>">

	

	<div class="author">
		<?php echo $data->author->name; ?> says 
		
	</div>

	<div class="time">
		
		<?php echo date('F j, Y \a\t h:i a',$data->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br(CHtml::encode($data->content)); ?>
	</div>

</div><!-- comment -->