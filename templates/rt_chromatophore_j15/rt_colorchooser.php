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
?>
<div id="color-chooser">
	<div class="wrapper">
		
		<form action="">
			<div id="color-selection">
				<select id="color-select"><option>Empty</option></select>
				<select id="overlay-select"><option>Empty</option></select>
				<dl>
					<dt>Primary Color:</dt>
					<dd><input type="text" class="color" name="prim_bg" id="prim_bg" /></dd>
					<dt>Primary Text:</dt>
					<dd><input type="text" class="color" name="prim_fg" id="prim_fg" /></dd>
					<dt>Secondary Color:</dt>
					<dd><input type="text" class="color" name="sec_bg" id="sec_bg" /></dd>
					<dt>Secondary Text:</dt>
					<dd><input type="text" class="color" name="sec_fg" id="sec_fg" /></dd>
					<dt>Tertiary Color:</dt>
					<dd><input type="text" class="color" name="ter_bg" id="ter_bg" /></dd>
					<dt>Tertiary Text:</dt>
					<dd><input type="text" class="color" name="ter_fg" id="ter_fg" /></dd>
				</dl>
			</div>
			<div id="color-picker">
				<h6>Color Picker</h6>
				<div id="rainbow"></div>
			</div>
			<div id="preview">
				<h6>Preview</h6>
				<div id="primary-bg" class="primary-bg">
					<div id="secondary-bg-1" class="secondary-bg"></div>
					<div id="secondary-bg-2" class="secondary-bg"></div>
					<div id="secondary-bg-3" class="secondary-bg"></div>
					<div id="tertiary-bg-1" class="tertiary-bg"></div>
					<div id="image-overlay" class="png"></div>
					<div id="primary-fg-1" class="primary-fg">
						<b>Features</b><b>Typography</b><b>Tutorials</b>
					</div>
					<div id="primary-fg-2" class="primary-fg">
						<b>Module Title</b>
					</div>
					<div id="secondary-fg-1" class="secondary-fg">
						<b>Home</b>
					</div>
					<div id="secondary-fg-2" class="secondary-fg">
						<b>Module Title</b><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut non turpis a nisi pretium rutrum. Nullam congue, lectus a aliquam pretium, sem urna tempus justo, malesuada consequat nunc diam vel justo. In faucibus elit at purus. Suspendisse dapibus lorem. Curabitur luctus mauris.</p>
					</div>
					<div id="secondary-fg-3" class="secondary-fg">
						<b>Module Title</b>
					</div>
					<div id="tertiary-fg-1" class="tertiary-fg">
						<b>Module Title</b>
					</div>
					
				</div>
			</div>
			<div id="instructions">
			<h6>Instructions</h6>
			<p>Select a predefined style from the drop-down or choose your own colors via the handy mooRainbow based color-chooser.  When you are satisfied with your selection, click the "Apply Colors" button below to store your selection in a cookie.</p>
			<span id="apply-colors">Apply Colors</span>
				
			</div>
			<div class="clr"></div>
		</form>
		
		
	</div>
</div>
