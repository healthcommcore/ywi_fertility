<?php
/**
 * Main Plugin File
 * Does all the magic!
 *
 * @package     Sourcerer
 * @version     2.7.0
 *
 * @author      Peter van Westen <peter@nonumber.nl>
 * @link        http://www.nonumber.nl
 * @copyright   Copyright (C) 2010 NoNumber! All Rights Reserved
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport( 'joomla.event.plugin' );

/**
* Button Plugin that places a Sourcerer code block into the text
*/
class plgButtonSourcerer extends JPlugin
{
	/**
	* Constructor
	*
	* For php4 compatability we must not use the __constructor as a constructor for
	* plugins because func_get_args ( void ) returns a copy of all passed arguments
	* NOT references. This causes problems with cross-referencing necessary for the
	* observer design pattern.
	*/
	function plgButtonSourcerer( &$subject, $config )
	{
		jimport( 'joomla.filesystem.file' );

		// return if system plugin is not installed
		if ( !is_file( JPATH_PLUGINS.DS.'system'.DS.'sourcerer.php' ) ) {
			return;
		}

		// return if NoNumber! Elemets plugin is not installed
		if ( !JFile::exists( JPATH_PLUGINS.DS.'system'.DS.'nonumberelements.php' ) ) {
			return;
		}

		parent::__construct( $subject, $config );

		// load the admin language file
		$this->loadLanguage( 'plg_'.$config['type'].'_'.$config['name'], JPATH_ADMINISTRATOR );

		// Include the Helper
		require_once JPATH_PLUGINS.DS.$config['type'].DS.$config['name'].DS.'helper.php';
		$class = get_class( $this ).'Helper';
		$this->helper = new $class( $config );
	}

	/**
	* Display the button
	*
	* @return array A two element array of ( imageName, textToInsert )
	*/
	function onDisplay( $name )
	{
		if ( isset( $this->helper ) ) {
			return $this->helper->render( $name );
		}
	}
}