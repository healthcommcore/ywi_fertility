<?php
/**
 * Popup page
 * Displays the Sourcerer Code Helper
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

$class = new plgButtonSourcererPopup();
$params = $class->getPluginParamValues( 'sourcerer', 'editors-xtd' );

$mainframe =& JFactory::getApplication();
if ( $mainframe->isSite() ) {
	$user =& JFactory::getUser();
	if ( $user->get( 'guest' ) ) {
		die( 'Restricted access' );
	}

	if ( !$params->enable_frontend ) {
		die( 'Restricted access' );
	}
}

$class->render( $params );

class plgButtonSourcererPopup
{
	function getPluginParamValues( $name, $type = 'system' ) {
		jimport( 'joomla.plugin.plugin' );

		$plugin = JPluginHelper::getPlugin( $type, $name );
		require_once JPATH_PLUGINS.DS.'system'.DS.'nonumberelements'.DS.'helpers'.DS.'parameters.php';
		$parameters =& NNePparameters::getParameters();
		return $parameters->getParams( $plugin->params, JPATH_PLUGINS.DS.$type.DS.$name.'.xml' );
	}

	function render( &$params )
	{
		jimport( 'joomla.filesystem.file' );

		$mainframe =& JFactory::getApplication();

		$system_params = $this->getPluginParamValues( 'sourcerer' );

		// Load plugin language
		$lang =& JFactory::getLanguage();
		$lang->load( 'plg_editors-xtd_sourcerer', JPATH_ADMINISTRATOR );
		$language = 'en';
		foreach ( $lang->getLocale() as $locale ) {
			if ( JFile::exists( JPATH_PLUGINS.DS.'editors-xtd'.DS.'sourcerer'.DS.'editarea'.DS.'langs'.DS.$locale.'.js' ) ) {
				$language = $locale;
				break;
			}
		}

		// Add scripts and styles
		JHTML::_('behavior.mootools');

		require_once JPATH_PLUGINS.DS.'system'.DS.'nonumberelements'.DS.'helpers'.DS.'functions.php';
		$this->functions =& NNFunctions::getFunctions();
		$mt_version = $this->functions->getJSVersion();

		$document =& JFactory::getDocument();
		$document->addScript( JURI::root( true ).'/plugins/editors-xtd/sourcerer/editarea/edit_area_full.js' );
		$document->addScript( JURI::root( true ).'/plugins/editors-xtd/sourcerer/js/script'.$mt_version.'.js' );

		$script = "
			editAreaLoader.init({
				id: 'source',	// id of the textarea to transform
				start_highlight: true,	// if start with highlight
				allow_resize: 'y',
				allow_toggle: false,
				word_wrap: true,
				language: '".$language."',
				syntax: 'php',
				toolbar: 'fullscreen, |, undo, redo, |, select_font, |, syntax_selection, |, highlight, reset_highlight, word_wrap',
				syntax_selection_allow: 'css,html,js,php'
			});

			var sourcerer_syntax_word = '".$system_params->syntax_word."';
			var sourcerer_editorname = '".JRequest::getCmd( 'name', 'text' )."';
			var sourcerer_default_addsourcetags = '".$params->addsourcetags."';
			var sourcerer_root = '".JURI::root( true )."';

			window.addEvent( 'domready', function() { sourcerer_init(); });
		";
		$document->addScriptDeclaration( $script );
		$document->addStyleSheet( JURI::root( true ).'/plugins/system/nonumberelements/css/popup.css' );
		$document->addStyleSheet( JURI::root( true ).'/plugins/editors-xtd/sourcerer/css/popup.css' );

		$params->code = '';
		if ( $params->use_example_code == 1 || ( $mainframe->isAdmin() && $params->use_example_code == 2 ) ) {
			$params->code = $params->example_code;
		}

		echo $this->getHTML( $params );
	}

	function getHTML( &$params )
	{
		global $mainframe;

		JHTML::_( 'behavior.tooltip' );

		ob_start();
	?>
	<div style="margin: 0 10px;">
		<form action="index.php" id="sourceForm" method="post">
			<fieldset><legend style="display:none;"></legend>
				<div style="float: left">
					<h1><?php echo JText::_( 'SRC_SOURCERER_CODE_HELPER' ); ?></h1>
				</div>
				<div style="float: right; text-align: right;">
					<div class="button2-left"><div class="blank hasicon apply">
						<a rel="" onclick="sourcerer_insertText();window.parent.document.getElementById('sbox-window').close();" href="javascript://" title="<?php echo JText::_('SRC_INSERT') ?>"><?php echo JText::_('SRC_INSERT') ?></a>
					</div></div>
					<div class="button2-left"><div class="blank hasicon cancel">
						<a rel="" onclick="if ( confirm( '<?php echo JText::_( 'SRC_ARE_YOU_SURE' ); ?>' ) ) { window.parent.document.getElementById('sbox-window').close(); }" href="javascript://" title="<?php echo JText::_('Cancel') ?>"><?php echo JText::_('Cancel') ?></a>
					</div></div>
				</div>
			</fieldset>

			<p><?php echo JText::_( 'SRC_TEXTAREA_DESC' ); ?></p>
			<textarea id="source" class="source" name="source" cols="" rows=""><?php echo $params->code ?></textarea>

			<fieldset><legend style="display:none;"></legend>
				<div style="float: right; text-align: right;">
					<div class="bar-option">
						<input type="checkbox" name="keepindent" id="keepindent" class="checkbox" value="1"<?php if ( $params->keepindent ) { echo ' checked="checked"'; } ?> />
							<label class="hasTip" title="<?php echo JText::_( 'SRC_PRESERVE_INDENTATION' ).'::'.JText::_( 'SRC_PRESERVE_INDENTATION_DESC' ); ?>">
								<?php echo JText::_( 'SRC_PRESERVE_INDENTATION' ) ?>
							</label>
					</div>
					<div class="bar-option">
						<input type="checkbox" name="keepcolors" id="keepcolors" class="checkbox" value="1"<?php if ( $params->keepcolors ) { echo ' checked="checked"'; } ?> />
							<label class="hasTip" title="<?php echo JText::_( 'SRC_PRESERVE_COLORS' ).'::'.JText::_( 'SRC_PRESERVE_COLORS_DESC' ); ?>">
								<?php echo JText::_( 'SRC_PRESERVE_COLORS' ) ?>
							</label>
					</div>
					<div class="button2-left"><div class="blank hasicon apply">
						<a rel="" onclick="sourcerer_insertText();window.parent.document.getElementById('sbox-window').close();" href="javascript://" title="<?php echo JText::_('SRC_INSERT') ?>"><?php echo JText::_('SRC_INSERT') ?></a>
					</div></div>
					<div class="button2-left"><div class="blank hasicon cancel">
						<a rel="" onclick="if ( confirm( '<?php echo JText::_( 'SRC_ARE_YOU_SURE' ); ?>' ) ) { window.parent.document.getElementById('sbox-window').close(); }" href="javascript://" title="<?php echo JText::_('Cancel') ?>"><?php echo JText::_('Cancel') ?></a>
					</div></div>
				</div>

				<div class="button2-left"><div class="blank">
					<label class="hasTip" title="<?php echo JText::_( 'SRC_TOGGLE_EDITOR' ).'::'.JText::_( 'SRC_TOGGLE_EDITOR_DESC' ); ?>">
						<a rel="" onclick="eAL.toggle( 'source' );return false;" href="javascript://;"><?php echo JText::_( 'SRC_TOGGLE_EDITOR' ) ?></a>
					</label>
				</div></div>
				<div class="button2-left"><div class="blank hasicon sourcetags_0" id="sourcetags_button">
					<label class="hasTip" title="<?php echo JText::_( 'SRC_TOGGLE_SOURCE_TAGS' ).'::'.JText::_( 'SRC_TOGGLE_SOURCE_TAGS_DESC' ); ?>">
						<a rel="" onclick="sourcerer_toggleSourceTags();return false;" href="javascript://;"><?php echo JText::_( 'SRC_TOGGLE_SOURCE_TAGS' ) ?></a>
					</label>
				</div></div>
				<div class="button2-left"><div class="blank hasicon tagstyle_0" id="tagstyle_button">
					<label class="hasTip" title="<?php echo JText::_( 'SRC_TOGGLE_TAG_STYLE' ).'::'.JText::_( 'SRC_TOGGLE_TAG_STYLE_DESC' ); ?>">
						<a rel="" onclick="sourcerer_toggleTagStyle();return false;" href="javascript://;"><?php echo JText::_( 'SRC_TOGGLE_TAG_STYLE' ) ?></a>
					</label>
				</div></div>

			</fieldset>
		</form>
	</div>
	<?php
			if ( $mainframe->isAdmin() ) {
				$user = JFactory::getUser();
				if ( $user->usertype == 'Super Administrator' ) {
					$db =& JFactory::getDBO();
					$query = "
						SELECT id
						FROM #__plugins
						WHERE folder = 'editors-xtd'
						AND element = 'sourcerer'
						LIMIT 1";
					$db->setQuery( $query );
					$pluginid = $db->loadResult();
					if ( $pluginid ) {
						echo '<em>'.JText::_( 'SRC_SEE_THE_PLUGIN_FOR_SETTINGS' ).' (<a href="'.JURI::base( true ).'/index.php?option=com_plugins&view=plugin&client=site&task=edit&cid[]='.$pluginid.'" target="_blank">'.JText::_( 'SRC_EDITOR_BUTTON' ).'</a>)</em>';
					}
				}
			}
			$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
}