<?php

/** 	Helper class for theme and web app managment.

  @author:  Christian Salazar  https://github.com/christiansalazar  christiansalazarh@gmail.com  @bluyell
 */
class WebApp
{

	public static function accountPanel()
	{
		$menues = self::topMenuItems();
		$ht = "<ul id='top-menu-items'>";
		$last="";
		$n=0;
		foreach($menues as $m){
			if($n == (count($menues)-1))
				$last = "class='last'";
			$item = "<a href='".$m['url']."'><span>".$m['label']."</span></a>";
			$ht .= "<li ".$last.">".$item."</li>";
			$n++;
		}
		$ht .= "</ul>";
		return $ht;
		/*
		
		a more simplified way to do the same:
		
		if (Yii::app()->user->isGuest)
		{
			return CHtml::link("Account Login", array('site/login'));
		}
		else
		{
			$name = Yii::app()->user->name;
			return "<ul><li>Welcome <span class='loginname'>{$name}</span></li><li>" . CHtml::link("Exit", array('site/logout')) . "</li></ul>";
		}
		*/
	}

	/**
	 *  returns the base path for theme resources
	 */
	public static function getThemeUrl()
	{
		// Use Yii::app()->theme->baseUrl instead of building string by hand
		// Use getThemeUrl() for building references to css stuff
		// @author: Donald Heering (donald.heering@gmail.com)
		return Yii::app()->theme->baseUrl;
	}

	public static function getThemePath()
	{
		// Use Yii::app()->theme->basePath instead of building string by hand
		// Use getThemePath() for themeSources that will be published as assets
		// @author: Donald Heering (donald.heering@gmail.com)
		return Yii::app()->theme->basePath;
	}

	/** creates a script path relative to theme folder
	  @example:
	  <?php echo WebApp::useScript('print.css',"media='print'"); ?>
	  will output:
	  <link rel='stylesheet' type='text/css' href='themes/system-office-1/css/print.css' media='print' />
	 */
	public static function useScript($filename, $extra = "")
	{
		$path = self::getThemeUrl() . "/css/" . $filename;

		// determine file extension
		$extension = strrev(substr(strrev(trim($filename)), 0, 3));

		if ($extension == 'css') // stands for CSs
			return "<link rel='stylesheet' type='text/css' href='{$path}' {$extra} />\n";
		if ($extension == '.js')
			return "<script src='{$path}' {$extra} ></script>\n";

		return "\n<!-- error in file reference for: {$filename} , extension: {$extension}-->\n";
	}

	public static function getLogo()
	{
		return CHtml::image(self::getLogoFileName());
	}

	public static function getLogoFileName()
	{
		return self::getThemeUrl() . "/css/logo.png";
	}

	public static function getSlogan()
	{
		return "";
	}

	public static function getMbMenu($controllerInstance)
	{
		$controllerInstance->widget('application.extensions.mbmenu.MbMenu'
			, array(
			'themeSources' => self::getThemePath(). "/extras/mbmenu-sources/",
			'iconpack' => self::getThemeUrl() . "/generic-icon-pack-16x16.png",
			'items' => self::getMenuItems()
			)
		);
	}

