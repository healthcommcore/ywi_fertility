<?php header("Content-type: text/css"); ?>
<?php
$path = dirname( dirname( $_SERVER['SCRIPT_NAME'] ) );

if (isset($_REQUEST['theme'])) {
	
	$theme = explode(",",urldecode($_REQUEST['theme']));
	$style_overlay 			= $theme[0];
	$style_primary_color 	= $theme[1];
	$style_primary_text 	= $theme[2];
	$style_secondary_color	= $theme[3];
	$style_secondary_text 	= $theme[4];
	$style_tertiary_color 	= $theme[5];
	$style_tertiary_text 	= $theme[6];
}
?>

#tabmodules .module h3 {
	color: <?php echo $style_primary_color; ?>;
}

/* Preview Colors */

#color-chooser .primary-bg {
	background-color: <?php echo $style_primary_color; ?>;
}

#color-chooser .primary-fg {
	color: <?php echo $style_primary_text; ?>;
}

#color-chooser .secondary-bg {
	background-color: <?php echo $style_secondary_color; ?>;
}

#color-chooser .secondary-fg {
	color: <?php echo $style_secondary_text; ?>;
}

#color-chooser .tertiary-bg {
	background-color: <?php echo $style_tertiary_color; ?>;
}

#color-chooser .tertiary-fg {
	color: <?php echo $style_tertiary_text; ?>;
}

/* Primary Color */

body,
#horiz-menu,
#horiz-menu ul ul {
	background-color: <?php echo $style_primary_color; ?>;
}

/* Secondary Color */

#horiz-menu li.active a,
td.leftcol .module h3,
td.rightcol .module h3,
#mainmodules1 .module h3,
#mainmodules2 .module h3,
#bottommodules .module h3 {
	background-color: <?php echo $style_secondary_color; ?>;
}

/* Tertiary Color */
/** see Module Hilite4 Color **/

/* Main Body Text Color */

body {
	color: #333;
}

/* Link Color */

a,
#banner a,
#main-content a {
	color: <?php echo $style_tertiary_color; ?>;
}

/* Bottom Module Text Color */

#bottom,
#bottom a {
	color: #fff;
}

#bottommodules .module-clean h3 {
	color: <?php echo $style_primary_text; ?>;
}

/* Default Module Header Text Color */

.module h3,
#bottommodules .module h3 {
	color: <?php echo $style_secondary_text; ?>;
}

/* Hilite1 Module Header Text Color */

.module-hilite1 h3 {
	color: <?php echo $style_primary_text; ?>;
}

/* Hilite2 Module Header Text Color */

.module-hilite2 h3 {
	color: #fff;
}

/* Hilite3 Module Header Text Color */

.module-hilite3 h3 {
	color: #fff;
}

/* Hilite4 Module Header Text Color */

.module-hilite4 h3 {
	color: <?php echo $style_tertiary_text; ?>;
}

/* Hilite5 Module Header Text Color */

.module-hilite5,
.module-hilite5 h3 {
	color: <?php echo $style_secondary_text; ?>;
}

/* Module Background Color */

ul.menu,
td.leftcol .module-clean,
td.rightcol .module-clean,
td.leftcol .module,
td.leftcol .module-hilite1,
td.leftcol .module-hilite2,
td.leftcol .module-hilite3,
td.leftcol .module-hilite4,
td.rightcol .module,
td.rightcol .module-hilite1,
td.rightcol .module-hilite2,
td.rightcol .module-hilite3,
td.rightcol .module-hilite4 {
	background-color: #fff;
}

/* Menu Text Colors */

#horiz-menu a,
#horiz-menu li.active li a {
	color: <?php echo $style_primary_text; ?>;
}

#horiz-menu li.active a {
	color: <?php echo $style_secondary_text; ?>;
}

#horiz-menu a:hover,
#horiz-menu li.active a:hover {
	color: #eee;
}

/*a#active_menu.sublevel,
a.mainlevel:hover,
a.sublevel:hover,
ul.menu li.active a.daddy,
ul.menu li a:hover,
ul.menu li.active a:hover {
	color: #000;*/
}

/* Typography Heading Colors */

h4,
.contentheading,
.componentheading {
	color: <?php echo $style_primary_color; ?>;
}

h2 {
	color: <?php echo $style_secondary_color; ?>;
}

h4 {
	color: <?php echo $style_tertiary_color; ?>;
}

/* Side Columns Background Color */

#main-content {
	/*background-color: #f2f2f2;*/
}

/* Main Column Background Color */

td.maincol {
	background-color: #fff;
}

/* Module Hilite1 Color */

td.leftcol .module-hilite1 h3,
td.rightcol .module-hilite1 h3,
#mainmodules1 .module-hilite1 h3,
#mainmodules2 .module-hilite1 h3,
#bottommodules .module-hilite1 h3 {
	background-color: <?php echo $style_primary_color; ?>;
}

/* Module Hilite2 Color */

td.leftcol .module-hilite2 h3,
td.rightcol .module-hilite2 h3,
#mainmodules1 .module-hilite2 h3,
#mainmodules2 .module-hilite2 h3,
#bottommodules .module-hilite2 h3 {
	background-color: #DEDEDE;
	color: #444 !important;
}

/* Module Hilite3 Color */

td.leftcol .module-hilite3 h3,
td.rightcol .module-hilite3 h3,
#mainmodules1 .module-hilite3 h3,
#mainmodules2 .module-hilite3 h3,
#bottommodules .module-hilite3 h3 {
	background-color: #939392;
}

/* Module Hilite4 Color */

td.leftcol .module-hilite4 h3,
td.rightcol .module-hilite4 h3,
#mainmodules1 .module-hilite4 h3,
#mainmodules2 .module-hilite4 h3,
#bottommodules .module-hilite4 h3 {
	background-color: <?php echo $style_tertiary_color; ?>;
}

/* Module Hilite 5 Color */

td.leftcol .module-hilite5,
td.rightcol .module-hilite5,
#mainmodules1 .module-hilite5,
#mainmodules2 .module-hilite5,
td.leftcol .module-hilite5 h3,
td.rightcol .module-hilite5 h3,
#mainmodules1 .module-hilite5 h3,
#mainmodules2 .module-hilite5 h3 {
	background-color: <?php echo $style_secondary_color; ?>;
}

/* RokSlide Module Colors */

#moduleslider-size,
#rokslide-toolbar,
#rokslide-toolbar li.current,
#rokslide-toolbar li.last.current {
	background-color: #f2f2f2;
}

#rokslide-toolbar li {
	border-right: 1px solid #ccc;
}

/* Borders */

#mainmodules1 .module,
#mainmodules1 .module-hilite1,
#mainmodules1 .module-hilite2,
#mainmodules1 .module-hilite3,
#mainmodules1 .module-hilite4,
#mainmodules1 .module-hilite5,
#mainmodules1 .module-clean,
#mainmodules2 .module,
#mainmodules2 .module-hilite1,
#mainmodules2 .module-hilite2,
#mainmodules2 .module-hilite3,
#mainmodules2 .module-hilite4,
#mainmodules2 .module-hilite5,
#mainmodules2 .module-clean {
	border: 1px solid #E3E4E3;
}

td.maincol {
	/*border-left: 1px solid #E3E4E3;
	border-right: 1px solid #E3E4E3;*/
}

a.mainlevel,
tr.sectiontableentry1 td,
tr.sectiontableentry2 td,
td.sectiontableentry1,
td.sectiontableentry2,
.sectiontableheader {
	border-bottom: 1px solid #E3E4E3;
}