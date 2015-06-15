<?php get_header(); ?> 

	<section id="main" class="site-main" role="main">
		<div id="content_search">
			<div id="menu_filtre">
				<?php $categories = get_categories(array( 'taxonomy' => 'cat_creas', 'hide_empty' => 1, 'order' => 'ASC', 'orderby' => 'name')); ?>
				<?php foreach ($categories as $cat) {?>
					<?php $cat_menu = $cat->name;?>
					<div id="<?php echo $cat->name; ?>" class="btn_cat"><div id="<?php echo $cat->name; ?>_icon" class="cat_icon"></div><div class="cat_title"><?php echo $cat->name; ?></div></div>	 
				<?php } ?>
			</div>
			<div id="search_bar"><input type="text" id="quicksearch" placeholder="Chercher par mot-clé..." /></div>
		</div>
		<div id="catalogue">

			<?php $tagname = get_query_var('tag');?>
			
			<?php $catalogue = new WP_query(array('post_type' => 'creations', 'post_per_page' => -1));?>

			
			<?php if ($catalogue->have_posts()) : while($catalogue->have_posts()) : $catalogue->the_post(); //var_dump($catalogue);?>
				
				<?php if (has_tag($tagname)): ?>
					<?php 
						$terms = get_the_terms( get_the_ID(), 'cat_creas' );
						foreach ($terms as $tr) {
							$cat_name = $tr->name;
						};

						$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
	 					
					?> 
					<div class="creation_home <?php echo $cat_name ?>">
						<?php echo '<img class="img_crea" src="' . $image_src[0]  . '"class="thumb_home"  />'; ?>
						<div class="mask"></div>
						<div class="mask_box">
							<h3><?php the_title(); ?></h3>
							<div class="extrait">- <?php the_field('technique'); ?>,<span> <?php the_field('auteur'); ?> -</span></div>
							<a class="btn_show_more" href="<?php the_permalink() ?>"></a>
							<div id="tags"><?php the_tags(); ?></div>
						</div>
					</div>	
				<?php endif; ?>
			<?php endwhile; endif; wp_reset_query();?>
		</div>
	</section><!-- .site-main -->

<?php get_footer(); ?>
