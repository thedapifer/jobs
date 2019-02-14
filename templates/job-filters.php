<?php
/**
 * Filters in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-filters.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.31.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

wp_enqueue_script( 'wp-job-manager-ajax-filters' );

do_action( 'job_manager_job_filters_before', $atts );
?>


<form class="job_filters">
	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>
	<div class="card job_filters_card bg-dark">
	<div class="card-header"><p class="text-white">Filters</p>
	</div>
	<div class="container search_jobs">
	<div class="row">
		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>

		<div class="search_keywords col-sm-12 col-lg-3">
			<label for="search_keywords" class="sr-only"><?php esc_html_e( 'Keywords', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_keywords" id="search_keywords" class="form-control" placeholder="<?php esc_attr_e( 'Keywords', 'wp-job-manager' ); ?>" value="<?php echo esc_attr( $keywords ); ?>" />
		</div>

		<div class="search_location col-sm-12 col-lg-3">
			<label for="search_location" class="sr-only"><?php esc_html_e( 'Location', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_location" id="search_location" class="form-control" placeholder="<?php esc_attr_e( 'Location', 'wp-job-manager' ); ?>" value="<?php echo esc_attr( $location ); ?>" />
		</div>

 
 	<?php if ( $categories ) : ?>
			<?php foreach ( $categories as $category ) : ?>
				<input type="hidden" name="search_categories[]" value="<?php echo esc_attr( sanitize_title( $category ) ); ?>" />
			<?php endforeach; ?>
			
			
		<?php elseif ( $show_categories && ! is_tax( 'job_listing_category' ) && get_terms( array( 'taxonomy' => 'job_listing_category' ) ) ) : ?>
		

			<div class="search_categories col-sm-12 col-lg-3">
				<label for="search_categories" class="sr-only"><?php esc_html_e( 'Category', 'wp-job-manager' ); ?></label>
				<?php if ( $show_category_multiselect ) : ?>
					<?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'hide_empty' => true ) ); ?>
				<?php else : ?>
					<?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => __( 'Any category', 'wp-job-manager' ), 'name' => 'search_categories','class' => 'form-control', 'orderby' => 'name', 'selected' => $selected_category, 'multiple' => false, 'hide_empty' => true ) ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		

		<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
	</div> <!-- .row -->

	</div> <!-- .search_jobs -->

<!-- commenting out dumb currently unwanted filters -->
	<?php do_action( 'job_manager_job_filters_end', $atts ); ?> 
	
		</div> <!-- .job_filters_card -->
	
</form>

<?php do_action( 'job_manager_job_filters_after', $atts ); ?>


<noscript><?php esc_html_e( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'wp-job-manager' ); ?></noscript>
