<?php get_header(); ?>
	<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'fr'}</script>
	<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=694663167266827&version=v2.0";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
	<div id="fb-root"></div>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<script type="text/javascript" async defer  data-pin-color="red" data-pin-height="28" data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>
	
		<section id="main" class="site-main">
			<div id="box_title">
				<h2><?php the_title(); ?></h2>
				<h3>- <?php the_field('auteur');?> -</h3>
			</div>
			<div id="content_cols">
				<div id="col_left" class="single_cols">
					<?php 
						while ( have_posts() ) : the_post();
						$image_src2 = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
						echo '<img src="' . $image_src2[0]  . '"class="img_gallerie"  />'; 	
					?>	
				</div>
				<div id="col_right" class="single_cols">
					<?php 
						$str_stock; 
						$stock = get_field('stock'); 
						if ($stock==1){
							$str_stock = ' exemplaire';
						}else{
							$str_stock = ' exemplaires';
						};

						$wpbtags =  wp_get_post_tags($post->ID);
						$name = get_the_title();
						$fdp = get_field('frais_de_port');
					?>
					<p><span><?php the_field('technique'); ?></span></p>
					<p><span>Quantité disponible: </span><?php the_field('stock'); echo $str_stock;?></p>
					<p><span>Description:<span></p>
					<p><?php the_content(); ?></p>
					<p><span>Note de l’auteur:<span></p>
					<p><?php the_field('note_de_lauteur'); ?></p>
					<ul id="single_list_tag">
						<?php
							foreach ($wpbtags as $tag) {
								echo '<li class="single_tag"><a class="tag_link" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a></li>';
							};
						?>
					</ul>
					<div id="content_prix">
						<h3>VOTRE PRIX SERA LE NOTRE</h3>
						<div id="box_prix">
							<input id="set_prix_font" type="text" name="set_prix_font" value="0.10" />
							<div id="btn_set_prix">Valider Prix</div>
						</div>
							
						<?php echo do_shortcode('[wp_cart_button name="'.$name.'" shipping="'.$fdp.'"]');?>
					</div>
					
					<div id="socio">
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="fr" data-count="none">Tweeter</a>
						<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button"></div>
						<div class="g-plus" data-action="share" data-annotation="none" data-height="24"></div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div id="attch">
				<img src="<?php the_field('image_1'); ?>" class="img_gallerie" alt="" />
				<img src="<?php the_field('image_2'); ?>" class="img_gallerie" alt="" />
				<img src="<?php the_field('image_3'); ?>" class="img_gallerie" alt="" />
			</div>
		</section><!-- .site-main -->

<?php get_footer(); ?>

