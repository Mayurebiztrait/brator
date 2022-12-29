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
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

if (isset($_POST['review_form_submit']) && $_POST['review_form_submit'] == 'SUBMIT') {
    // Gather post data.
    $my_post = array(
        'post_title' => $_POST['vehicle_title'] . ' - ' . $_POST['email'],
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'reviews',
    );

    // Insert the post into the database.
    $inserted_id = wp_insert_post($my_post);

    add_post_meta($inserted_id, '_email', $_POST['email']);
    add_post_meta($inserted_id, '_password', $_POST['password']);
    add_post_meta($inserted_id, '_city', $_POST['city']);
    add_post_meta($inserted_id, '_state', $_POST['state']);
    add_post_meta($inserted_id, '_review', $_POST['review']);
    $upload_dir = get_template_directory() . '/assets/images/';
    add_post_meta($inserted_id, '_email', $_POST['email']);
    add_post_meta($inserted_id, '_password', $_POST['password']);
    add_post_meta($inserted_id, '_city', $_POST['city']);
    add_post_meta($inserted_id, '_state', $_POST['state']);
    add_post_meta($inserted_id, '_review', $_POST['review']);
    add_post_meta($inserted_id, '_vehicle_id', $_POST['vehicle_id']);

    $upload_dir = get_template_directory() . '/assets/images/';
    $ext = pathinfo($_FILES["upload_files"]["name"], PATHINFO_EXTENSION);
    $file_name = time() . '.' . $ext;
    $target_file = $upload_dir . $file_name;
    move_uploaded_file($_FILES["upload_files"]["tmp_name"], $target_file);
    add_post_meta($inserted_id, '_file', $file_name);
    $_POST = array();
    $_FILES = array();
}

$vehicle_id = $_GET['vehicleid'];
$base_msrp = get_field('base_msrp', $vehicle_id);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($vehicle_id), 'single-post-thumbnail');

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

                                <?php

while (have_rows('variations_images', $vehicle_id)):
    the_row();

    ?>
                                <?php
    $images = get_sub_field('images');
    $color_image = get_sub_field('color_image');

    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if ($images): ?>

                                <?php foreach ($images as $image_id): ?>
                                <?php echo wp_get_attachment_image($image_id['id'], $size); ?>

                                <?php endforeach;?>

                                <?php endif;?>

                                <?php endwhile;?>


                            </div>

                        </div>
                        <div class="img-select">
                            <?php
$color_image_array = array();

$image_color_count = 0;
$image_count = 1;
$c_count = 0;
while (have_rows('variations_images', $vehicle_id)):
    the_row();

    ?>
                            <?php

    $images = get_sub_field('images');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if ($images):

    ?>

                            <?php foreach ($images as $image_id): ?>
                            <div class="img-item">
                                <a href="#" data-id="<?php echo $image_count; ?>">
                                    <?php echo wp_get_attachment_image($image_id['id'], $size); ?>
                                </a>
                            </div>


                            <?php $image_count++;
    $c_count++;
endforeach;?>

                            <?php endif;?>

                            <?php
if ($image_color_count == 0) {
    $color_image_array[$image_color_count] = $c_count;
} else {
    $color_image_array[$image_color_count] = 0;
    $color_image_array[$image_color_count] = $color_image_array[$image_color_count] + $c_count;
}

