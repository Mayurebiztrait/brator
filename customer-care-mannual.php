<?php
/**
 * Template name: Customer Care Manual
 */

get_header();

if (is_active_sidebar("sidebar-1")):
    $blog_post_list_class = "col-xl-9";
else:
    $blog_post_list_class = "col-xl-12";
endif;
?>
<!-- <style>
.top-banner {
    padding-top: 425px;
    background-image: url(https://aodes.solutiontrackers.biz/wp-content/uploads/2022/12/download.png)!important;
    background-size: cover;
}
</style> -->
<style>
	.accordion {
		background-color: #fff;
		color: #444;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border-bottom: 1px solid darkgray;
		text-align: left;
		outline: none;
		font-size: 15px;
		transition: 0.4s;
	}

	div#accordion .card {
		border: none;
	}

	.panel {
		padding: 0 18px;
		display: none;
		background-color: white;
		overflow: hidden;
	}

	.panel .card-body ul li a {
		font-size: 14px;
	}

	.panel .card-body ul {
		margin-top: 0;
	}

	.panel .card-body p {
		margin-bottom: 0;
	}

	.panel i.fa.fa-file {
		font-size: 12px;
	}

	.panel .card-header.accordion.active h5 a {
		color: #ed3333;
	}
</style>

<div class="top-banner ">
	<div class="inner-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- <h3>AODES</h3> -->
					<p>OWNER'S MANUALS</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="top-banner">
<div class="inner-top">
<div class="row section-top-2">
<div class="col-sm-2"></div>
<div class="col-sm-8"><p></p></div>
<div class="col-sm-2"></div>
</div>
</div>
</div>
</div> -->
<!--===================================-->

<div class="top-middle-banner customer-care-manuals">
	<div class="inner-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="top-middle-banner-wrapper">
						<h3>AODES IS EDGING INTO THE ADVANCED RANKS IN THE WORLD IN THE POWERSPORTS INDUSTRY</h3>
						<p>AND AIMS TO SUPPLY SUPERIOR PRODUCTS TO DEALERS AND FANS GLOBALLY.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="top-middle-banner customercare">
=======

<div class="top-middle-banner customercare">
>>>>>>> c11f2c66a41d342ec4ed18efc0b9c3657210b06b
<div class="inner-section">
<div class="row section-1">
<div class="col-sm-2"></div>
<div class="col-sm-8"><h3></h3></div>
<div class="col-sm-2"></div>
</div>
<div class="row section-2">
<div class="col-sm-3"></div>
<div class="col-sm-6 ct"><p></p></div>
<div class="col-sm-3"></div>
</div> -->
<!-- 
</div>
</div> -->
<div class="brator-manuals">
	<div class="container-xxxl container-xxl container">

		<div class="brator-blog-post bottom-catalog">
			<?php
   $post_type = "manuals";
   // Get all the taxonomies for this post type
   $taxonomies = get_object_taxonomies(
       (object) [
           "post_type" => $post_type,
       ]
   );
   foreach ($taxonomies as $taxonomy) {
       // Gets every "category" (term) in this taxonomy to get the respective posts
       $terms = get_terms($taxonomy, [
           "orderby" => "name",
           "order" => "ASC",
           "hide_empty" => "1",
       ]);

       foreach ($terms as $term) {
           // WP_Query arguments
           $args = [
               "post_type" => $post_type,
               "posts_per_page" => "-1",
               "tax_query" => [
                   [
                       /**
                        * For get a specific taxanomy use
                        *'taxonomy' => 'category',
                        */
                       "taxonomy" => $taxonomy,
                       "field" => "slug",
                       "terms" => $term->slug,
                   ],
               ],
           ];
           // The Query
           $posts = new WP_Query($args);

           // The Loop
           if ($posts->have_posts()) { ?>
        <dl id="box-loop-list-<?php echo $term->slug; ?>">
          <div id="accordion" class="custom-accordion" role="tablist">
            <div class="card">
              <div class="card-header accordion" role="tab" id="heading-<?php the_ID(); ?>">
                <h5 class="mb-0 custom-accordion-title">
                  <a data-toggle="collapse" href="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
                    <?php echo $term->name; ?>
                  </a>
                  <span class="arrow_span"><i class="fa-solid fa-greater-than"></i></span>
                </h5>
              </div>

              <div id="collapse-<?php the_ID(); ?>" class="collapse<?php echo $posts->current_post ==0? " in": ""; ?> panel" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>" data-parent="#accordion">
                <div class="card-body">
                  <?php while ($posts->have_posts()):
                        $posts->the_post(); ?>
                          <div class="sub_categories">
                            <p class="c_title"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_title(); ?></p>
                            <ul class="c_ul" style="display:none">
                              <?php
                                $files = get_field("files", get_the_ID());
                                if (!empty($files)) {
                                    foreach ($files as $pdflink) {
                                        echo '<li><i class="fa fa-file" aria-hidden="true"></i> <a href="' .
                                            $pdflink["url"] .
                                            '" target="_blank">' .
                                            $pdflink["title"] .
                                            "</a></li>";
                                    }
                                }
                              ?>
                            </ul>
                          </div>
                  <?php
                  endwhile; ?>
              </div>
          </div>
        </dl>
			<?php }
       }
   }
   ?>
		</div>
	</div>
</div>
</div>
<script>
	// var acc = document.getElementsByClassName("accordion");
	// var i;

	// for (i = 0; i < acc.length; i++) {
	//   acc[i].addEventListener("click", function() {
	//     this.classList.toggle("active");
	//     var panel = this.nextElementSibling;
	//     if (panel.style.display === "block") {
	//       panel.style.display = "none";
	//     } else {
	//       panel.style.display = "block";
	//     }
	//   });
	// }
</script>
<?php get_footer();
?>
