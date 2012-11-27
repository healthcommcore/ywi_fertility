<?php
/**
 * Plugin Helper File
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

/**
* Plugin that places the Button
*/
class plgButtonSourcererHelper
{
	function plgButtonSourcererHelper( &$config )
	{
		// Load plugin parameters
		require_once JPATH_PLUGINS.DS.'system'.DS.'nonumberelements'.DS.'helpers'.DS.'parameters.php';
		$parameters =& NNePparameters::getParameters();
		$this->params = $parameters->getParams( $config['params'], JPATH_PLUGINS.DS.$config['type'].DS.$config['name'].'.xml' );
	}

	/**
	* Display the button
	*
	* @return array A two element array of ( imageName, textToInsert )
	*/
	function render( $name )
	{
		$mainframe =& JFactory::getApplication();

		$button = new JObject();

		if ( $mainframe->isSite() ) {
			$enable_frontend = $this->params->enable_frontend;
			if ( !$enable_frontend ) {
				return $button;
			}
		}

		JHTML::_( 'behavior.modal' );

		$document =& JFactory::getDocument();

		$button_style = 'sourcerer';
		if ( !$this->params->button_icon ) {
			$button_style = 'blank blank_sourcerer';
		}
		$document->addStyleSheet( JURI::root( true ).'/plugins/editors-xtd/sourcerer/css/style.css' );

		$link = 'index.php?nn_qp=1'
			.'&folder=plugins.editors-xtd.sourcerer'
			.'&file=sourcerer.inc.php'
			.'&name='.$name;

		$button->set( 'modal', true );
		$button->set( 'link', $link );
		$button->set( 'text', JText::_( $this->params->button_text ) );
		$button->set( 'name', $button_style );
		$button->set( 'options', "{handler: 'iframe', size: {x:window.getSize().scrollSize.x-100, y: window.getSize().size.y-100}}" );

		return $button;
	}
}