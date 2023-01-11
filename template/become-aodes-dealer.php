<?php
/**
 * comment for template*
 * Template Name: Become a Aodes Dealer

 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header(); ?>
	
<section class="banner-section">
	<div class="banner-text-wrapper" style="background-image: url(<?php echo get_field( "banner_image", get_the_ID() ); ?>);">
		<p><?php echo get_field( "banner_text", get_the_ID() ); ?></p>
	</div>
</section>

<section class="custom-become-section">
	<div class="container">
		<div class="row">
			<div class="custom-become-text">
				<h3><?php echo get_field( "why_we_title", get_the_ID() ); ?></h3>
				<p><?php echo get_field( "why_we_text", get_the_ID() ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="box-dealer-section" style="background-image: url(<?php echo get_field( "why_we_background_image", get_the_ID() ); ?>);">
	<div class="container">
		<div class="row">
			<?php
			if( get_field('why_we_boxes') ): 
				while( the_repeater_field('why_we_boxes') ): ?>
					<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="custom-box-img">
							<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" />
						</div>
						<div class="custom-box-title">
							<h3><?php the_sub_field('title'); ?></h3>
						</div>
						<div class="custom-box-text">
							<p><?php the_sub_field('content'); ?></p>
						</div>
					</div>
					<?php
				endwhile;
			endif; ?>
		</div>
	</div>
</section>

<section class="togather-section" style="background-image: url(<?php echo get_field( "we_are_background_image", get_the_ID() ); ?>);">
	<div class="container">
		<div class="row">
			<div class="text-togather-wrapper">
				<h3><?php echo get_field( "we_are_title", get_the_ID() ); ?></h3>
				<p><?php echo get_field( "we_are_text", get_the_ID() ); ?></p>
			</div>
			<div class="fill-out-btn">
				<a href="<?php echo get_field( "we_are_button_link", get_the_ID() ); ?>"><?php echo get_field( "we_are_button_text", get_the_ID() ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php
$dealers = get_field( 'dealers_need', get_the_ID() );
if( $dealers ): ?>
	<section class="need-shop-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xl-6 col-lg-12">
					<div class="need-shop-wrapper"><?php echo $dealers['dealer_point_1']; ?></div>
				</div>
				<div class="col-md-12 col-xl-6 col-lg-12">
					<div>
						<img src="<?php echo $dealers['dealer_image_1']; ?>" alt="" class="w-100">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="need-shop-section-two">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xl-6 col-lg-12">
					<div class="row">
						<div class="col-md-6">
							<div class="need-shop-img">
								<img src="<?php echo $dealers['dealer_image_2']; ?>" alt="" class="w-100">
							</div>
						</div>
						<div class="col-md-6">
							<div class="need-shop-img">
								<img src="<?php echo $dealers['dealer_image_3']; ?>" alt="" class="w-100">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xl-6 col-lg-12">
					<div class="dealers-black-box">
						<?php echo $dealers['dealer_other_points']; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
endif; ?>

<section class="faq-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="faq-wrapper" style="background-image: url(<?php echo get_field( "faqs_background_image", get_the_ID() ); ?>);">
					<div>
						<div>
							<h3><?php echo get_field( "faqs_title", get_the_ID() ); ?></h3>
						</div>
						<div class="faq-list-question">
							<div class="faq-question-list-one">
								<?php echo get_field( "faq_content_left", get_the_ID() ); ?>
							</div>
							<div class="faq-question-list-one">
								<?php echo get_field( "faq_content_right", get_the_ID() ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer(); ?>