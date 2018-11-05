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

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			if(get_field('hero_image')): ?>
				<div class="front-hero" style="background-image: url(<?php the_field('hero_image'); ?>)">
					<div class="hero-txt-bg">
						<div class="hero-title"><h1><?php the_field('hero_title');?></h1></div>
						<div class="hero-text"><p><?php the_field('hero_text');?></p></div>
						<div><?php echo do_shortcode('[maxbutton id="1"]');?></div>
					</div>
				</div>
			<?php endif;

			if(get_field('recent_posts_title')): ?>
			<div class="rp-background">
				<div class="decorated white-bg"><span><?php echo get_post_meta(get_the_ID(), "recent_posts_title", true);?></span></div>
				<div class="rpw-home"><?php echo do_shortcode('[do_widget id=recent-posts-widget-with-thumbnails-2]'); ?></div>
						<div class="button-center"><?php echo do_shortcode('[maxbutton id="2"]');?></div>
			</div> 
			<?php endif;

			if(get_field('section_2_left_image')): ?>
			<div>
				<div class="split-image" style="background-image: url(<?php the_field('section_2_left_image'); ?>)">
					<div class="link-txt-bg">
						<div class="link-title"><h1>travel stories</h1></div>
						<div class="button-center"><?php echo do_shortcode('[maxbutton id="3"]');?></div>
					</div>
				</div>
				<div class="split-image" style="background-image: url(<?php the_field('section_2_right_image'); ?>)">
					<div class="link-txt-bg">
						<div class="link-title"><h1>photography</h1></div>
						<div class="button-center"><?php echo do_shortcode('[maxbutton id="4"]');?></div>
					</div>
				</div>
			</div>
			<?php endif;

			if(get_field('quote_bg_image')): ?>
			<div class="quote-bg" style="background-image: url(<?php the_field('quote_bg_image'); ?>)">
			</div>
			<?php endif; ?>
			
	</main>
	</div> <?php
	endwhile; // End of the loop.

get_sidebar();
get_footer();
?>