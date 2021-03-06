<?php
/**
 * Page pour afficher la page Voyages.
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
    
    if ( have_posts() ) {
        
        while ( have_posts() ) {
            the_post();
            
            get_template_part('template-parts/content', 'voyages');
        }
    }
    
    ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>
