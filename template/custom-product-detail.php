<?php
/**
 * comment for template*
 * Template Name: Custom product detail page

 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 

// echo "<pre>";
// print_r($product);
// exit;
$vehicle_id = $_GET['vehicleid'];
$base_msrp = get_field('base_msrp',$vehicle_id);
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $vehicle_id ), 'single-post-thumbnail' );

?>
<div class="custom_product_detail_wrap">
<section class="">
        <div class="container-xxxl container-xxl container">
            <div class="card-wrapper">
                <div class="card">
                    <!-- card left -->
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                            </div>
                        </div>
                        <div class="img-select">
                            <div class="img-item">
                                <a href="#" data-id="1">
                                    <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="2">
                                    <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="3">
                                    <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="4">
                                    <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="shoe image">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- card right -->
                    <div class="product-content">
                        <h2 class="product-title"><?php echo get_the_title($vehicle_id);?></h2>

                        <div class="product-price">
                            <p class="new-price"><span>$<?php echo $base_msrp;?></span></p>
                        </div>

                        <div class="product-detail">
                            <p>
                            <?php echo get_the_content('','',$vehicle_id);?>
                            </p>
                            <ul>
                                <li>Color: <span>Black</span></li>
                                <li>Available: <span>in stock</span></li>
                                <li>Category: <span>Shoes</span></li>
                                <li>Shipping Area: <span>All over the world</span></li>
                                <li>Shipping Fee: <span>Free</span></li>
                            </ul>
                        </div>

                        <div class="purchase-info">
                            <input type="number" min="0" value="1">
                            <button type="button" class="btn">
                                Add to Cart <i class="fas fa-shopping-cart"></i>
                            </button>
                            <button type="button" class="btn">Compare</button>
                        </div>

                        <div class="social-links">
                            <p>Share At: </p>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- gallery section -->
    <section class="gallary-section-main">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="gallary-wrapper">
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                    </div>
                </div>
                <div class="gallary-wrapper-main">
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <div class="gellary-middal-part">
                            <div class="gellary-middal-part-item">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                            </div>
                            <div class="gellary-middal-part-item">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- feature section -->
    <section class="feature-section">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Top Features</h2>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                    <?php 
                    $active_tab = '';
                    $e_show_modal_image = '';
                    $c_show_modal_image = '';
                    $d_show_modal_image = '';
                    $ds_show_modal_image = '';

                    $e_show = get_field('e_show',$vehicle_id);
                    $c_show = get_field('c_show',$vehicle_id);
                    $d_show = get_field('d_show',$vehicle_id);
                    $ds_show = get_field('ds_show',$vehicle_id);

                    if($e_show == true){
                        $active_tab = 'e_show';
                    }else if($e_show == true){
                        $active_tab = 'c_show';
                    }else if($e_show == true){
                        $active_tab = 'd_show';
                    }else if($e_show == true){
                        $active_tab = 'ds_show';
                    }
                   
                    if($e_show == true){ ?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if($active_tab == 'e_show'){ echo "active";} ?>"  data-bs-toggle="pill"
                                data-bs-target="#e_show" type="button" role="tab" aria-controls="e_show"
                                aria-selected="true">ENGINE</button>
                        </li>
                        
                    <?php  }   ?>

                    <?php 
                   
                    if($c_show == true){ ?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if($active_tab == 'c_show'){ echo "active";} ?>"  data-bs-toggle="pill"
                                data-bs-target="#c_show" type="button" role="tab" aria-controls="c_show"
                                aria-selected="true">CHASSIS</button>
                        </li>
                        
                    <?php  }   ?>

                    <?php 
                   
                    if($d_show == true){ ?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if($active_tab == 'd_show'){ echo "active";} ?>"  data-bs-toggle="pill"
                                data-bs-target="#d_show" type="button" role="tab" aria-controls="d_show"
                                aria-selected="true">DRIVETRAIN</button>
                        </li>
                        
                    <?php  }   ?>

                    <?php 
                   
                    if($ds_show == true){ ?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if($active_tab == 'ds_show'){ echo "active";} ?>"  data-bs-toggle="pill"
                                data-bs-target="#ds_show" type="button" role="tab" aria-controls="ds_show"
                                aria-selected="true">DESIGN</button>
                        </li>
                        
                    <?php  }   ?>

                        
                       
                    </ul>
                    
                       
                        
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <?php 
                $e_description = [];
                $ed_count = 0;
                if( have_rows('engine_posts_content',$vehicle_id) ) { ?>
                <div class="tab-pane fade <?php if($active_tab == 'e_show'){ echo "show active";} ?>" id="e_show" role="tabpanel">
                    <?php 
                    $e_count = 1;
                    while( have_rows('engine_posts_content',$vehicle_id) ): the_row(); 
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    if($e_show_modal_image == ''){
                        $e_show_modal_image = $image;
                    }
                    $description = get_sub_field('description');
                    $e_description[$ed_count]['title'] = $title;
                    $e_description[$ed_count]['description'] = $description;
                    ?>      
                    <?php if($e_count == 1){ ?>
                    <div class="row">
                    <?php }?>
                    <?php $show_in_list = get_sub_field('show_in_list');
                    if($show_in_list == true){ ?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">
                                        
                                        <img alt="" class="card-imgage"
                                            src="<?php echo $image;?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title;?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal" data-bs-target="#view_feature">
                                            <span class="custom-learn-more">Learn More</span>
                                            <div class="custom-card-svg">
                                                <svg width="12" height="19" viewBox="0 0 12 19">
                                                    <path class="svg"
                                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-description" style="display:none">
                                            <?php echo $description;?>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    <?php }?>
                    <?php if($e_count == 3){ ?>
                    </div>
                    <?php $e_count = 0; $show_in_list = false; break; }?>
                    <?php $e_count++; $ed_count++; endwhile; ?>        
                </div>
                <?php }?>
                <?php 
                $cd_count = 0;
                $c_description = [];
                if( have_rows('chassis_posts_content_copy',$vehicle_id) ) { ?>
                <div class="tab-pane fade <?php if($active_tab == 'c_show'){ echo "show active";} ?>" id="c_show" role="tabpanel">
                    <?php 
                    $e_count = 1;
                    while( have_rows('chassis_posts_content_copy',$vehicle_id) ): the_row(); 
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    if($_show_modal_image == ''){
                        $c_show_modal_image = $image;
                    }
                    $description = get_sub_field('description');
                    $c_description[$cd_count]['title'] = $title;
                    $c_description[$cd_count]['description'] = $description;
                    ?>      
                    <?php if($e_count == 1){ ?>
                    <div class="row">
                    <?php }
                    $show_in_list = get_sub_field('show_in_list');
                    if($show_in_list == true){?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">
                                        
                                        <img alt="" class="card-imgage"
                                            src="<?php echo $image;?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title;?></h4>
                                        <div class="custom-learn-svg"  data-bs-toggle="modal" data-bs-target="#view_feature">
                                            <span class="custom-learn-more">Learn More</span>
                                            <div class="custom-card-svg">
                                                <svg width="12" height="19" viewBox="0 0 12 19">
                                                    <path class="svg"
                                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-description" style="display:none">
                                            <?php echo $description;?>
                                        </div>
                                    </div>
                                    
                                </button>
                            </div>
                        </div>
                    <?php } if($e_count == 3){ ?>
                    </div>
                    <?php $e_count = 0; $show_in_list= false;  break; }?>
                    <?php $e_count++; $cd_count++; endwhile; ?>        
                </div>
                <?php }?>
                <?php 
                $d_description = [];
                $dd_count = 0;
                if( have_rows('drivetrain_posts_content',$vehicle_id) ) { ?>
                <div class="tab-pane fade <?php if($active_tab == 'd_show'){ echo "show active";} ?>" id="d_show" role="tabpanel">
                    <?php 
                    $e_count = 1;
                    while( have_rows('drivetrain_posts_content',$vehicle_id) ): the_row(); 
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    if($d_show_modal_image == ''){
                        $d_show_modal_image = $image;
                    }
                    $description = get_sub_field('description');
                    $d_description[$dd_count]['title'] = $title;
                    $d_description[$dd_count]['description'] = $description;
                    ?>      
                    <?php if($e_count == 1){ ?>
                    <div class="row">
                    <?php }
                    $show_in_list = get_sub_field('show_in_list');
                    if($show_in_list == true){?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">
                                        
                                        <img alt="" class="card-imgage"
                                            src="<?php echo $image;?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title;?></h4>
                                        <div class="custom-learn-svg"  data-bs-toggle="modal" data-bs-target="#view_feature">
                                            <span class="custom-learn-more">Learn More</span>
                                            <div class="custom-card-svg">
                                                <svg width="12" height="19" viewBox="0 0 12 19">
                                                    <path class="svg"
                                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-description" style="display:none">
                                            <?php echo $description;?>
                                        </div>
                                    </div>
                                    
                                </button>
                            </div>
                        </div>
                    <?php } if($e_count == 3){ ?>
                    </div>
                    <?php $e_count = 0; $show_in_list = false;break;}?>
                    <?php $e_count++; $dd_count++; endwhile; ?>        
                </div>
                <?php }?>
                <?php 
                $ds_description = [];
                $dds_count = 0;
                if( have_rows('design_posts_content',$vehicle_id) ) { ?>
                <div class="tab-pane fade <?php if($active_tab == 'ds_show'){ echo "show active";} ?>" id="ds_show" role="tabpanel">
                    <?php 
                    $e_count = 1;
                    while( have_rows('design_posts_content',$vehicle_id) ): the_row(); 
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    if($ds_show_modal_image == ''){
                        $ds_show_modal_image = $image;
                    }
                    $description = get_sub_field('description');
                    $ds_description[$dds_count]['title'] = $title;
                    $ds_description[$dds_count]['description'] = $description;
                    ?>      
                    <?php if($e_count == 1){ ?>
                    <div class="row">
                    <?php }
                    $show_in_list = get_sub_field('show_in_list');
                    if($show_in_list == true){ ?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">
                                        
                                        <img alt="" class="card-imgage"
                                            src="<?php echo $image;?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title;?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal" data-bs-target="#view_feature">
                                            <span class="custom-learn-more">Learn More</span>
                                            <div class="custom-card-svg">
                                                <svg width="12" height="19" viewBox="0 0 12 19">
                                                    <path class="svg"
                                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-description" style="display:none">
                                            <?php echo $description;?>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    <?php } if($e_count == 3){ ?>
                    </div>
                    <?php $e_count = 0; $show_in_list = false; break;}?>
                    <?php $e_count++; $dds_count++;endwhile; ?>        
                </div>
                <?php }?>
            </div>
            
            <div class="row">
                <div class="col-md-12 container-xxxl container-xxl container">
                    <div class="custom-button-modal">
                        <!-- Button trigger modal -->
                        <a href="" type="button" class="" data-bs-toggle="modal" data-bs-target="#View_all_features">
                            View all features
                            <span class="custom-card-svg">
                                <svg width="12" height="19" viewBox="0 0 12 19">
                                    <path class="svg"
                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                        fill="#FFF" fill-rule="nonzero"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="View_all_features" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Features</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <?php if($e_show == true){?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active"  data-bs-toggle="pill"
                                            data-bs-target="#modal-pills-Engine" type="button" role="tab" aria-controls="pills-Engine"
                                            aria-selected="true">Engine</button>
                                    </li>
                                    <?php }?>
                                    <?php if($c_show == true){?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link"  data-bs-toggle="pill"
                                            data-bs-target="#modal-pills-chassis" type="button" role="tab" aria-controls="pills-chassis"
                                            aria-selected="false">chassis</button>
                                    </li>
                                    <?php }?>
                                    <?php if($d_show == true){?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link"  data-bs-toggle="pill"
                                            data-bs-target="#modal-pills-drivetrain" type="button" role="tab"
                                            aria-controls="pills-drivetrain" aria-selected="false">Drivetrain</button>
                                    </li>
                                    <?php }?>
                                    <?php if($ds_show == true){?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link"  data-bs-toggle="pill"
                                            data-bs-target="#modal-pills-Design" type="button" role="tab" aria-controls="pills-Design"
                                            aria-selected="false">Design</button>
                                    </li>
                                    <?php }?>
                                </ul>
                                <div class="row">
                                    <?php if($e_show == true){?>
                                        <div class="col-md-6">
                                            <img class="img img-fluid" src="<?php echo $e_show_modal_image;?>">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="m_description">
                                                <h2 class="m_title">Engine</h2>
                                                <?php foreach($e_description as $content){
                                                    
                                                    if($content['title']){
                                                        echo '<h3 class="p_title">'.$content['title'].'</h3>';
                                                    }
                                                    if($content['description']){
                                                        echo $content['description'];
                                                    }   
                                                } ?>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php if($c_show == true){?>
                                        <div class="col-md-6">
                                            <img class="img img-fluid" src="<?php echo $c_show_modal_image;?>">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="m_description">
                                            <h2 class="m_title">Chassis</h2>
                                                <?php foreach($c_description as $content){
                                                    if($content['title']){
                                                        echo '<h3 class="p_title">'.$content['title'].'</h3>';
                                                    }
                                                    if($content['description']){
                                                        echo $content['description'];
                                                    }   
                                                } ?>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php if($d_show == true){?>
                                        <div class="col-md-6">
                                            <img class="img img-fluid" src="<?php echo $d_show_modal_image;?>">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="m_description">
                                            <h2 class="m_title">Drivetrain</h2>
                                                <?php foreach($d_description as $content){
                                                    if($content['title']){
                                                        echo '<h3 class="p_title">'.$content['title'].'</h3>';
                                                    }
                                                    if($content['description']){
                                                        echo $content['description'];
                                                    }         
                                                     
                                                } ?>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php if($ds_show == true){?>
                                        <div class="col-md-6">
                                            <img class="img img-fluid" src="<?php echo $ds_show_modal_image;?>">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="m_description">
                                            <h2 class="m_title">Design</h2>
                                                <?php foreach($ds_description as $content){
                                                    if($content['title']){
                                                        echo '<h3 class="p_title">'.$content['title'].'</h3>';
                                                    }
                                                    if($content['description']){
                                                        echo $content['description'];
                                                    }   
                                                } ?>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="view_feature" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mcontent">
                                    </div>
                                    <div class="col-md-6 mimage">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- specifications section -->
    <section class="specifications-section">
        <div class="container-xxxl container-xxl container">
            <div class="row">
                <div class="col-md-12">
                    <div class="specifications-title">
                        <hr>
                        <h2 class="specifications-section-title">specifications</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-specification-wrapper">
                        <div class="row">
                            <div class="col-md-3 p-0">
                                <div class="custom-specification-card">
                                    <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">
                                        <img src="img/s-1.png" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title">ENGINE TYPE</h4>
                                    <p class="custom-specification-card-subtitle">
                                        999cc LIQUID-COOLED UNICAM PARALLEL-TWIN

                                    </p>
                                    </div>
                                <div class="vl">

                                </div>
                            </div>
                            </div>

                       

                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">
                                        <img src="img/s-2.png" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title">TRANSMISSION</h4>
                                    <p class="custom-specification-card-subtitle">
                                        SIX-SPEED AUTOMATIC DUAL- CLUTCH TRANSMISSION (DCT) WITH HIGH/LOW
                                        SUBTRANSMISSION

                                    </p>
                                </div>
                                <div class="vl">

                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">
                                        <img src="img/s-3.png" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title">FRONT SUSPENSION</h4>
                                    <p class="custom-specification-card-subtitle">
                                        INDEPENDENT DOUBLE-
                                        WISHBONE; 14.6 INCHES OF TRAVEL
                                    </p>
                                </div>
                                <div class="vl">

                                </div>

                            </div>

                        </div>


                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">
                                        <img src="img/s-4.png" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title">REAR SUSPENSION</h4>
                                    <p class="custom-specification-card-subtitle">
                                        3-LINK TRAILING ARM; 15.0 INCHES OF TRAVEL
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="custom-specification-button-modal">
                    <!-- Button trigger modal -->
                    <a href="" type="button" class="" data-bs-toggle="modal" data-bs-target="#view_all_specification">
                        View all features
                        <span class="custom-specification-card-svg">
                            <svg width="12" height="19" viewBox="0 0 12 19">
                                <path class="svg"
                                    d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                    fill="#FFF" fill-rule="nonzero"></path>
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="modal fade" id="view_all_specification" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Specifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mcontent">
                                    </div>
                                    <div class="col-md-6 mimage">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="stay-connected">
        <div class="container-xxxl container-xxl container">
        <div class="row">
            <div class="col-md-3">
                <div class="stay-connected-content-wrapper">
                <div class="stay-connected-content">
                <h2 class="stay-connected-title">
                    STAY 
                </h2>
                <h2 class="stay-connected-highlighted-title">
                     CONNECTED
                </h2>
            </div>
          
        </div>
     </div>
<div class="col-md-1">
    <div class="vl-form-wrapper">
     <div class="vl-form">

     </div>
    </div>
    </div>   
            <div class="col-md-8">
                <div class="contact-form-wrapper">
                    <h5 class="contact-form-title">
                        We'll keep you up to speed on all the latest AODES Talon news. Just fill in your information here.
                    </h5>
                    <div class="form" action="submit">
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="First name*" aria-label="First name">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Last name*" aria-label="Last name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="E-MAIL*" aria-label="E-MAIL">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="ZIP CODE*" aria-label="ZIP CODE">
                        </div>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <p class="confirmation-text">By checking this box, I agree to: (1) receive recurring automated marketing and non-marketing calls, texts, and emails from American AODES Motor Co., Inc. and participating AODES and Acura dealers at any phone numbers and email addresses provided above (consent not required to make a purchase, msg & data rates apply, reply STOP to opt-out of texts or HELP for help); (2) the <a href="#" class="highlighted-text">SMS Terms</a> (including arbitration provision); and (3) the <a href="#" class="highlighted-text">Privacy Policy</a> (which describes how AODES collects and uses personal information and any privacy rights I may have).</p>
                        </label>
                      </div>
                      
                      <a href="#" class="form-submit-button">SEND</a>  
                </div>
               
            </div>
            </div>
        </div>
        </div>
    </section>
</div>


<?php get_footer();?>