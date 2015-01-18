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
					            $output .= "  <a href='". $row['link_slide'] ."' target='_blank'>\n";
					            $output .= "  <img src='".$bgimg."' />\n";
					            $output .= "  <div class='block-text'>\n";
					            $output .= "  <h2>". $row['slide_heading'] ."</h2>\n";
					            $output .= "  " . $row['slide_text'];
					            $output .= "  </div></a>\n";
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

				<?php
					$args = array( 'post_type' => 'productos_destacados', 'posts_per_page' => 3 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					
					$rows = get_field('producto_destacado');
					if($rows) {
				 
				        foreach($rows as $row) {
				            // retrieve size 'large' for background image
				            $bgimg = $row['imagen_del_producto']['sizes']['large'];
				 
				            $output = "<div class='oneProduct'>\n";
				            $output .= "  <a href='". $row['enlace_producto'] ."' class='precio-producto' target='_blank'>\n";
				            $output .= "  <img src='".$bgimg."' /></a>\n";
				            $output .= "  <h2>". $row['nombre_del_producto'] ."</h2>\n";
				            $output .= "  <p>". $row['descripcion_del_producto'] ."</p>\n";
				            $output .= "  <p class='precio-producto'>". $row['precio_del_producto'] ." € <span>+IVA</span> </p>\n";
				            $output .= "  <div class='btn-buy'>\n";
				            $output .= "  <a href='". $row['enlace_producto'] ."' class='precio-producto'>Comprar</a>\n";
				            $output .= "  </div>\n";
				            $output .= "  </div>\r\n\n";
				 
				            echo $output;
				        }
					}
					endwhile;
				?>

			</div>

			<div class="dossier">
			    <?php while ( have_posts() ) : the_post();

			    $rows = get_field('dossier_comercial');

			    if($rows) {
			 	
			        foreach($rows as $row) {

			            $output = "<div class='dossierComercial'>\n";
			            $output .= "  <a href='". $row['enlace_del_dossier'] ."' target='_blank'>\n";
			            $output .= "  <h2>". $row['texto_del_enlace'] ."</h2>\n";
			            $output .= "  <img src='". get_bloginfo('url') ."/wp-content/uploads/2015/01/pdfimg.png' />\n";
			            $output .= "  </a></div>\r\n\n";
			            
			 
			            echo $output;
			        }
			    }
			 
			    endwhile; ?>
			</div>

			<div class="noticiaHome">
			    <?php while ( have_posts() ) : the_post();

			    $rows = get_field('noticia_destacada');

			    if($rows) {
			 	
			        foreach($rows as $row) {
			        	$bgimg = $row['imagen_noticia']['sizes']['large'];

			            $output  = "  <div class='noticiaImagen'>\n";
			            $output .= "  	<img src='".$bgimg."' />\n";
			            $output .= "  </div>\n";
			            $output .= "  <div class='noticiaInfo'>\n";
						$output .= "  	<h2>". $row['titulo_noticia'] ."</h2>\n";
						$output .= "  	<p>". $row['resumen_noticia'] ."<a href='". $row['enlace_noticia_completa'] ."'> Leer más </a></p>\n";
			            $output .= "  </div>\r\n\n";
			 
			            echo $output;
			        }
			    }
			 
			    endwhile; ?>
			</div>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>