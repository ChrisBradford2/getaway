<?php
/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

if ( (bool) get_the_author_meta( 'description' ) && (bool) get_theme_mod( 'show_author_bio', true ) ) : ?>
<div class="author-bio">
	<div class="author-title-wrapper">
		<!--<div class="author-avatar vcard">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
		</div>-->
		<h2 class="author-title heading-size-4">
			<?php
			printf(
				/* translators: %s: Author name. */
				__( 'By %s', 'twentytwenty' ),
				esc_html( get_the_author() )
			);
			?>
		</h2>
	</div><!-- .author-name -->
	<div class="author-description">
		<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php _e( 'View Archive <span aria-hidden="true">&rarr;</span>', 'twentytwenty' ); ?>
		</a>
		
		<!--Afficher les champs personnalisés-->
		
		<?php
			// Récupérer l'identifiant de l'utilisateur
			$utilisateur_id = get_the_author_meta('id');
			// Connaitre l'utilisateur par son identifiant
			$utilisateur = get_user_by('id',$utilisateur_id);
			// Utiliser la table wp_usermeta
			echo '<p>Service : ' .$utilisateur->service.'.</p>';
			echo '<p>Poste : ' .$utilisateur->poste.'.</p>';
			// Affichage de la photo
			$utilisateur_photo_id = $utilisateur->photo;
			echo '<p>'.wp_get_attachment_image( $utilisateur_photo_id, 'thumbnails').'</p>';
		?>
		
	</div><!-- .author-description -->
</div><!-- .author-bio -->
<?php endif; ?>
