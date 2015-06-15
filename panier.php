<?php
/*
Template Name: panier
*/

get_header(); ?>

		<section id="main" class="site-main" role="main">

		<h1 id="panier_titre">Votre Butin</h1>

		<img id="panier_logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo_VGG.png">

		<?php 
			echo do_shortcode('[show_wp_shopping_cart]');

			$path = esc_url( home_url( '/' ) ); 

			$val = 'off';

			if (empty($_SESSION['simpleCart'])) {
        		$html .= '<div id="panier_vide">';
        		$html .= '<h1>Votre Butin est Vide !</h1>';
        		$html .= '<a href="'. $path .'" id="btn_back_home">Retour à la page d\'accueil</a>';
        		$html .= '</div>';
        		echo $html;
        		$val = 'on';
			};
			
		?>
		<script type="text/javascript">
		if('<?php echo $val ?>'=='on'){
			$("#panier_titre, #panier_logo").css('display','none');
		}
		</script>

		</section><!-- .site-main -->

<?php get_footer(); ?>