$image_color_count++;
endwhile;?>


                        </div>


                    </div>

                    <!-- card right -->
                    <div class="product-content">
                        <div class="">
                            <h2 class="product-title">
                                <?php echo get_the_title($vehicle_id); ?>
                            </h2>
                        </div>

                        <div class="product-price">
                            <p class="new-price">
                                <span>$<?php echo $base_msrp; ?></span>
                            </p>
                            <div class="base-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 500 500"
                                    style="enable-background:new 0 0 500 500;" xml:space="preserve">
                                    <ellipse style="fill:#ED3333;" cx="250" cy="250.5" rx="250" ry="248.5" />
                                    <ellipse style="fill:#FFFFFF;" cx="245.883" cy="73.705" rx="27.657" ry="27.023" />
                                    <path style="fill:#FFFFFF;"
                                        d="M168.314,184.065c0,0-1.027-24.073,23.098-27.082h59.029c0,0,18.479,2.006,22.072,24.073  s0,193.589,0,193.589h44.656c0,0,17.538,9.362,19.248,27.25s-22.328,26.748-22.328,26.748H178.067c0,0-24.039-7.523-22.756-26.999  c0,0-1.882-19.309,21.729-27.333l41.063,0.418l-0.342-163.915C217.761,210.813,177.04,219.506,168.314,184.065z" />
                                </svg>
                                <span><i>Base MSRP</i></span>
                            </div>
                        </div>

                        <div class="product-description">
                            <p>
                                <?php echo get_the_content('', '', $vehicle_id); ?>
                            </p>
                        </div>
                        <?php
$pick_colot_set = 0;
while (have_rows('variations_images', $vehicle_id)):
    the_row();
    $pick_colot_set = 1;
    ?>
                        <?php endwhile;
