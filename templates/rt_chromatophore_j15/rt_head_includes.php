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
// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template

?>
<link href='http://fonts.googleapis.com/css?family=Nobile:regular,bold' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?php echo $template_path; ?>/images/favicon.ico" />
<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
<link href="<?php echo $template_path; ?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<link href="<?php echo $template_path; ?>/css/template_css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $template_path; ?>/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="<?php echo $template_path; ?>/css/template_colors.php?theme=<?php echo urlencode($theme); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $template_path; ?>/css/colorchooser.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $template_path; ?>/css/mooRainbow.css" rel="stylesheet" type="text/css" />
<?php if($show_moduleslider=="true") :?>
<link href="<?php echo $template_path; ?>/css/rokslidestrip.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<?php if($enable_rokzoom=="true") :?>
<link href="<?php echo $template_path; ?>/rokzoom/rokzoom.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<style type="text/css">
	div.wrapper { <?php echo $template_width; ?>padding:0;}
	td.leftcol { width:<?php echo $leftcolumn_width; ?>px;padding:0;}
	td.rightcol { width:<?php echo $rightcolumn_width; ?>px;padding:0;}
</style>	
<?php if (rok_isIe7()) :?>
<!--[if IE 7]>
<link href="<?php echo $template_path; ?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe6()) :?>
<!--[if lte IE 6]>
<link href="<?php echo $template_path; ?>/css/template_ie6.php" rel="stylesheet" type="text/css" />
<![endif]-->
<?php endif; ?>
<script type="text/javascript">
	window.templatePath = '<?php echo $template_path; ?>';
	window.currentTheme = '<?php echo $tstyle; ?>';
</script>
<?php if ($enable_colorchooser=="true") :?>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/roktoppanel.js"></script>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/mooRainbow.js"></script>  
<?php endif; ?>
<?php if($show_moduleslider=="true") :?>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/rokslidestrip.js"></script>
<?php endif; ?>
<?php if($enable_rokzoom=="true") :?>
<script type="text/javascript" src="<?php echo $template_path; ?>/rokzoom/rokzoom.js"></script>
<?php endif; ?>
<?php if($enable_ie6warn=="true") : ?>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/rokie6warn.js"></script>
<?php endif; ?>
<?php if($mtype=="moomenu") :?>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/rokmoomenu.js"></script>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/mootools.bgiframe.js"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
	new Rokmoomenu($E('ul.menutop '), {
		bgiframe: <?php echo $moo_bgiframe; ?>,
		delay: <?php echo $moo_delay; ?>,
		animate: {
			props: ['height'],
			opts: {
				duration:<?php echo $moo_duration; ?>,
				fps: <?php echo $moo_fps; ?>,
				transition: Fx.Transitions.<?php echo $moo_transition; ?>
			}
		}
	});
});
</script>
<?php endif; ?>	
<?php if($mtype=="suckerfish" or $mtype=="splitmenu") :
	echo "<!--[if IE] -->\n";
	echo "<script type=\"text/javascript\" src=\"" . $template_path . "/js/ie_suckerfish.js\"></script>\n";		
	echo "<!-- <![endif] -->\n";
endif; ?>	
<?php if($enable_rokzoom=="true") :?>
<script type="text/javascript">
	window.addEvent('load', function() {
		RokZoom.init({
			imageDir: '<?php echo $template_path; ?>/rokzoom/images/',
			resizeFX: {
				duration: 700,
				transition: Fx.Transitions.Cubic.easeOut,
				wait: true
			},
			opacityFX: {
				duration: 500,
				wait: false	
			}
		});
	});
</script>
<?php endif; ?>