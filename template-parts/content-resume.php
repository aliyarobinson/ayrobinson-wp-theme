<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aliya_Y._Robinson
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrapper resume">
        <div class="wrapper">
          <div class="block block-2-wide skills">
            <h3 class="page-title">Skills:</h3>
            <?php
			if( have_rows('skills') ): ?>
				<ul>
			    <?php while ( have_rows('skills') ) : the_row(); ?>
			        <li class="skill" data-rating="<?php the_sub_field('skill_level'); ?>"><?php the_sub_field('skill_name'); ?></li>
			    <?php endwhile; ?>
			    </ul>
			<?php
			else :
			    // no rows found
			endif;
			?>
          </div>
          <div class="titles block block-3-wide">
            <h3 class="page-title">Professional Experience:</h3>
            <?php
				if( have_rows('experience') ): ?>
            		<ul class="experience">
				   <?php while ( have_rows('experience') ) : the_row(); ?>
				        <li class="experience-mod">
		                <div class="position-title">
		                  <span class="company"><?php the_sub_field('company'); ?></span>/<span class="title-name"><?php the_sub_field('position_title'); ?></span>
		                </div>
		                <div class="date"><?php the_sub_field('start_date'); ?> - <?php the_sub_field('end_date'); ?></div>
		                <div class="position-desc">
		                  <?php the_sub_field('description'); ?>
		                </div>
		              </li>

				   <?php endwhile; ?>
            		</ul>

				<?php 
				else :
				    // no rows found
				endif;
			?>
          </div>
        </div>
        
    </div>


</article><!-- #post-## -->
