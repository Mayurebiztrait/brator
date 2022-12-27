<?php
/**
 * Template name: Customer Care Manual
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
<div class="top-middle-banner customercare">
<div class="inner-section">
<div class="row section-1">
<div class="col-sm-2"></div>
<div class="col-sm-8"><h3>AODES IS EDGING INTO THE ADVANCED RANKED RANKS IN THE WORLD IN THE POWERSPORTS INDUSTRY</h3></div>
<div class="col-sm-2"></div>
</div>
<div class="row section-2">
<div class="col-sm-3"></div>
<div class="col-sm-6 ct"><p>ABD AIMS TO SUPPLY SUPERIOR PRODUCTS TO DEALERS AND FANS GLOBALLY</p></div>
<div class="col-sm-3"></div>
</div>

</div>
</div>
<div class="brator-manuals">
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
				
				$args = array(
               'taxonomy' => 'manual-categories',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

   $cats = get_categories($args);

   foreach($cats as $cat) {
?>
      <a href="<?php echo get_category_link( $cat->term_id ) ?>">
           <?php echo $cat->name; ?>
      </a>
<?php
   }
				?>
				
				</div>
			
	</div>
</div>
<?php
get_footer();
