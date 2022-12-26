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
?>
<style>
.top-banner {
    padding-top: 425px;
    background-image: url(https://aodes.solutiontrackers.biz/wp-content/uploads/2022/12/download.png)!important;
    background-size: cover;
}
.top-middle-banner {
    padding-top: 147px;
    background-image: url(https://aodes.solutiontrackers.biz/wp-content/uploads/2022/12/catalog-banner-small.png)!important;
    background-size: contain;
    background-repeat: no-repeat;
}
.inner-section h3 {
    margin: 11px 0px 5px 0px;
    color: #fff;
    font-size: 24px;
    text-align: center;
}
.inner-section {
    margin-top: -125px;
}
.section-1 .col-sm-8 {
    background: #000;
}
.row.section-2 p {
    margin: 10px 0 0 0;
    text-align: center;
    font-size: 24px;
}
.row.main-title-catalog h1 {
margin-bottom: 14px;
    float: left;
    text-transform: uppercase;
    font-size: 32px;
}
.row.main-title-catalog {
	margin-top: 24px;
    border-bottom: 1px solid darkgray;
}
.brator-blog-post.bottom-catalog {
    margin-top: 15px;
}
.row.section-top-1 h3 {
    font-size: 52px;
    color: #fff;
}
.row.section-top-1 h3 {
    font-size: 52px;
    color: #ed3333;
}
.row.section-top-2 p {
   padding: 25px 0px 92px 69px;
    font-size: 42px;
    color: #fff;
    background: #ee2c22;
    opacity: 0.5;
}
.inner-top {
    width: 100%;
    position: absolute;
    top: 73%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.row.main-title-catalog span {
    color: #ed3333;
}
</style>
<div class="top-banner">
<div class="inner-top">
<div class="row section-top-1">
<div class="col-sm-2"></div>
<div class="col-sm-8"><h3>AODES</h3></div>
<div class="col-sm-2"></div>
</div>
<div class="row section-top-2">
<div class="col-sm-2"></div>
<div class="col-sm-8"><p>CATALOGS & <?php single_term_title();?></p></div>
<div class="col-sm-2"></div>
</div>
</div>
</div>
</div>
<!--===================================-->
<div class="top-middle-banner">
<div class="inner-section">
<div class="row section-1">
<div class="col-sm-2"></div>
<div class="col-sm-8"><h3>INCLUDE EVERYTHING REGARDING IN 2023 AODES LINEUP.</h3></div>
<div class="col-sm-2"></div>
</div>
<div class="row section-2">
<div class="col-sm-2"></div>
<div class="col-sm-8"><p>VEHICLES, ACCESSORIES & GEAR!</p></div>
<div class="col-sm-2"></div>
</div>

</div>
</div>
<div class="brator-blog-post-area catalogs-archive">
	<div class="container-xxxl container-xxl container">
		<div class="row main-title-catalog">
			<div class="col-lg-12">
				<div class="brator-breadcrumb">
					<h1 class="text-center">Download <span><?php single_term_title();?> Catalog</span></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container-xxxl container-xxl container">
		
				<div class="brator-blog-post bottom-catalog">
					<?php
					if ( have_posts() ) : ?>
                        <div class="row">
                        <?php 
                            while ( have_posts() ) :
                                the_post();
                                ?>
                                
                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                    <?php
                                    get_template_part( 'template-parts/blog-layout/blog-catalog-content' );
                                ?>
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
</div>
<?php
get_footer();
