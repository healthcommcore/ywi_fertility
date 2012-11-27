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
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );

	$live_site        			= $mainframe->getCfg('live_site');
	$template_path 				= $this->baseurl . '/templates/' .  $this->template;
	
	$default_style 				= $this->params->get("defaultStyle", "none");
	$enable_colorchooser        = ($this->params->get("enableColorChooser", 1)  == 0)?"false":"true";
	$enable_ie6warn             = ($this->params->get("enableIe6warn", 1)  == 0)?"false":"true";
	$font_family                = $this->params->get("fontFamily", "helvetica");
	$template_width 			= $this->params->get("templateWidth", "962");
	$leftcolumn_width			= $this->params->get("leftcolumnWidth", "220");
	$rightcolumn_width			= $this->params->get("rightcolumnWidth", "220");
	$splitmenu_col				= $this->params->get("splitmenuCol", "rightcol");
	$menu_name 					= $this->params->get("menuName", "mainmenu");
	$menu_type 					= $this->params->get("menuType", "moomenu");
	$default_font 				= $this->params->get("defaultFont", "default");
	$show_breadcrumbs 			= ($this->params->get("showBreadcrumbs", 1)  == 0)?"false":"true";
	$show_moduleslider			= ($this->params->get("showModuleslider", 1)  == 0)?"false":"true";


	
	// moomenu options
	$moo_bgiframe     			= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
	$moo_delay       			= $this->params->get("moo_delay", "500");
	$moo_duration    			= $this->params->get("moo_duration", "700");
	$moo_fps          			= $this->params->get("moo_fps", "300");
	$moo_transition   			= $this->params->get("moo_transition", "Back.easeOut");	

	// rokzoom options
	$enable_rokzoom   			= ($this->params->get("enableRokzoom", 1)  == 0)?"false":"true";
	$zoom_resize_duration     	= $this->params->get("zoom_resize_duration", "700");
	$zoom_opacity_duration     	= $this->params->get("zoom_opacity_duration", "500");
	$zoom_transition   			  = $this->params->get("zoom_transition", "Cubic.easeOut");

	// module title for moduleslider

	$max_mods_per_row			= $this->params->get("maxModsPerRow", 3);
	$ms_title1					= $this->params->get("msTitle1", "Group 1 Tab");	
	$ms_title2					= $this->params->get("msTitle2", "Group 2 Tab");	
	$ms_title3					= $this->params->get("msTitle3", "Group 3 Tab");	
	$ms_title4					= $this->params->get("msTitle4", "Group 4 Tab");	
	$ms_title5					= $this->params->get("msTitle5", "Group 5 Tab");		
	$ms_module1					= $this->params->get("msModule1", "advert1");		
	$ms_module2					= $this->params->get("msModule2", "advert2");			
	$ms_module3					= $this->params->get("msModule3", "advert3");			
	$ms_module4					= $this->params->get("msModule4", "advert4");			
	$ms_module5					= $this->params->get("msModule5", "advert5");
	
	
	require(YOURBASEPATH . DS . "rt_styleloader.php");
								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<jdoc:include type="head" />
		<?php
		require(YOURBASEPATH . DS . "rt_tabmodules.php");
		require(YOURBASEPATH . DS . "rt_utils.php");
	    require(YOURBASEPATH . DS . "rt_head_includes.php");		
	    ?>
        
