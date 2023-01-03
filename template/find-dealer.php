<?php
/**
 * comment for template*
 * Template Name: Find Dealer
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="find-dealer-page">
        <div class="container-xxxl container-xxl container">
            <h1 class="f_title">FIND DEALER</h1>
            <?php echo do_shortcode('[ASL_STORELOCATOR]'); ;?>

    </div>
</section>

<?php get_footer(); ?>