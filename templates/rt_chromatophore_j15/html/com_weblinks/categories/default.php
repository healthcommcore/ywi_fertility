<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
<div class="content-width">
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php endif; ?>

<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
<table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<tr>
	<td valign="top" class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->params->get('comp_description');
	?>
	</td>
</tr>
</table>
<?php endif; ?>
<div class="contentpane">
<ul>
<!-- Needed to hard code this link in because it is not a weblink category but needs to display with the rest of the categories -->
<li><a href="<?php echo $this->baseurl . '/index.php/resources/videos-and-tools'; ?>">Videos and tools</a></li>
<?php foreach ( $this->categories as $category ) : ?>
	<li>
		<a href="<?php echo $category->link; ?>" class="category<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
			<?php echo $this->escape($category->title);?></a>
		<!--&nbsp;
		<span class="small">
			(<?php echo $category->numlinks;?> resources)
		</span>-->
	</li>
<?php endforeach; ?>
</ul>
</div>
</div>
