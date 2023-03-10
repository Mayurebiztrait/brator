<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
	$blog_post_list_class = 'col-xl-9';
else :
	$blog_post_list_class = 'col-xl-12';
endif;

$blog_list_top = brator_get_options( 'blog_list_top' );
if ( $blog_list_top ) :
	if ( class_exists( '\\Elementor\\Plugin' ) ) :
		$pluginElementor         = \Elementor\Plugin::instance();
		$blog_list_top_elementor = $pluginElementor->frontend->get_builder_content( $blog_list_top );
		echo do_shortcode( $blog_list_top_elementor );
	endif;
endif;
?>
<style>
.top-banner {
    padding-top: 425px;
    background-image: url(https://aodes.solutiontrackers.biz/wp-content/uploads/2022/12/download.png)!important;
    background-size: cover;
}
</style>
<div class="top-banner"></div>
<div class="brator-blog-post-area newspage">
	<div class="container-xxxl container-xxl container">
	<div class="row"><div class="col-sm-12"><h2><?php echo 'News'; ?></h2></div></div>
		<div class="row bottom">
		<div class="col-xl-2 col-lg-12">
		<?php echo do_shortcode('[sh_custom_menu_display]'); ?>
		</div>
			<div class="<?php echo esc_attr( $blog_post_list_class ); ?> col-lg-12 middlesec">
				<div class="brator-blog-post">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/blog-layout/blog-standard-content' );
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					wp_reset_postdata();
					?>
					<?php if ( get_the_posts_pagination() ) : ?>
						<div class="brator-pagination-box">
							<?php
								the_posts_pagination(
									array(
										'mid_size'  => 2,
										'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
									  </svg>' . esc_html__( 'Prev', 'brator' ),
										'next_text' => esc_html__( 'Next', 'brator' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path></svg>',
									)
								);
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<!--	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<div class="col-xl-3 col-lg-5 col-md-6 col-12">
					<div class="brator-blog-post-sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>-->
		</div>
	</div>
</div> 
