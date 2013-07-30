<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<?php echo WebApp::useScript('screen.css',"media='screen, projection'"); ?>
	<?php echo WebApp::useScript('print.css',"media='print'"); ?>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<?php echo WebApp::useScript('main.css'); ?>
	<?php echo WebApp::useScript('form.css'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<?php echo WebApp::getLogo(); ?>
			<?php echo CHtml::encode(Yii::app()->name); ?><br/>
			<span class='slogan'><?php echo WebApp::getSlogan(); ?></span>
		</div>
		<div id='accountpanel'><?php echo WebApp::accountPanel(); ?></div>
	</div><!-- header -->

	<div id="main-mbmenu">
		<?php WebApp::getMbMenu($this); ?>
	</div><!-- mainmenu -->
	
	<div id="main-banner">
	</div>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		<div class='copyright'>
			Copyright &copy; <?php echo date('Y'); ?> by <a href='http://www.mycompany.com'>My Company</a>.
			<br/>All Rights Reserved.
			<br/>Phone #: +555 9998877
		</div>
	</div><!-- footer -->
	
	<div class='yiipowered'><?php echo Yii::powered(); ?></div>
</div><!-- page -->


</body>
</html>