if ($pick_colot_set == 1) {
    ?>
                        <div class="product-detail">
                            <h2>PICK YOUR COLOR</h2>

                            <ul class="product-details-ul">
                                <?php

    $color_count = 0;
    while (have_rows('variations_images', $vehicle_id)):
        the_row();

        ?>
                                <?php
    $images = get_sub_field('images');
        $color_image = get_sub_field('color_image');
        $color_name = get_sub_field('color_name');

        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        ?>



                                <li>
                                    <a href="javascript:void(0)" class="change_slide" data-slide="<?php if ($color_count == 0) {echo '1';} else { $final_slide = $color_image_array[$color_count - 1];
            $final_slide++;
            echo $final_slide;}?>">
                                        <?php echo wp_get_attachment_image($color_image['id'], $size); ?>
                                    </a>
                                    <span><?php echo $color_name; ?></span>
                                </li>




                                <?php $color_count++;endwhile;?>

                            </ul>
                        </div>
                        <?php }?>
                        <div class="modal-right">
                            <ul class="pick-modal-right-ul">
                                <li class="pick-modal-right-li">
                                    <a href="#">
                                        <div class="pick-modal-right-img">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>location.png"
                                                alt="">
                                        </div>
                                        <span>
                                            FIND A DEALER
                                        </span>
                                    </a>
                                </li>
                                <li class="pick-modal-right-li">
                                    <a href="#">
                                        <div class="pick-modal-right-img">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>info.png"
                                                alt="">
                                        </div>
                                        <span>
                                            WARRANTY INFO
                                        </span>
                                    </a>
                                </li>
                                <li class="pick-modal-right-li">
                                    <a href="#" type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#ReviewModal">

                                        <div class="pick-modal-right-img">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>review.png"
                                                alt="">
                                        </div>
                                        <span>
                                            LEAVE A REVIEW
                                        </span>
                                    </a>
                                </li>
                                <li class="pick-modal-right-li">
                                    <a href="#">
                                        <div class="pick-modal-right-img">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>dealer.png"
                                                alt="">
                                        </div>
                                        <span>
                                            BECOME A DEALER
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- LEAVE A REVIEW Modal -->
                        <div class="custom-leave-review">
                            <div class="modal fade" id="ReviewModal" tabindex="-1" aria-labelledby="exampleReviewModal"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="post" id="review_form_submit_form" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <div class="modal-body-img-title">
                                                    <div class="modal-body-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            x="0px" y="0px" viewBox="0 0 500 500"
                                                            style="enable-background:new 0 0 500 500;"
                                                            xml:space="preserve">
                                                            <g id="Layer_1" style="display:none;">
                                                                <ellipse style="display:inline;fill:#ED3333;" cx="250"
                                                                    cy="250.5" rx="250" ry="248.5" />
                                                                <ellipse style="display:inline;fill:#FFFFFF;"
                                                                    cx="245.883" cy="73.705" rx="27.657" ry="27.023" />
                                                                <path style="display:inline;fill:#FFFFFF;"
                                                                    d="M168.314,184.065c0,0-1.027-24.073,23.098-27.082h59.029   c0,0,18.479,2.006,22.072,24.073s0,193.589,0,193.589h44.656c0,0,17.538,9.362,19.248,27.25s-22.328,26.748-22.328,26.748H178.067   c0,0-24.039-7.523-22.756-26.999c0,0-1.882-19.309,21.729-27.333l41.063,0.418l-0.342-163.915   C217.761,210.813,177.04,219.506,168.314,184.065z" />
                                                            </g>
                                                            <g id="Layer_2">
                                                                <path style="fill:#ED3333;"
                                                                    d="M437.5,396h-375C29.639,396,3,369.361,3,336.5V83c0-32.861,26.639-59.5,59.5-59.5h375   c32.861,0,59.5,26.639,59.5,59.5v253.5C497,369.361,470.361,396,437.5,396z" />
                                                                <polygon style="fill:#ED3333;"
                                                                    points="247.864,479.485 312.991,392.346 184.657,390.943  " />

                                                                <image style="display:none;overflow:visible;"
                                                                    width="100" height="92"
                                                                    xlink:href="../../../xampp/htdocs/aodesbiz/wp-content/themes/brator/assets/images/New folder/review-icon.png"
                                                                    transform="matrix(4.94 0 0 4.9239 3 23.5)">
                                                                </image>
                                                                <circle
                                                                    style="fill:#FFFFFF;stroke:#FFFFFF;stroke-miterlimit:10;"
                                                                    cx="115.174" cy="213" r="29.957" />
                                                                <circle
                                                                    style="fill:#FFFFFF;stroke:#FFFFFF;stroke-miterlimit:10;"
                                                                    cx="250" cy="213" r="29.957" />
                                                                <circle
                                                                    style="fill:#FFFFFF;stroke:#FFFFFF;stroke-miterlimit:10;"
                                                                    cx="384.609" cy="213" r="29.957" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="modal-body-text">
                                                        <h2>LEAVE A REVIEW</h2>
                                                    </div>
                                                </div>

                                                <div class="custom-modal-form">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="vehicle_title"
                                                                value="<?php echo get_the_title($vehicle_id); ?>">
                                                            <input type="hidden" name="vehicle_title"
                                                                value="<?php echo get_the_title($vehicle_id); ?>">
                                                            <input type="hidden" name="vehicle_id"
                                                                value="<?php echo $vehicle_id; ?>">
                                                            <label for="inputEmail4" class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="inputEmail4">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPassword4"
                                                                class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                id="inputPassword4">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputCity" class="form-label">City</label>
                                                            <input type="text" name="city" class="form-control"
                                                                id="inputCity">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputState" class="form-label">State</label>
                                                            <input type="text" name="state" class="form-control"
                                                                id="inputState">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputStatetext"
                                                                class="form-label">Review</label>
                                                            <textarea class="form-control" name="review"
                                                                id="inputStatetext" rows="3"></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="upload-btn-wrapper">
                                                                <label class="form-label">Submit Images/Videos for Your
                                                                    Review</label>
                                                                <!-- <button class="btn upload_btn">
                                                                    <span>
                                                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>upload.png"
                                                                            alt="">
                                                                    </span>
                                                                    UPLOAD IMAGE(S)/VIDEO(S)
                                                                </button> -->
                                                                <!-- <input type="file" name="upload_files" id="upload_files"
                                                                    style="font-size:15px;opacity:1" /> -->
                                                                <div class="custom-upload-btn">
                                                                    <div class="img-wrapper">
                                                                        <div>
                                                                            <label for="image_uploads"
                                                                                class="img-upload-btn btn upload_btn">
                                                                                <span>
                                                                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/'; ?>upload.png"
                                                                                        alt="">
                                                                                </span>
                                                                                UPLOAD IMAGE(S)/VIDEO(S)
                                                                            </label>
                                                                            <input type="file" id="image_uploads"
                                                                                name="upload_files"
                                                                                accept=".jpg, .jpeg, .png"
                                                                                style="opacity: 0;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="submit-text">
                                                                By submitting photographs or video, you: (1) represent
                                                                to
                                                                Intimidator UTV that they do not contain the likeness of
                                                                any
                                                                person other than your own, and that youare of full
                                                                legal
                                                                age and have read and fully understand the terms of this
                                                                authorization; (2) grant to Intimidator UTV an
                                                                rrevocable,
                                                                perpetual, worldwide right and license to use, and to
                                                                authorize third parties to use and publish, in all
                                                                media,
                                                                the photographs and videos. as well as your name, your
                                                                image
                                                                and likeness (whether with or without your name), and
                                                                your
                                                                statements and endorsements, in any and all forms of
                                                                media,
                                                                marketing, and promotional and sales programs, and for
                                                                any
                                                                purpose (including publicity for Intimidator UTV and any
                                                                product or services), and all other lawful uses as may
                                                                be
                                                                determined by Intimidator UTV; and (3) waive all rights
                                                                to
                                                                review or approve any use of those photographs or
                                                                videos, or
                                                                any written copy or finished product containing them.
                                                            </p>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="modal-footer">
                                                    <input type="submit" name="review_form_submit"
                                                        class="btn btn-primary review_form_submit" value="SUBMIT">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                            alt="">
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                            alt="">
                    </div>
                </div>
                <div class="gallary-wrapper-main">
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                            alt="">
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <div class="gellary-middal-part">
                            <div class="gellary-middal-part-item">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                                    alt="">
                            </div>
                            <div class="gellary-middal-part-item">
                                <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gallary-wrapper-iteam">
                        <img src="https://powersports.honda.com/legacy/talon/assets/hl7/top-features/2022/2022-Talon-1000X-4-Twin-Cylinder-Engine-774x548.jpg"
                            alt="">
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

