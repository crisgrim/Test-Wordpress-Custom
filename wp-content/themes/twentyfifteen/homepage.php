<?php
/*
Template Name: Homepage
*/
?>


<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

					</header><!-- .entry-header -->

					<div class="flexslider">
					    <ul id="mySlider" class="slides">
					    <?php
					    $rows = get_field('slide');
					    if($rows) {
					 
					        foreach($rows as $row) {
					            // retrieve size 'large' for background image
					            $bgimg = $row['bg_image']['sizes']['large'];
					 
					            $output = "<li class='oneSlide'>\n";
					            $output .= "  <div class='slide-text'>\n";
					            $output .= "  <img src='".$bgimg."' />\n";
					            $output .= "  <div class='block-text'>\n";
					            $output .= "  <h2>". $row['slide_heading'] ."</h2>\n";
					            $output .= "  " . $row['slide_text'];
					            $output .= "  </div>\n";
					            $output .= "  </div>\n";
					            $output .= "</li>\r\n\n";
					 
					            echo $output;
					        }
					    }
					 
					    ?>
					    </ul>
					</div>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
			<?php endwhile; ?>

			<div class="productos-destacados">
			<!--
				<?php
					$terms = get_the_terms( $post->ID, 'productos_home' );

					if ( $terms && ! is_wp_error( $terms ) ) :

					   $tags = array();

					   foreach ( $terms as $term ) {
					      $tags[] = $term->name;
					   }

					   $tags = join( ", ", $tags );

					   ?>
				   <p>Actors: <span><?php echo $tags; ?></span></p>
				<?php endif; ?>
			-->
			<!--
				<?php
					$args = array(
						'post_type' => 'productos_destacados',
						'tax_query' => array(
							array(
								'taxonomy' => 'productos_home'
							),
						),
					);
					$query = new WP_Query( $args );
					while ($query->have_posts()) : $query->the_post();
				?>
				<?php the_content( $more_link_text, $stripteaser ); ?>
				<?php endwhile; ?>
			-->
			<?php
				$args = array( 'post_type' => 'productos_destacados', 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
				}
				  the_title();
				  echo '<div class="entry-content">';
				  the_content();
				  echo '</div>';
				endwhile;
			?>
			</div>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>