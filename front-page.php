<?php
/**
 * Template Name: Front Page
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Blog
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			//$image = get_field('hero_image');
			//$size = '50%'; // (thumbnail, medium, large, full or custom size)
			if(get_field('hero_image')): { ?>
				<div class="front-hero" style="background-image: url(<?php the_field('hero_image'); ?>);">
					<div class="hero-txt-bg">
						<div class="hero-title"><h1><?php the_field('hero_title');?></h1></div>
						<div class="hero-text"><p><?php the_field('hero_text');?></p></div>
					</div>
				</div><?php
			}
			endif;
					
			if(get_field('section_1_title')): ?>
				<div class="decorated black-bg"><span><?php the_field('section_1_title');?></span></div>
			<?php endif;?>

			<?php if(get_field('section_1_content')): ?>
				<div class="section-content-blackbg"> <?php echo get_post_meta(get_the_ID(), "section_1_content", true); ?> </div> 
			<?php endif;
			
			if(get_field('recent_posts_title')): ?>
			<div class="rp-background">
				<div class="decorated white-bg"><span><?php echo get_post_meta(get_the_ID(), "recent_posts_title", true);?></span></div>
				<div class="rpw-home"><?php echo do_shortcode('[do_widget id=recent-posts-widget-with-thumbnails-3]'); ?></div>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</div> 
			<?php endif;?>

			<div class="white-bg"><span><?php echo do_shortcode('[travel_grid country="canada"]');?></span></div><?php

			$image2 = get_field('section_2_image');
			$size2 = '50%'; // (thumbnail, medium, large, full or custom size)
			if( $image2 ) {?>
				<div><?php echo wp_get_attachment_image( $image2, $size2 );?></div><?php
			} ?>

			<?php if(get_field('section_2_title')): ?>
			<div class="decorated black-bg"><span><?php echo get_post_meta(get_the_ID(), "section_2_title", true);?></span></div>
			<?php endif;

			if(get_field('section_2_content')): ?>
				<div class="section-content-blackbg"> <?php the_field('section_2_content'); ?> </div>
			<?php endif;
			
			/*if(is_front_page()) {
				photo_gallery(1);
			}*/

			if(get_field('section_3_title')): ?>
			<div class="rp-background">
				<div class="decorated white-bg"><span><?php echo get_post_meta(get_the_ID(), "section_3_title", true);?></span></div> 
			<?php endif; ?>

			<?php if(get_field('section_3_content')): ?>
				<div class="section-content-whitebg"> <?php echo get_post_meta(get_the_ID(), "section_3_content", true); ?> </div>
			</div> 
			<?php endif;
			
			$image3 = get_field('contact_image');
			$size3 = '50%'; // (thumbnail, medium, large, full or custom size)
			if( $image3 ) {
				echo wp_get_attachment_image( $image3, $size3 );
			}

			if(get_field('contact_title')): ?>
			<div class="decorated black-bg"><span><?php echo get_post_meta(get_the_ID(), "contact_title", true);?></span></div>
			<?php endif;

			if(get_field('contact_content')): ?>
			<div class="section-content-blackbg"> <?php echo get_post_meta(get_the_ID(), "contact_content", true); ?> </div> 
			<?php endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>