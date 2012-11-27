<?php
/**
 * @package   Chromatophore Template - RocketTheme
 * @version   1.5.4 June 7, 2010
 * @author    RocketTheme, LLC http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Chromatophore Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined( '_JEXEC' ) or die( 'Restricted index access' );

global $Itemid, $modules_list, $tstyle;

// get style and colors

$bundle = explode(":",$tstyle);
//$theme_arr = explode(",", $bundle[1]);

//$theme 				= $bundle[1];
$style_name 		= $bundle[0];
//$style_overlay		= $theme_arr[0];

// menu code
$document	= &JFactory::getDocument();
$renderer	= $document->loadRenderer( 'module' );
$options	 = array( 'style' => "raw" );
$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
$topnav = false; $subnav = false;
if ($mtype=="splitmenu") :
	$module->params	= "menutype=$menu_name\nstartLevel=0\nendLevel=1\nclass_sfx=top";
	$topnav = $renderer->render( $module, $options );
	$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
	$module->params	= "menutype=$menu_name\nstartLevel=1\nendLevel=9\nclass_sfx";
	$options	 = array( 'style' => "submenu");
	$subnav = $renderer->render( $module, $options );
elseif ($mtype=="moomenu" or $mtype=="suckerfish") :
	$module->params	= "menutype=$menu_name\nshowAllChildren=1\nclass_sfx=top";
	$topnav = $renderer->render( $module, $options );

endif;

// make sure subnav is empty
if (strlen($subnav) < 10) $subnav = false;
//Are we in edit mode
$editmode = false;
if (JRequest::getCmd('task') == 'edit' ) :
	$editmode = true;
endif;

$mainmod1_count = ($this->countModules('user1')>0) + ($this->countModules('user2')>0) + ($this->countModules('user3')>0);
$mainmod1_width = $mainmod1_count > 0 ? ' w' . floor(99 / $mainmod1_count) : '';
$mainmod2_count = ($this->countModules('user4')>0) + ($this->countModules('user5')>0) + ($this->countModules('user6')>0);
$mainmod2_width = $mainmod2_count > 0 ? ' w' . floor(99 / $mainmod2_count) : '';
$bottommod_count = ($this->countModules('user7')>0) + ($this->countModules('user8')>0) + ($this->countModules('user9')>0) + ($this->countModules('user10')>0);
$bottommod_width = $bottommod_count > 0 ? ' w' . floor(99 / $bottommod_count) : '';

$leftcolumn_width = ($this->countModules('left')>0 or $subnav) ? $leftcolumn_width : "0";
$rightcolumn_width = ($this->countModules('right')>0 or $subnav) ? $rightcolumn_width : "0";

$template_width = 'margin: 0 auto; width: ' . $template_width . 'px;';

// module slider configuration
$modules_list 				= array(array("title"=>$ms_title1, "module"=>$ms_module1),
									array("title"=>$ms_title2, "module"=>$ms_module2),
									array("title"=>$ms_title3, "module"=>$ms_module3),
									array("title"=>$ms_title4, "module"=>$ms_module4),
									array("title"=>$ms_title5, "module"=>$ms_module5));


function rok_isIe7() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 7')) return true;
	return false;
}

function rok_isIe6() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 6')) return true;
	return false;
}

?>