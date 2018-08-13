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

	<div class="title-block wrapper">
      <?php the_title( '<h2 class="page-title block block-3-wide">', '</h2>' ); ?>
    </div>

	<div class="entry-content">
		<?php if( have_rows('project_item') ): ?>
			<ul>
				<?php $i = 0; ?>
			    <?php while( have_rows('project_item') ): the_row(); ?>
				    <?php 
				    $i++;
				    $i = sprintf("%1$02d", $i);
					// $posts = get_field('project_item');
					// if( $posts ): 
					?>
						<ul class="projects">
						<?php //foreach( $posts as $p ):?>
						    <li class="project">
					            <div class="wrapper">
					              <div class="project-content block-3-wide">
					                <div class="proj-number-block">
					                  <div class="proj-number"><?php echo $i; ?></div>
					                  <div class="slanted-divider"></div>
					                </div>
					                <div class="proj-title-block">
					                  <h3 class="proj-title"><?php the_sub_field('title'); ?></h3>
					                </div>
					                <div class="proj-tools-block">
					                  <ul>
					                    <?php if( have_rows('tools', $p->ID) ): ?>
										    <?php while( have_rows('tools', $p->ID) ): the_row(); ?>
										 
										        <li><?php the_sub_field('tool_title', $p->ID); ?></li>
										        
										    <?php endwhile; ?>
										 
										<?php endif; ?>
					                  </ul>
					                </div>
					                <div class="proj-year-block">
					                  <div class="proj-year"><?php the_sub_field('year'); ?></div>
					                </div>
					                <div class="cta-block">
					                  <div class="cta-btns">
					                    <a href="<?php the_sub_field('project_link'); ?>" class="cta-btn priority">View Project</a>
					                  </div>
					                </div>
					              </div>
					            </div>
					          </li>
						<?php //endforeach; ?>
						</ul>
					<?php //endif; ?>
			    <?php endwhile; ?>
			</ul>
		<?php endif; ?>

		
			
	</div><!-- .entry-content -->


</article><!-- #post-## -->