	/** return the menu items for the main menu.

	  at this point you can filter wich items should be shown to final user, depending on it user level.
	 */
	public static function getMenuItems()
	{

		/*
		  // as an example, if user is not admin or whatever, return this specific menu:
		  // you can now perform menu filtering
		  //
		  if(...any condition..){
		  return array(
		  array('label'=>'Another page', 'url'=>array('/site/index')),
		  );
		  }
		  else
		  ...another menu...



		  HOW ICON WORKS ?
		  ----------------

		  Please note:
		  array('label'=>'Home', 'url'=>array('/site/index'),'icon'=>'-377px -234px'),

		  and take a deep look at:
		  'icon'=>'-377px -234px'

		  the 'icon' attribute, if present, define the icon position on a global file
		  predefined when you setup your MBMenu,  this is most like stablished on WebApp.php::getMbMenu
		  in this method (getMbMenu) you point your mbmenu component to graphic file (jpg, gpf, png)
		  containing a lot of icons (the iconpack)

		  next, with this in mind, open the main iconpack file using your preferred image editor
		  and get the icon position for your preferred icon:

		  take care of:

		  if your icon is at 321px in X, and in 283px in Y, then you must specify this coordinates
		  for your icon using negative values:  'icon'=>'-321px -283px'
		 */

		return
			array(
				array(
					'label' => 'Home',
					'url' => array('/site/index'),
					'icon' => '-377px -234px',
				),
				array('label' => 'System Setup', 'icon' => '-101px -487px', 'url' => array('#', 'view' => 'system'),
					'items' => array(
						array('label' => 'Designation Types', 'url' => Yii::app()->createUrl('designation_types')),
						array('label' => 'Designations', 'url' => Yii::app()->createUrl('designation')),
						array('label' => 'Districts', 'url' => Yii::app()->createUrl('district')),
						array('label' => 'Schemes', 'url' => Yii::app()->createUrl('schemes')),
						//array('label' => 'Dev Blocks', 'url' => Yii::app()->createUrl('devblocks')),
							
						),
					),
				
				array('label' => 'Operations', 'icon' => '-72px -359px', 'url' => array('/site/page', 'view' => 'operations'),
					'items' => array(
						array('label' => 'Issues', 'url' => Yii::app()->createUrl('issues')),
						array('label' => 'Instructions', 'url' => Yii::app()->createUrl('instructions')),
						array('label' => 'Milestones', 'url' => Yii::app()->createUrl('milestones')),
					),
				),
				array('label' => 'About', 'icon' => '-377px -202px', 'url' => array('/site/page', 'view' => 'about')),
				array('label' => 'Contact', 'icon' => '-266px -455px', 'url' => array('/site/contact')),
		);
	}

	public static function getBannerFilename($themeRelativeBannerFileName)
	{
		return self::getThemeUrl() . "/css/" . $themeRelativeBannerFileName;
	}

	public static function displayBanner($fullBannerPath)
	{
		return
			"<script>
	$('#main-banner').css('background-image',\"url(\'" . $fullBannerPath . "\')\");
	$('#main-banner').show();
</script>";
	}

	
	
		public static function topMenuItems(){
			if(Yii::app()->user->isGuest){
				return array(
					array('label'=>'Acceder','url'=>'index.php?r=site/login'),
					array('label'=>'Registrarse','url'=>'#'),
					array('label'=>'Contactanos','url'=>'#'),
					array('label'=>'Inicio','url'=>'index.php?r=site/index'),
				);
			}
			else{
				return array(
					array('label'=>'Salir','url'=>'index.php?r=site/logout'),
					array('label'=>'Contactanos','url'=>'#'),
					array('label'=>'Inicio','url'=>'index.php?r=site/index'),
				);
			}
		}	
	
		public static function footer(){
?>
	<div id='footer' >
		<div id='footer-inner'>
			<div class='footer-left'>
				<?php
					$ar = self::getMenuItems();
					foreach($ar as $menu){
						echo "<div class='foot-menu-entry'><ul class='footer-menu-ul'>";
						echo "<li class='li-head'><a href='".$menu['url']."'>".$menu['label']."</a></li>";
						if(isset($menu['items'])){
							echo "<ul class='sublista'>";
							foreach($menu['items'] as $submenu){
								echo "<li><a href='".$submenu['url']."'>".$submenu['label']."</a></li>";
							}
							echo "</ul>";
						}
						echo "</ul></div>";
					}
				?>
			</div>
		</div>
	</div>
	<div id='sub-footer' >
		<div id='footer-inner'>
			<div class='footer-left'>
				<img src='themes/yii-theme/css/yii-la--bottom.png' />
			</div>
			<div class='footer-right'>
				La comunidad de <b>Yii Framework en Español</b> construye y mantiene este sitio con el esfuerzo
				de todos los hispanohablantes, bajo el soporte de: <a href='http://www.yiiframework.com'>Yii Framework</a>.
			</div>
		</div>
	</div>
<?php
			}
	
}

?>