$e_show = get_field('e_show', $vehicle_id);
$c_show = get_field('c_show', $vehicle_id);
$d_show = get_field('d_show', $vehicle_id);
$ds_show = get_field('ds_show', $vehicle_id);

if ($e_show == true) {
    $active_tab = 'e_show';
} else if ($e_show == true) {
    $active_tab = 'c_show';
} else if ($e_show == true) {
    $active_tab = 'd_show';
} else if ($e_show == true) {
    $active_tab = 'ds_show';
}

if ($e_show == true) {?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if ($active_tab == 'e_show') {
    echo "active";
}?>" data-bs-toggle="pill" data-bs-target="#e_show" type="button" role="tab" aria-controls="e_show"
                                aria-selected="true">ENGINE</button>
                        </li>

                        <?php }?>

                        <?php

if ($c_show == true) {?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if ($active_tab == 'c_show') {
    echo "active";
}?>" data-bs-toggle="pill" data-bs-target="#c_show" type="button" role="tab" aria-controls="c_show"
                                aria-selected="true">CHASSIS</button>
                        </li>

                        <?php }?>

                        <?php

if ($d_show == true) {?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if ($active_tab == 'd_show') {
    echo "active";
}?>" data-bs-toggle="pill" data-bs-target="#d_show" type="button" role="tab" aria-controls="d_show"
                                aria-selected="true">DRIVETRAIN</button>
                        </li>

                        <?php }?>

                        <?php

if ($ds_show == true) {?>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php if ($active_tab == 'ds_show') {
    echo "active";
}?>" data-bs-toggle="pill" data-bs-target="#ds_show" type="button" role="tab" aria-controls="ds_show"
                                aria-selected="true">DESIGN</button>
                        </li>

                        <?php }?>



                    </ul>



                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <?php
