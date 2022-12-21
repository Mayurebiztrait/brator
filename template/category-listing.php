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
        <div class="container">
            <?php
            $args = array(
                'taxonomy' => 'product_cat',
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
                        'product_cat' => $category->slug,
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'name',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' );
                        ?>
                        <div class="col-md-4">
                            <div class="product-details-wrapper">
                                <a href="<?php echo get_permalink();?>">
                                    <div class="product-details-main-img">
                                        <img src="<?php echo $image[0];?>" alt="<?php the_title(); ?>" >
                                    </div>
                                    <div class="product-details-content">
                                        <h2><?php the_title(); ?></h2>
                                        <h3>Starting at <span>$<?php echo $product->price; ?></span> us MSRP</h3>
                                        <p>
                                            <?php echo $product->short_description; ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    </div>
            <?php }   ?>
            
        </div>
    </section>

<?php get_footer();?>