<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22247290-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>        
	</head>
	<body id="ff-<?php echo $fontfamily; ?>" class="<?php echo $fontstyle; ?> <?php echo $style_overlay; ?> latch">
		<div id="page-bg">
			<!--begin top panel
			<div id="top-bar">
				<?php if ($enable_colorchooser=="true") :?>
				<?php require(YOURBASEPATH . "/rt_colorchooser.php"); ?>
				<?php endif; ?>
				<div id="mod-login">
					<div class="wrapper">
						<?php if ($enable_colorchooser=="true") :?>
						<a href="#" id="color-toggle"><span>Color Chooser</span></a>
						<?php endif; ?>
						<jdoc:include type="modules" name="top" style="xhtml" />
						<div class="clr"></div>
					</div>
				</div>
			</div>
			end top panel-->
			<!--begin main wrapper-->
			<div id="mainbody" class="wrapper">
				<!--begin header-->
				<div id="header">
					<a href="<?php echo $this->baseurl . '/index.php/home'; ?>" class="nounder"><img src="<?php echo $template_path; ?>/images/blank.gif" border="0" alt="" id="logo" class="png" /></a>
					<?php if ($this->countModules('banner')) : ?>
					<div id="banner">
						<jdoc:include type="modules" name="banner" style="xhtml" />
					</div>
					<?php endif; ?>
				</div>
				<!--end header-->
				<!--<div id="main-shadow">
					<div id="main-shadow2">
						<div class="side-shadow1">
							<div class="side-shadow2">-->
								<!--<div id="iefix">
									div id="horiz-menu" class="<?php echo $mtype; ?>">
										<?php if($mtype != "module") : ?>
											<?php echo $topnav; ?>
										<?php else: ?>
											<jdoc:include type="modules" name="toolbar" style="none" />
										<?php endif; ?>	
									</div>
								</div>-->
                                		<?php if ($this->countModules('splash_space')) : ?>
											<div id="splash_space" class="splash_space">
												<jdoc:include type="modules" name="splash_space" style="rounded" />
											</div>
										<?php endif; ?>
										<?php if ($this->countModules('middle')) : ?>
											<div id="middle" class="middle">
												<jdoc:include type="modules" name="middle" style="rounded" />
											</div>
										<?php endif; ?>
										
                                        <?php if ($this->countModules('provider')) : ?>
                                            <div id="provider" class="provider">
                                                <jdoc:include type="modules" name="provider" style="rounded" />
                                            </div>
                                        <?php endif; ?>
                                        <div class="clr">
                                        </div>
                                        <!--begin main content-->
										<div id="maincontent">
											<!--begin leftcolumn-->
												<?php if ($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")) : ?>
                                                	<div class="leftcol">	
															<?php if($subnav and $splitmenu_col=="leftcol") : ?>
                                                                <div id="sub-menu">
                                                                    <?php echo $subnav; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <jdoc:include type="modules" name="left" style="rounded" />
                                                     
                                                   </div>   
                                                    
												<?php endif; ?>
												<!--end leftcolumn-->
												
												<!--begin maincolumn-->
												<div class="maincol">
															<div class="padding">
																<?php if ($show_moduleslider=="true" and ($this->countModules('advert1') or $this->countModules('advert2') 
															or $this->countModules('advert3') or $this->countModules('advert4') or $this->countModules('advert5'))) : ?>
																	<div id="moduleslider-size">
																		<?php displayTabs($this); ?>
																	</div>
																<?php endif; ?>
																<?php if ($this->countModules('user1') or $this->countModules('user2') or $this->countModules('user3')) : ?>
																	<div id="mainmodules1" class="spacer<?php echo $mainmod1_width; ?>">
																		<?php if ($this->countModules('user1')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user1" style="rounded" />
																			</div>
																		<?php endif; ?>
																		<?php if ($this->countModules('user2')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user2" style="rounded" />
																			</div>
																		<?php endif; ?>
																		<?php if ($this->countModules('user3')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user3" style="rounded" />
																			</div>
																		<?php endif; ?>
																	</div>
																<?php endif; ?>
																<div id="content-padding">
																	<?php if ($show_breadcrumbs == "true") : ?>
																		<div id="pathway">
																			<jdoc:include type="module" name="breadcrumbs" style="none" />
																		</div>
																	<?php endif; ?>
																	<jdoc:include type="message" />
																	<jdoc:include type="component" />
																</div>
																<?php if ($this->countModules('user4') or $this->countModules('user5') or $this->countModules('user6')) : ?>
																	<div id="mainmodules2" class="spacer<?php echo $mainmod2_width; ?>">
																		<?php if ($this->countModules('user4')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user4" style="rounded" />
																			</div>
																		<?php endif; ?>
																		<?php if ($this->countModules('user5')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user5" style="rounded" />
																			</div>
																		<?php endif; ?>
																		<?php if ($this->countModules('user6')) : ?>
																			<div class="block">
																				<jdoc:include type="modules" name="user6" style="rounded" />
																			</div>
																		<?php endif; ?>
																	</div>
																<?php endif; ?>
															</div>
													
													</div>
                                                    </div>
                                                    <div style="clear:right;">
                                                    </div>
                                                    <?php if ($this->countModules('credit')) : ?>
														<div class="credit">
															<jdoc:include type="modules" name="credit" style="rounded" />
														</div>
													<?php endif; ?>
                                                    
												<!--end maincolumn-->
                                                
												<!-- begin rightcolumn -->
												<?php if ($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) : ?>
													<div class="rightcol">
														<div class="padding">
															<?php if($subnav and $splitmenu_col=="rightcol") : ?>
																<div id="sub-menu">
																	<?php echo $subnav; ?>
																</div>
															<?php endif; ?>
															<jdoc:include type="modules" name="right" style="rounded" />
														</div>
													</div>
												<?php endif; ?>
												<!-- end rightcolumn -->
												
                                        <!-- end main content -->     
										</div>
										
								
							<!--</div>
						</div>
					</div>-->
				</div>
				<!--begin bottom section-->
				<?php if ($this->countModules('user7') or $this->countModules('user8') or $this->countModules('user9') or $this->countModules('user10')) : ?>
				<div id="bottom">
					<div id="bottom-shadow1">
						<div id="bottom-shadow2">
							<div class="padding">
								<div id="bottommodules" class="spacer<?php echo $bottommod_width; ?>">
									<?php if ($this->countModules('user7')) : ?>
										<div class="block">
											<jdoc:include type="modules" name="user7" style="rounded" />
										</div>
									<?php endif; ?>
									<?php if ($this->countModules('user8')) : ?>
										<div class="block">
											<jdoc:include type="modules" name="user8" style="rounded" />
										</div>
									<?php endif; ?>
									<?php if ($this->countModules('user9')) : ?>
										<div class="block">
											<jdoc:include type="modules" name="user9" style="rounded" />
										</div>
									<?php endif; ?>
									<?php if ($this->countModules('user10')) : ?>
										<div class="block">
											<jdoc:include type="modules" name="user10" style="rounded" />
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<!--<div align="center"><a href="http://www.rockettheme.com/" title="RocketTheme Joomla Template Club" class="nounder"><img src="<?php echo $template_path; ?>/images/blank.gif" alt="RocketTheme Joomla Templates" id="rocket" class="png" /></a></div>-->
				<!--end bottom section-->
			</div>
			<!--end main wrapper-->
		</div>
	</body>
</html>