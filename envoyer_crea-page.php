<?php
/*
Template Name: envoyer_crea
*/

get_header();?>

		<section id="main" class="site-main" role="main">
			<div id="cont_env_crea">

				<?php if (have_posts()) : while (have_posts()) : the_post();?>

				<h1>Soumettre une Création</h1>

				<?php the_content();?>

				<?php endwhile; endif; ?>
			</div>			
		</section><!-- .site-main -->

<?php get_footer(); ?>