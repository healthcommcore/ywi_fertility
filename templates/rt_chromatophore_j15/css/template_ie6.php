<?php header("Content-type: text/css"); ?>
<?php
$template_path = dirname( dirname( $_SERVER['SCRIPT_NAME'] ) );
?>

/** IE6 is a hunk of crap!!! due to limitations in the CSS capabilities of IE, these hacks are required **/

/* font tweaking for optima/lucida font */
#ff-optima h1,#ff-optima h2,#ff-optima h3,#ff-optima h4,#ff-optima h5,#ff-optima h6,
#ff-lucida h1,#ff-lucida h2,#ff-lucida h3,#ff-lucida h4,#ff-lucida h5,#ff-lucida h6 {
	letter-spacing: -0.07em;
}

body#ff-optima ,
body#ff-lucida {
	letter-spacing: -0.03em;
}

body#ff-georgia,
body#ff-georgia.f-default {
	font-size: 15px;
}

/** end **/

#page-bg {
	position: relative;
	z-index:0;
	zoom: 1;
}

#main-body {
	position: relative;
}

#color-chooser .wrapper {
	position: static;
}

#color-chooser #color-toggle {
	display: block;
	position: absolute;
	top: 0;
	outline: none;
}


body #page-bg .module div div div,
body #page-bg .module-hilite1 div div div,
body #page-bg .module-hilite2 div div div,
body #page-bg .module-hilite3 div div div,
body #page-bg .module-hilite4 div div div,
body #page-bg .module-hilite5 div div div {
	zoom: 1;
}

/* login fixes */

#sl_vert {
	zoom: 1;
	margin-bottom: -20px;
}

#sl_username, #sl_pass {
	padding-bottom: 0px;
}

#sl_submitbutton {
	top: 32px;
	right: 20px;
}

/* rokslide fixes */
#rokslide-wrapper {
	display: inline-block;
	text-align: center;
}

#rokslide-wrapper del {
	display: inline-block;
}

ul#rokslide-toolbar {
  display: table;
  padding: 0;
}

#rokslide-toolbar li {
	float: left;
}

#rokslide-toolbar li span {
	float: left;
}

.spacer.w99 .block {
	width: 99.99%;
}

.spacer.w49 .block {
	width: 49.99%;
}

.spacer.w33 .block {
	width: 33%;
}

.spacer.w24 .block {
	width: 24.9%;
}

#frame .mmpr-2 .module {
   width: 46%;
}

#frame .mmpr-3 .module {
   width: 30%;
}

#tabmodules div div div {
	height: 1%;
}

#rokslide-toolbar span {
	padding: 0 15px;
}

/* ie6 warning */

#iewarn {
	background: #C6D3DA url(../images/error.png) 10px 20px no-repeat;
	position: relative;
	z-index: 1;
	opacity: 0;
	margin: -150px auto 0;
	font-size: 110%;
	color: #001D29;
}

#iewarn div {
	position: relative;
	border-top: 5px solid #95B8C9;
	border-bottom: 5px solid #95B8C9;
	padding: 10px 80px 10px 220px;	
}

#iewarn h4 {
	color: #900;
	font-weight: bold;
	line-height: 120%;
}

#iewarn a {
	color: #296AC6;
	font-weight: bold;
}

#iewarn_close {
	background: url(../images/close.png) 50% 50% no-repeat;
	display: block;
	cursor: pointer;
	position: absolute;
	width: 61px;
	height: 21px;
	top: 25px;
	right: 12px;
}

#iewarn_close.cHover {
	background: url(../images/close_hover.png) 50% 50% no-repeat;
}

/* end ie6 warning */


/* remove overlays */

#main-shadow ,#main-shadow2,.side-shadow1,.side-shadow2,#bottom-shadow1,#bottom-shadow2 {
	background-image: none;
}

#main-content,td.maincol,#main-content2,#maincol2,#bottom {
	background-image: none;
}

body #page-bg .module, 
body #page-bg .module-hilite1, 
body #page-bg .module-hilite2, 
body #page-bg .module-hilite3, 
body #page-bg .module-hilite4, 
body #page-bg .module-hilite5 {
	background-image: none;
}


body #page-bg .module h3,
body #page-bg .module-hilite1 h3,
body #page-bg .module-hilite2 h3,
body #page-bg .module-hilite3 h3,
body #page-bg .module-hilite4 h3,
body #page-bg .module-hilite5 h3 {
	background-image: none;
}

body #page-bg .module div,
body #page-bg .module-hilite1 div,
body #page-bg .module-hilite2 div,
body #page-bg .module-hilite3 div,
body #page-bg .module-hilite4 div,
body #page-bg .module-hilite5 div {
	background-image: none;
}

body #page-bg .module div div,
body #page-bg .module-hilite1 div div,
body #page-bg .module-hilite2 div div,
body #page-bg .module-hilite3 div div,
body #page-bg .module-hilite4 div div,
body #page-bg .module-hilite5 div div {
	background-image: none;
}

body #page-bg .module div div div,
body #page-bg .module-hilite1 div div div,
body #page-bg .module-hilite2 div div div,
body #page-bg .module-hilite3 div div div,
body #page-bg .module-hilite4 div div div,
body #page-bg .module-hilite5 div div div {
	background-image: none;
}

body.latch #page-bg {
	background: none;
}

/* transparent fixes */

#iefix, #maincontent {
	position: relative;
}

#iefix {
	z-index:2;
}

#maincontent {
	z-index: 1;
}

a {
	position:relative;
}

