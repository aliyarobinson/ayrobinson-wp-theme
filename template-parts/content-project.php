<?php



/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aliya_Y._Robinson
 *
 */

?>



<div class="content-wrapper wrapper single-project">
	<nav>
	  <a href="<?php echo SITEROOT; ?>/projects" class="btn back">Back</a>
	</nav>
	<div class="block-2-wide block image-show">
	  <img src="<?php the_field('image'); ?>" alt="project responsive image">
	</div>
	<div class="block-2-wide block details">
	  <div class="detail-block summary">
	  	<?php the_field('project_description'); ?>
	  </div>
	  <div class="detail-block role">
	    <h3 class="detail-block-title">Role</h3>
	    <ul class="detail-list">
	    <?php

			$values = get_field('role');
			if($values)
			{
				foreach($values as $value)
				{
					echo '<li>' . $value . '</li>';
				}
			}

		?>
	    </ul>
	  </div>
	  <div class="detail-block tools">
	    <h3 class="detail-block-title">Tools &amp; Highlights</h3>
	    <ul class="detail-list">
	      <?php if( have_rows('tools') ): ?>
			 
			    <?php while( have_rows('tools') ): the_row(); ?>
			 
			        <li><?php the_sub_field('tool'); ?></li>
			        
			    <?php endwhile; ?>
			 
			<?php endif; ?>
	    </ul>
	  </div>
	  <div class="detail-block cta-block">

	  	<?php

			$slink = get_field('site_link');
			if($slink)
			{
				echo '<a href="'. $slink .'" class="btn cta" target="_blank">View Site</a>';
			}

			$clink = get_field('code_link');
			if($clink)
			{
				echo '<a href="'. $clink .'" class="btn cta" target="_blank">View Code</a>';
			}

			$dlink = get_field('design_link');
			if($clink)
			{
				echo '<a href="'. $dlink .'" class="btn cta" target="_blank">View Design</a>';
			}

		?>
	  </div>
	</div>
</div>

