<?php
/**
 * comment for template*
 * Template Name: Categories Listing page
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="product-listing-page">
        <div class="container-xxxl container-xxl container">
            <?php
            $args = array(
                'taxonomy' => 'vehicle_category',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => true
            );
            foreach( get_categories( $args ) as $category ) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-details-title">
                            <h3><?php echo $category->name;?></h3>
                            <p><?php echo $category->category_description;?></p>
                        </div>
                    </div>
            
                    <?php
                    $args = array(
                        'vehicle_category' => $category->slug,
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        
                        'orderby' => 'name',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    
                    $vehicle_id = get_the_ID();
                    $base_msrp = get_field('base_msrp',$vehicle_id);
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $vehicle_id ), 'single-post-thumbnail' );
                    ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="product-details-wrapper">
                            <a href="<?php echo site_url('/simple-product-detail').'?vehicleid='.$vehicle_id;?>">
                            <?php if(isset($image[0])){ ?>    
                                <div class="product-details-main-img">
                                    <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" >
                                </div>
                            <?php }?>
                                <div class="product-details-content">
                                    <h2><?php the_title(); ?></h2>
                                    <h3>Starting at <span>$<?php echo $base_msrp; ?></span> us MSRP</h3>
                                    <p>
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
            
                </div>
        <?php } ?>

    </div>
</section>

<?php get_footer(); ?>