<?php
/**
 * Template Name: Stories Page
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
			if( $image ) { ?>
				<div><?php echo wp_get_attachment_image( $image, $size );?></div><?php
			}?>

			<?php if(get_field('section_1_title')): ?>
			    <div class="decorated black-bg"><span><?php the_field('section_1_title');?></span></div> 
			<?php endif;?>

			<?php if(get_field('section_1_content')): ?>
			    <div class="section-content-blackbg"> <?php echo get_post_meta(get_the_ID(), "section_1_content", true); ?> </div> 
            <?php endif; ?>
            
            <div class="rp-background"> 
            <div class="section-content-whitebg"> <?php the_content(); ?> </div> 

            <?php
			$image2 = get_field('section_2_image');
			$size2 = '50%'; // (thumbnail, medium, large, full or custom size)
			if( $image2 ) {
				echo wp_get_attachment_image( $image2, $size2 );
            } ?>

            <?php if(get_field('section_2_title')): ?>
                <div class="rp-background">
                    <div class="decorated white-bg"><span><?php echo get_post_meta(get_the_ID(), "section_2_title", true);?></span></div>
                    <?php if(get_field('section_2_content')): ?>
                        <div class="section-content-whitebg"> <?php the_field('section_2_content'); ?> </div>
					<?php endif;?>
					<iframe class="map" src="https://www.google.com/maps/d/u/0/embed?mid=1-IHhIMuHL3jRGDUdr7QqSHjTMf36kvtE"></iframe>
					<!--<div id='map'></div>
						<script>
  							mapboxgl.accessToken = 'pk.eyJ1Ijoic2VhbndpZWxlciIsImEiOiJjam16dnUwaDgxc252M3dydTEycGI2cTV0In0.XMvuCJ_JmM9jBu24qQByDg';
							var map = new mapboxgl.Map({
								container: 'map',
    							style: 'mapbox://styles/mapbox/streets-v10'
  							});
						</script>-->

        <?php endif; ?>
			
			<?php if(get_field('section_3_title')): ?>
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