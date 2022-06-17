<?php
/**
 * Page pour afficher la liste des membres de l'intranet.
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
    
    if ( have_posts() ) {
        
        while ( have_posts() ) {
            the_post();
            
            get_template_part('template-parts/content', 'utilisateurs');
        }
    }
    
    ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>
