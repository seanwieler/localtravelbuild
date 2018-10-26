<?php
/**
 * Template Name: Contact Page
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

			$image = get_field('hero_image');
			$size = '50%'; // (thumbnail, medium, large, full or custom size)
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}?>

			<?php if(get_field('section_1_title')): ?>
			    <div class="decorated black-bg"><span><?php the_field('section_1_title');?></span></div> 
			<?php endif;?>

			<?php if(get_field('section_1_content')): ?>
			    <div class="section-content-blackbg"> <?php echo get_post_meta(get_the_ID(), "section_1_content", true); ?> </div> 
			<?php endif; ?>
			
            <div class="rp-background">
            <?php echo do_shortcode('[contact-form-7 id="304" title="Contact form 1"]'); ?>
            </div>  <?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php

		$output = get_posts(array(
			'post_type' => 'travel_blog'
		));
		error_log(print_r($output, true));

		/*$travel = pods('travel_blog', 568);
		error_log(print_r($travel->display('city'), true));
		error_log("-------------------------------------");
		error_log(print_r($travel->field('city'), true));*/
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>