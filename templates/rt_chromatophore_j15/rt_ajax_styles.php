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
define( '_JEXEC', 1 );

	define('DS', DIRECTORY_SEPARATOR);
	define('JPATH_BASE', realpath('../../') );

	require_once( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	require_once( JPATH_BASE .DS.'includes'.DS.'framework.php' );
	
	$mainframe =& JFactory::getApplication('site');
	$mainframe->initialise();


	ob_start(); //debug
	
	if (function_exists('getallheaders')) {
		$headers = getallheaders();
	} else {
		$headers = emu_getallheaders();
	}
	
	if ((isset($headers['X-Requested-With'])  && $headers['X-Requested-With'] == "XMLHttpRequest") or (isset($headers['x-requested-with']) && $headers['x-requested-with'] == "XMLHttpRequest" )) {
		
		$my_session = &JFactory::getSession();
		$payload = $_REQUEST['chromastyle'];
		$my_session->set('chroma-tstyle', $payload);
		
		//print_r ($my_session->get('chroma-tstyle'));  //debug out the style that should be stored in session

		setcookie("chroma-tstyle", $payload, time()+31536000, '/', false);
	} else {
		error_log("Error: Header=" . implode(",",array_keys($headers)));
	}
	//print_r($_SESSION);
	//debug
	$result = ob_get_contents();
	ob_end_clean();
	//error_log ($result);
	
	function emu_getallheaders() {
	   foreach($_SERVER as $name => $value)
	       if(substr($name, 0, 5) == 'HTTP_')
	           $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
	   return $headers;
	}	

?>