$e_description = [];
$ed_count = 0;
if (have_rows('engine_posts_content', $vehicle_id)) {?>
                <div class="tab-pane fade <?php if ($active_tab == 'e_show') {
    echo "show active";
}?>" id="e_show" role="tabpanel">
                    <?php
$e_count = 1;
    while (have_rows('engine_posts_content', $vehicle_id)):
        the_row();
        $title = get_sub_field('title');
        $image = get_sub_field('image');
        if ($e_show_modal_image == '') {
            $e_show_modal_image = $image;
        }
        $description = get_sub_field('description');
        $e_description[$ed_count]['title'] = $title;
        $e_description[$ed_count]['description'] = $description;
        ?>
                    <?php if ($e_count == 1) {?>
                    <div class="row">
                        <?php }?>
                        <?php $show_in_list = get_sub_field('show_in_list');
        if ($show_in_list == true) {?>
                        <div class="col-12 col-sm-12 col-md-6 col-xl-4 col-lg-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">

                                        <img alt="" class="card-imgage" src="<?php echo $image; ?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title; ?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal"
                                            data-bs-target="#view_feature">
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
                                            <?php echo $description; ?>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <?php }?>
                        <?php if ($e_count == 3) {?>
                    </div>
                    <?php $e_count = 0;
            $show_in_list = false;
            break;
        }?>
                    <?php $e_count++;
        $ed_count++;
    endwhile;?>
                </div>
                <?php }?>
                <?php
$cd_count = 0;
$c_description = [];
if (have_rows('chassis_posts_content_copy', $vehicle_id)) {?>
                <div class="tab-pane fade <?php if ($active_tab == 'c_show') {
    echo "show active";
}?>" id="c_show" role="tabpanel">
                    <?php
$e_count = 1;
    while (have_rows('chassis_posts_content_copy', $vehicle_id)):
        the_row();
        $title = get_sub_field('title');
        $image = get_sub_field('image');
        if ($_show_modal_image == '') {
            $c_show_modal_image = $image;
        }
        $description = get_sub_field('description');
        $c_description[$cd_count]['title'] = $title;
        $c_description[$cd_count]['description'] = $description;
        ?>
                    <?php if ($e_count == 1) {?>
                    <div class="row">
                        <?php }
        $show_in_list = get_sub_field('show_in_list');
        if ($show_in_list == true) {?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">

                                        <img alt="" class="card-imgage" src="<?php echo $image; ?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title; ?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal"
                                            data-bs-target="#view_feature">
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
                                            <?php echo $description; ?>
                                        </div>
                                    </div>

                                </button>
                            </div>
                        </div>
                        <?php }
        if ($e_count == 3) {?>
                    </div>
                    <?php $e_count = 0;
            $show_in_list = false;
            break;
        }?>
                    <?php $e_count++;
        $cd_count++;
    endwhile;?>
                </div>
                <?php }?>
                <?php
$d_description = [];
$dd_count = 0;
if (have_rows('drivetrain_posts_content', $vehicle_id)) {?>
                <div class="tab-pane fade <?php if ($active_tab == 'd_show') {
    echo "show active";
}?>" id="d_show" role="tabpanel">
                    <?php
$e_count = 1;
    while (have_rows('drivetrain_posts_content', $vehicle_id)):
        the_row();
        $title = get_sub_field('title');
        $image = get_sub_field('image');
        if ($d_show_modal_image == '') {
            $d_show_modal_image = $image;
        }
        $description = get_sub_field('description');
        $d_description[$dd_count]['title'] = $title;
        $d_description[$dd_count]['description'] = $description;
        ?>
                    <?php if ($e_count == 1) {?>
                    <div class="row">
                        <?php }
        $show_in_list = get_sub_field('show_in_list');
        if ($show_in_list == true) {?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">

                                        <img alt="" class="card-imgage" src="<?php echo $image; ?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title; ?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal"
                                            data-bs-target="#view_feature">
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
                                            <?php echo $description; ?>
                                        </div>
                                    </div>

                                </button>
                            </div>
                        </div>
                        <?php }
        if ($e_count == 3) {?>
                    </div>
                    <?php $e_count = 0;
            $show_in_list = false;
            break;
        }?>
                    <?php $e_count++;
        $dd_count++;
    endwhile;?>
                </div>
                <?php }?>
                <?php