#horiz-menu {
	position: static;
   	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/horiz-menu-bg.png', sizingMethod='scale');
   	background-image: none;
	z-index:2;
}

#horiz-menu li.active a {
   	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/horiz-menu-active.png', sizingMethod='scale');
   	background-image: none;
	cursor: pointer;
}

#horiz-menu li.sfHover a {
   	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/horiz-menu-hover.png', sizingMethod='scale');
   	background-image: none;
	cursor: pointer;
}

#horiz-menu li.sfHover li a {
	filter: none;
}


#horiz-menu li li, 
#horiz-menu li:hover li,
#horiz-menu li.sfHover li,
#horiz-menu li.parent:hover li,
#horiz-menu li.parent.sfHover li,
#horiz-menu li.active.parent:hover li,
#horiz-menu li.active.parent.sfHover li {
   	background-image: none;
}

#horiz-menu li li.parent a.daddy,
#horiz-menu li.active li.parent a.daddy,
#horiz-menu li li.parent:hover a.daddy,
#horiz-menu li.active li.parent:hover a.daddy,
#horiz-menu li li.parent-sfHover a.daddy,
#horiz-menu li.active li.parent-sfHover a.daddy {
	background-image: none;
}

a.readon {
   	background-image: none;
}

td.leftcol .module h3,
td.leftcol .module-hilite1 h3,
td.leftcol .module-hilite2 h3,
td.leftcol .module-hilite3 h3,
td.leftcol .module-hilite4 h3,
td.leftcol .module-hilite5 h3,
td.rightcol .module h3,
td.rightcol .module-hilite1 h3,
td.rightcol .module-hilite2 h3,
td.rightcol .module-hilite3 h3,
td.rightcol .module-hilite4 h3,
td.rightcol .module-hilite5 h3,
#mainmodules1 .module h3,
#mainmodules1 .module-hilite1 h3,
#mainmodules1 .module-hilite2 h3,
#mainmodules1 .module-hilite3 h3,
#mainmodules1 .module-hilite4 h3,
#mainmodules1 .module-hilite5 h3,
#mainmodules2 .module h3,
#mainmodules2 .module-hilite1 h3,
#mainmodules2 .module-hilite2 h3,
#mainmodules2 .module-hilite3 h3,
#mainmodules2 .module-hilite4 h3,
#mainmodules2 .module-hilite5 h3,
#bottommodules .module h3,
#bottommodules .module-hilite1 h3,
#bottommodules .module-hilite2 h3,
#bottommodules .module-hilite3 h3,
#bottommodules .module-hilite4 h3  {
   	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/module-h3.png', sizingMethod='scale');
   	background-image: none;
}

#rokslide-toolbar {
   	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/tabber-inactive.png', sizingMethod='scale');
   	background-image: none;	
}

#rokslide-toolbar li.current,
#rokslide-toolbar li.last.current {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/tabber-active.png', sizingMethod='scale');
   	background-image: none;
}

#rokslide-toolbar span {
	position: relative;
}

#bottom {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/bottom-bg.png', sizingMethod='scale');
   	background-image: none;
	zoom: 1;
	position: relative;
}

#bottom-modules {
	position: static;
}

pre,
blockquote {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/blockquote-bg.png', sizingMethod='scale');
   	background-image: none;
	width: 100%;
	zoom: 1;
}

/*a.mainlevel,
span.pathway img {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/path-arrow-ie.png', sizingMethod='crop');
	background-image: none;
	zoom: 1;
}*/

ul.bullet-1 li {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/path-arrow.png', sizingMethod='crop');
   	background-image: none;
	zoom: 1;
}

ul.bullet-2 li {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/bullet-2.png', sizingMethod='crop');
   	background-image: none;
	zoom: 1;
}

ul.bullet-3 li {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/bullet-3.png', sizingMethod='crop');
   	background-image: none;
	zoom: 1;
}

ul.bullet-4 li {
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/bullet-4.png', sizingMethod='crop');
   	background-image: none;
	zoom: 1;
}

/*
   NEW PURE CSS PNG FIX SOLUTION  
   use class="png" to implement 
*/

html .png,
div .png, .png {
	azimuth: expression(
		this.pngSet?this.pngSet=true:(this.nodeName == "IMG" && this.src.toLowerCase().indexOf('.png')>-1?(this.runtimeStyle.backgroundImage = "none",
		this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.src + "', sizingMethod='image')",
		this.src = "../images/blank.png"):(this.origBg = this.origBg? this.origBg :this.currentStyle.backgroundImage.toString().replace('url("','').replace('")',''),
		this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.origBg + "', sizingMethod='crop')",
		this.runtimeStyle.backgroundImage = "none")),this.pngSet=true
	);
}

/* page peel overrides for demo site */
a.fliptip {
	display: block;
	z-index: 100000;
	position: relative;
}

#frame a { 
   position: static;
}

.middle{height:10px;}
.provider{height:63px;}
.module-credit{padding-right:30px;}
.module-breadcrumb{margin-left:46px;}
.module-women{margin-left:570px;}
/*.module-women img{behavior:url(iepngfix.htc);}*/
.homequote{width:140px;}
.module_newmenu ul, .module_provider-resourcesmenu ul{list-style-image:none;}
.module_provider-resourcesmenu{margin-left:3px; margin-top:-10px;}
.module_provider-resourcesmenu li a{padding-top:10px; padding-bottom:5px;}
ul{margin:-10px 0 0 40px; list-style-image:url(../images/iebullet.gif);}
#maincontent{position:fixed;}
.module-breadcrumb .pathway img{background:url(../images/iearrow.gif) 2px 3px no-repeat;}





