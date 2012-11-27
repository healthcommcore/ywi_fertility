<?php
/**
* Author: Dioscouri Design - www.dioscouri.com
* @package Hider
* @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

// Import library dependencies
jimport( 'joomla.plugin.plugin' );

/**
 * Hider Content Plugin
 *
 * @package		Hider
 * @subpackage	Content
 * @since 		1.5
 */
class plgContentHider extends JPlugin
{

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param object $subject The object to observe
	 * @param object $params  The object that holds the plugin parameters
	 * @since 1.5
	 */
	function plgContentHider( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _getParameter( $name, $default='' ) {
		$return = "";
		$return = $this->params->get( $name, $default );

		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _reg( &$matches ) {

		$user = JFactory::getUser();
		$return = '';
						
		if ($user->id) { $return = $matches[1]; }

		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _pub( &$matches ) {

		$user = JFactory::getUser();
		$return = $matches[1];
						
		if ($user->id) { $return = ''; }

		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _author( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
		
		$return = $matches[1];
			
		if ($usergid != '19')
		{
			$return = '';
		}
		
		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _editor( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
		
		$return = $matches[1];
			
		if ($usergid != '20')
		{
			$return = '';
		}
		
						
		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _publisher( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
		
		$return = $matches[1];
			
		if ($usergid != '21')
		{
			$return = '';
		}
		
		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _manager( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
				
		$return = $matches[1];
			
		if ($usergid != '23')
		{
			$return = '';
		}
		
		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _admin( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
				
		$return = $matches[1];
		
		
		if ($usergid != '24')
		{
			$return = '';
		}
		
		return $return;
	}

	/**
	 * Gets a parameter value
	 *
	 * @access public
	 * @return mixed Parameter value
	 * @since 1.5
	 */
	function _super( &$matches ) {

		$user = JFactory::getUser();
		$usertype = $user->get('usertype');
		$usergid = $user->get('gid');
		
		$return = $matches[1];
			
		if ($usergid != '25')
		{
			$return = '';
		}
		
		return $return;
	}

			
	/**
	 * Example prepare content method
	 *
	 * Method is called by the view
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 */
	function onPrepareContent( &$article, &$params, $limitstart ) {
		$success = true;
				
		// define the regular expression
		$regex1 = "#{reg}(.*?){/reg}#s";
		$regex2 = "#{pub}(.*?){/pub}#s";
	
		$regex3 = "#{author}(.*?){/author}#s";
		$regex4 = "#{editor}(.*?){/editor}#s";
		$regex5 = "#{publisher}(.*?){/publisher}#s";
		$regex6 = "#{manager}(.*?){/manager}#s";
		$regex7 = "#{admin}(.*?){/admin}#s";
		$regex8 = "#{super}(.*?){/super}#s";
		
		$regex9 = "#\{19}(.*?){/19}#s";
		$regex10 = "#\{20}(.*?){/20}#s";
		$regex11 = "#\{21}(.*?){/21}#s";
		$regex12 = "#\{23}(.*?){/23}#s";
		$regex13 = "#\{24}(.*?){/24}#s";
		$regex14 = "#\{25}(.*?){/25}#s";

		// perform the replacement for _reg
		$article->text = preg_replace_callback( $regex1, array('plgContentHider', '_reg'), $article->text );
		// perform the replacement for _pub
		$article->text = preg_replace_callback( $regex2, array('plgContentHider', '_pub'), $article->text );

		// perform the replacement for groups by name
		$article->text = preg_replace_callback( $regex3, array('plgContentHider', '_author'), $article->text );
		$article->text = preg_replace_callback( $regex4, array('plgContentHider', '_editor'), $article->text );
		$article->text = preg_replace_callback( $regex5, array('plgContentHider', '_publisher'), $article->text );
		$article->text = preg_replace_callback( $regex6, array('plgContentHider', '_manager'), $article->text );
		$article->text = preg_replace_callback( $regex7, array('plgContentHider', '_admin'), $article->text );
		$article->text = preg_replace_callback( $regex8, array('plgContentHider', '_super'), $article->text );

		// perform the replacement for groups by gid
		$article->text = preg_replace_callback( $regex9, array('plgContentHider', '_author'), $article->text );
		$article->text = preg_replace_callback( $regex10, array('plgContentHider', '_editor'), $article->text );
		$article->text = preg_replace_callback( $regex11, array('plgContentHider', '_publisher'), $article->text );
		$article->text = preg_replace_callback( $regex12, array('plgContentHider', '_manager'), $article->text );
		$article->text = preg_replace_callback( $regex13, array('plgContentHider', '_admin'), $article->text );		
		$article->text = preg_replace_callback( $regex14, array('plgContentHider', '_super'), $article->text );

		return $success;
	}
}