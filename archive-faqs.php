<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brator
 */

get_header();

if ( is_active_sidebar( 'sidebar-1' ) ) :
	$blog_post_list_class = 'col-xl-9';
else :
	$blog_post_list_class = 'col-xl-12';
endif;
$args = array(
	'post_type' => 'faqs',
    'posts_per_page'         => -1,
	'meta_key' => 'showhide',
	'meta_value' => 1,
	'meta_compare' => '=='
);
$query = new WP_Query( $args); 
?>
<style>
.top-banner {
    padding-top: 425px;
    background-image: url(https://aodes.solutiontrackers.biz/wp-content/uploads/2022/12/download.png)!important;
    background-size: cover;
}
.faqs-archive h2 {
    margin-top: 40px!Important;
}
.faqs-archive h2:after {
    position: absolute;
    content: '';
    border-bottom: 1px solid darkgray;
    width: 100%;
    transform: translateX(-50%);
    bottom: -13px;
    left: 50%;
}
.brator-blog-post-area.faqs-archive li.menu-item.menu-item-type-custom.menu-item-object-custom.current-menu-item {
    background-color: #fff!important;
}
</style>
<div class="top-banner"></div>
<div class="brator-blog-post-area faqs-archive">
	<div class="container-xxxl container-xxl container">
	<div class="row"><div class="col-sm-12"><h2><?php echo 'Faqs'; ?></h2></div></div>
	<div class="row">
	<div class="col-sm-4"><?php echo do_shortcode('[sh_custom_menu_display]'); ?></div>
	<div class="col-sm-8">
	<div class="leftside">
					<div class="brator-blog-post">
					<?php
					if ( $query->have_posts() ) : ?>
                        <div class="row">
                        <?php 
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                ?>
                                
                                <div class="col-12">
                                 <div class="row">
                                    <div class="col">
                                       <div class="tabs">
                                        
                                    <?php
                                
                                    get_template_part( 'template-parts/blog-layout/faq-content' );
                                ?>
                                       </div>
                                    </div>
                                </div>
                                </div>
                    
                            
                            <?php
                            endwhile;
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
				

                    </div>
                    <?php
					wp_reset_postdata();
					?>
					<?php if ( get_the_posts_pagination() ) : ?>
						<div class="brator-pagination-box ">
							<?php
								
							?>
						</div>
					<?php endif; ?>
				</div>
				</div>
	</div>
	</div>
		

			
	</div>
</div>
<?php
get_footer();
