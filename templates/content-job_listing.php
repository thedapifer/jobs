<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>


<?php /*<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">*/ :?
	<article id="post-<?php the_ID(); ?>" <?php post_class( "card cb-blog-style-a cb-module-e cb-separated clearfix" ); ?> <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
	
            <div class="cb-mask cb-img-fw" <?php cb_img_bg_color( $cb_post_id ); ?>>
                <?php /*cb_thumbnail( '260', '170' ); */?>
				<?php the_company_logo(); ?>
            </div> <!-- .cb-mask-->

 <div class="cb-meta clearfix">

                <h2 class="cb-post-title"><a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a></h2>

                <?php cb_byline( $cb_post_id ); ?>

                <div class="cb-excerpt">
	 			<div class="company">
				<?php the_company_name( '<strong>', '</strong> ' ); ?>
				<?php the_company_tagline( '<span class="tagline">', '</span>' ); ?>
			</div> <!-- .company -->
	 </div> <!-- .cb-excerpt -->
	 		<div class="location">
			<?php the_job_location( false ); ?>
		</div> <!-- .location -->
	 
	 			<?php do_action( 'job_listing_meta_start' ); ?>

			<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
				<?php $types = wpjm_get_the_job_types(); ?>
				<?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
					<li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>"><?php echo esc_html( $type->name ); ?></li>
				<?php endforeach; endif; ?>
			<?php } ?>

			<li class="date"><?php the_job_publish_date(); ?></li>

			<?php do_action( 'job_listing_meta_end' ); ?>
		</ul>
                
                <?php/* cb_post_meta( $cb_post_id ); */?>

            </div> <!-- .cb-meta -->
</article> <!-- card -->
