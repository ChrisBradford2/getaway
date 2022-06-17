<?php

/**
 * Template for travels.
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php

    get_template_part('template-parts/entry-header');

    if (!is_search()) {
        get_template_part('template-parts/featured-image');
    }

    ?>

    <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

        <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

            <div class="entry-content">

                <h3 style="text-align: center;">Liste des voyages en projet</h3>

                <?php
                    $loop_travel = new WP_Query( array('post_type' => 'voyages', 'posts_per_page' =>  '10' ));
                    while ($loop_travel->have_posts()) : $loop_travel->the_post();
                        // Display title.
                        the_title('<h4 class="entry-title">', '</h4>');
                        // Display custom fields.
                        echo '<ul>';
                        $user_obj = get_user_by('id', get_field('responsable'))->display_name;
                        echo '<li><strong>Responsable</strong> : '. $user_obj.'</li>';
                        echo '<li><strong>Destination</strong> : '.get_field('destination').'</li>';
                        echo '<li><strong>Date d\'arrivée</strong> : '.get_field('arrive').'</li>';
                        echo '<li><strong>Date de retour</strong> : '.get_field('retour').'</li>';
                        $options = get_field('options');
                        echo '<li><strong>Options</strong> : '.implode(', ', $options).'</li>';
                        echo '</ul>';
                        echo '<p><strong>Informations supplémentaires</strong> :</p>'.get_field('information');
                        $validation = get_field('validation');
                        if ($validation) {
                            echo '<p style="color: darkgreen; font-weight: bold;">Le voyage est validé</p>';
                        }
                        echo '<hr>';
                    endwhile;
                    wp_reset_query();
                ?>

            </div><!-- .entry-content -->

        </div><!-- .post-inner -->

        <div class="section-inner">
            <?php
            wp_link_pages(
                array(
                    'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
                    'after'       => '</nav>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                )
            );

            edit_post_link();

            // Single bottom post meta.
            twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

            if (post_type_supports(get_post_type(get_the_ID()), 'author') && is_single()) {

                get_template_part('template-parts/entry-author-bio');
            }
            ?>

        </div><!-- .section-inner -->

        <?php

        if (is_single()) {

            get_template_part('template-parts/navigation');
        }

        /*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
        if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
        ?>

            <div class="comments-wrapper section-inner">

                <?php comments_template(); ?>

            </div><!-- .comments-wrapper -->

        <?php
        }
        ?>

</article><!-- .post -->