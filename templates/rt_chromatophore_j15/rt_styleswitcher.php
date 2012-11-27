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


$cookie_prefix = "chroma-";
$cookie_time = time()+31536000;
$template_properties = array('fontstyle','fontfamily','mtype','tstyle');

foreach ($template_properties as $tprop) {
    $my_session = &JFactory::getSession();
    
    if (isset($_REQUEST[$tprop])) {
	    $$tprop = htmlentities(JRequest::getString($tprop, null, 'get'));
    	$my_session->set($cookie_prefix.$tprop, $$tprop);
    	setcookie ($cookie_prefix. $tprop, $$tprop, $cookie_time, '/', false);    
		global $$tprop; 
    }
}

?>
