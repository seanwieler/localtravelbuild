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
			<div class="content-links">
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
				<div class="quote"><?php the_field('quote');?></div>
			</div>
			<?php endif; ?>

			<div><?php echo do_shortcode('[parallax-scroll id="174"]');?></div> <?php

			if(get_field('about_image')): ?>
			<div class="about-bg" style="background-image: url(<?php the_field('about_bg'); ?>"><?php
			$image2 = get_field('about_image');
			$size2 = 'thumbnail'; // (thumbnail, medium, large, full or custom size) ?>
				<div class="about-image"><?php echo wp_get_attachment_image( $image2 , $size2);?></div> 
				<div class="about-name"><h5><?php the_field('about_name');?></h5></div>
				<div class="about-title"><p><?php the_field('about_title');?></p></div>
				<div class="about-text"><?php the_field('about_text');?></div>
				<div class="about-btn"><?php echo do_shortcode('[maxbutton id="5"]');?></div>
			</div>
			<?php endif;

			if(get_field('contact_title')): ?>
			<div class="contact-bg" style="background-image: url(<?php the_field('contact_bg'); ?>">
				<div class="contact-title"><h1><?php the_field('contact_title');?></h1></div>
				<div class="about-btn"><?php echo do_shortcode('[maxbutton id="6"]');?></div>
			</div>
		<?php endif; ?>
			<div class="test"><p>THis is test stuff</p></div>
			
	</main>
	</div> <?php
	endwhile; // End of the loop.

get_sidebar();
get_footer();
?>