$ds_description = [];
$dds_count = 0;
if (have_rows('design_posts_content', $vehicle_id)) {?>
                <div class="tab-pane fade <?php if ($active_tab == 'ds_show') {
    echo "show active";
}?>" id="ds_show" role="tabpanel">
                    <?php
$e_count = 1;
    while (have_rows('design_posts_content', $vehicle_id)):
        the_row();
        $title = get_sub_field('title');
        $image = get_sub_field('image');
        if ($ds_show_modal_image == '') {
            $ds_show_modal_image = $image;
        }
        $description = get_sub_field('description');
        $ds_description[$dds_count]['title'] = $title;
        $ds_description[$dds_count]['description'] = $description;
        ?>
                    <?php if ($e_count == 1) {?>
                    <div class="row">
                        <?php }
        $show_in_list = get_sub_field('show_in_list');
        if ($show_in_list == true) {?>
                        <div class="col-md-4">
                            <div class="custom-card-main">
                                <button class="custom-card-button">
                                    <div class="custom-card-img">

                                        <img alt="" class="card-imgage" src="<?php echo $image; ?>">
                                    </div>
                                    <div class="custom-card-text-wrapper">
                                        <h4 class="custom-card-text"><?php echo $title; ?></h4>
                                        <div class="custom-learn-svg" data-bs-toggle="modal"
                                            data-bs-target="#view_feature">
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
                                            <?php echo $description; ?>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <?php }
        if ($e_count == 3) {?>
                    </div>
                    <?php $e_count = 0;
            $show_in_list = false;
            break;
        }?>
                    <?php $e_count++;
        $dds_count++;
    endwhile;?>
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
                <div class="custom-features-modal">
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
                                    <div>
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <?php if ($e_show == true) {?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" data-bs-toggle="pill"
                                                    data-bs-target="#modal-pills-Engine" type="button" role="tab"
                                                    aria-controls="pills-Engine" aria-selected="true">Engine</button>
                                            </li>
                                            <?php }?>
                                            <?php if ($c_show == true) {?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="pill"
                                                    data-bs-target="#modal-pills-chassis" type="button" role="tab"
                                                    aria-controls="pills-chassis" aria-selected="false">chassis
                                                </button>
                                            </li>
                                            <?php }?>

                                            <?php if ($d_show == true) {?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="pill"
                                                    data-bs-target="#modal-pills-drivetrain" type="button" role="t b" a
                                                    aria-controls="pills-drivetrain"
                                                    aria-selected="false">Drivetrain</button>
                                            </li>
                                            <?php }?>
                                            <?php if ($ds_show == true) {?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="pill"
                                                    data-bs-target="#modal-pills-Design" type="button" role="tab"
                                                    aria-controls="pills-Design" aria-selected="false">Design</button>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <?php if ($e_show == true) {?>
                                    <div class="custom-features-description-modal">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="custom-features-description-img">
                                                    <img class="img img-fluid" src="<?php echo $e_show_modal_image; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m_description">
                                                    <h2 class="m_title">Engine</h2>
                                                    <div class="description-some-text">
                                                        <?php foreach ($e_description as $content) {
    if ($content['title']) {
        echo '<h3 class="p_title">' . $content['title'] . '</h3>';
    }
    if ($content['description']) {
        echo "<div>";
        echo $content['description'];
        echo "</div>";
    }
}?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php }?>
                                    <?php if ($c_show == true) {?>
                                    <div class="custom-features-description-modal">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="custom-features-description-img">
                                                    <img class="img img-fluid" src="<?php echo $c_show_modal_image; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m_description">
                                                    <h2 class="m_title">Chassis</h2>
                                                    <div class="description-some-text">
                                                        <?php foreach ($c_description as $content) {
    if ($content['title']) {
        echo '<h3 class="p_title">' . $content['title'] . '</h3>';
    }
    if ($content['description']) {
        echo "<div>";
        echo $content['description'];
        echo "</div>";
    }

}?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php }?>
                                    <?php if ($d_show == true) {?>
                                    <div class="custom-features-description-modal">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="custom-features-description-img">
                                                    <img class="img img-fluid" src="<?php echo $d_show_modal_image; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m_description">
                                                    <h2 class="m_title">Drivetrain</h2>
                                                    <?php foreach ($d_description as $content) {
    if ($content['title']) {
        echo '<h3 class="p_title">' . $content['title'] . '</h3>';
    }
    if ($content['description']) {
        echo $content['description'];
    }

}?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php }?>
                                    <?php if ($ds_show == true) {?>
                                    <div class="custom-features-description-modal">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="custom-features-description-img">
                                                    <img class="img img-fluid"
                                                        src="<?php echo $ds_show_modal_image; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="m_description">
                                                    <h2 class="m_title">Design</h2>
                                                    <div class="description-some-text">
                                                        <?php foreach ($ds_description as $content) {
    if ($content['title']) {
        echo '<h3 class="p_title">' . $content['title'] . '</h3>';
    }
    if ($content['description']) {
        echo "<div>";
        echo $content['description'];
        echo "</div>";
    }
}?>
                                                    </div>
                                                </div>
                                            </div>

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
            </div>
            <div class="modal fade" id="view_feature" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class=" modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <?php
$s_e_show = get_field('s_e_show', $vehicle_id);
$s_e_image = get_field('s_e_image', $vehicle_id);
$s_e_title = get_field('s_e_title', $vehicle_id);
$s_e_short_title = get_field('s_e_short_title', $vehicle_id);
if ($s_e_show == true) {
    ?>
                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">
                                        <img src="<?php echo $s_e_image; ?>" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title"><?php echo $s_e_title; ?></h4>
                                    <p class="custom-specification-card-subtitle">
                                        <?php echo $s_e_short_title; ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php }
$s_d_show = get_field('s_d_show', $vehicle_id);
$s_d_image = get_field('s_d_image', $vehicle_id);
$s_d_title = get_field('s_d_title', $vehicle_id);
$s_d_short_title = get_field('s_d_short_title', $vehicle_id);
if ($s_d_show == true) {
    ?>
                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">

                                        <img src="<?php echo $s_d_image; ?>" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title"><?php echo $s_d_title; ?></h4>
                                    <p class="custom-specification-card-subtitle">
                                        <?php echo $s_d_short_title; ?>

                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php }
$s_c_show = get_field('s_c_show', $vehicle_id);
$s_c_image = get_field('s_c_image', $vehicle_id);
$s_c_title = get_field('s_c_title', $vehicle_id);
$s_c_short_title = get_field('s_c_short_title', $vehicle_id);
if ($s_c_show == true) {
    ?>
                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">

                                        <img src="<?php echo $s_c_image; ?>" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title"><?php echo $s_c_title; ?></h4>
                                    <p class="custom-specification-card-subtitle">
                                        <?php echo $s_c_short_title; ?>

                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php }
$dms_show = get_field('dms_show', $vehicle_id);
$dms_image = get_field('dms_image', $vehicle_id);
$dms_title = get_field('dms_title', $vehicle_id);
$dms_short_title = get_field('dms_short_title', $vehicle_id);
if ($dms_show == true) {
    ?>
                        <div class="col-md-3 p-0">
                            <div class="custom-specification-card">
                                <div class="custom-specification-card-content">
                                    <div class="custom-specification-card-img">

                                        <img src="<?php echo $dms_image; ?>" alt="img" class="img-fluid">
                                    </div class="custom-specification-card-content">
                                    <h4 class="custom-specification-card-title"><?php echo $dms_title; ?></h4>
                                    <p class="custom-specification-card-subtitle">
                                        <?php echo $dms_short_title; ?>

                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php }?>





                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-specification-button-modal">
                        <!-- Button trigger modal -->
                        <a href="" type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#view_all_specification">
                            View all specifications
                            <span class="custom-specification-card-svg">
                                <svg width="12" height="19" viewBox="0 0 12 19">
                                    <path class="svg"
                                        d="M2.081.12L.001 2.332l7.274 7.173L0 16.668l2.081 2.212 8.4-8.274 1.125-1.101-1.125-1.111z"
                                        fill="#FFF" fill-rule="nonzero"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div id="editor"></div>
                    <div class="custom-view-all-specification">
                        <div class="modal fade" id="view_all_specification" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class=" modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Specifications
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
$s_e_show = get_field('s_e_show', $vehicle_id);
$s_e_title = get_field('s_e_title', $vehicle_id);
$s_e_short_title = get_field('s_e_short_title', $vehicle_id);
$s_e_popup_content = get_field('s_e_popup_content', $vehicle_id);

if ($s_e_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">ENGINE</h2>
                                                <div class="mcard">
                                                    <?php echo $s_e_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php
$s_d_show = get_field('s_d_show', $vehicle_id);
$s_d_title = get_field('s_d_title', $vehicle_id);
$s_d_short_title = get_field('s_d_short_title', $vehicle_id);
$s_d_popup_content = get_field('s_d_popup_content', $vehicle_id);

if ($s_d_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">DRIVE TRAIN</h2>
                                                <div class="mcard">
                                                    <?php echo $s_d_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php
$s_c_show = get_field('s_c_show', $vehicle_id);
$s_c_title = get_field('s_c_title', $vehicle_id);
$s_c_short_title = get_field('s_c_short_title', $vehicle_id);
$s_c_popup_content = get_field('s_c_popup_content', $vehicle_id);

if ($s_c_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">CHASSIS/SUSPENSION/BRAKES</h2>
                                                <div class="mcard">
                                                    <?php echo $s_c_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php
$dms_show = get_field('dms_show', $vehicle_id);
$dms_title = get_field('dms_title', $vehicle_id);
$dms_short_title = get_field('dms_short_title', $vehicle_id);
$dms_popup_content = get_field('dms_popup_content', $vehicle_id);

if ($dms_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">DIMENSIONS</h2>
                                                <div class="mcard">
                                                    <?php echo $dms_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php
$other_show = get_field('other_show', $vehicle_id);

$other_popup_content = get_field('other_popup_content', $vehicle_id);

if ($other_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">OTHER</h2>
                                                <div class="mcard">
                                                    <?php echo $other_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php
$fwi_show = get_field('fwi_show', $vehicle_id);

$fwi_popup_content = get_field('fwi_popup_content', $vehicle_id);

if ($fwi_show == true) {
    ?>
                                        <div class="row">
                                            <div class="col-md-12 mscontent">
                                                <h2 class="title">FACTORY WARRANTY INFORMATION</h2>
                                                <div class="mcard">
                                                    <?php echo $fwi_popup_content; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="print_specifications btn btn-primary">PRINT YOUR
                                            ATV</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <div class="row">
		<div class="col-md-4">
		<div class="inner-connent">
		<h2>Stay<br>Connected</h2>
		</div>
		</div>
            <div class="col-md-8">
                <div class="contact-form-wrapper">
                    <h5 class="contact-form-title">
                        We'll keep you up to speed on all the latest AODES Talon news. Just fill in your information
                        here.
                    </h5>
                    <?php echo do_shortcode('[contact-form-7 id="8495" title="Category Listing Single Page Form"]'); ?>
                    <!--<div class="form" action="submit">
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
                </div>-->
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>