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

// Ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport( 'joomla.plugin.plugin' );

/**
* Plugin that replaces Sourcerer code with its HTML / CSS / JavaScript / PHP equivalent
*/
class plgSystemSourcerer extends JPlugin
{
	/**
	* Constructor
	*
	* For php4 compatability we must not use the __constructor as a constructor for
	* plugins because func_get_args ( void ) returns a copy of all passed arguments
	* NOT references. This causes problems with cross-referencing necessary for the
	* observer design pattern.
	*/
	function plgSystemSourcerer( &$subject, $config )
	{
		// return if disabled via url
		if ( JRequest::getCmd( 'disable_sourcerer' ) ) { return; }

		// return if current page is a joomfishplus page
		if ( JRequest::getCmd( 'option' ) == 'com_joomfishplus' ) { return; }

		$mainframe =& JFactory::getApplication();

		// return if NoNumber! Elemets plugin is not installed
		jimport( 'joomla.filesystem.file' );
		if ( !JFile::exists( JPATH_PLUGINS.DS.'system'.DS.'nonumberelements.php' ) ) {
			if ( $mainframe->isAdmin() && JRequest::getVar( 'option' ) !== 'com_login' ) {
				// load the admin language file
				$this->loadLanguage( 'plg_'.$config['type'].'_'.$config['name'], JPATH_ADMINISTRATOR );
				$mainframe->enqueueMessage( '', 'error' );
				$msg = JText::_( 'SRC_NONUMBER_ELEMENTS_PLUGIN_NOT_INSTALLED' );
				foreach ( $mainframe->_messageQueue as $m ) {
					if ( $m['message'] == $msg ) {
						$msg = '';
						break;
					}
				}
				$mainframe->enqueueMessage( $msg, 'error' );
			}
			return;
		}

		// return if current page is an administrator page (and not acymailing)
		if ( $mainframe->isAdmin() && JRequest::getCmd( 'option' ) != 'com_acymailing' ) { return; }

		parent::__construct( $subject, $config );

		// load the admin language file
		$this->loadLanguage( 'plg_'.$config['type'].'_'.$config['name'] );

		// Include the Helper
		require_once JPATH_PLUGINS.DS.$config['type'].DS.$config['name'].DS.'helper.php';
		$class = get_class( $this ).'Helper';
		$this->helper = new $class( $config );
	}

	function onPrepareContent( &$article, &$params )
	{
		$this->helper->replaceInArticles( $article, $params );
	}

	function onAfterDispatch()
	{
		$this->helper->replaceInComponents();
	}

	function onAfterRender()
	{
		$this->helper->replaceInOtherAreas();
	}
}