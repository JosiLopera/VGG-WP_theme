<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		
		<?php $num_items = wpspc_get_total_cart_qty(); ?>

		<?php $args = array(
			'smallest'                  => 15, 
			'largest'                   => 30,
			'unit'                      => 'px', 
			'number'                    => 0,  
			'format'                    => 'list',
			'separator'                 => "\n",
			'orderby'                   => 'name', 
			'order'                     => 'RAND',
			'exclude'                   => null, 
			'include'                   => null, 
			'topic_count_text_callback' => default_topic_count_text,
			'link'                      => 'view', 
			'taxonomy'                  => 'post_tag', 
			'echo'                      => true,
			'child_of'                  => null, // see Note!
		); ?>

		<div class="menu_right">
			<div id="hover_col1">
				<div class="hover_a">ENVOYER<span>UNE CREATION</span></div>
				<div class="hover_a">REGARDER<span>LE CATALOGUE</span></div>
				<div class="hover_a">COMMENT<span>ÇA MARCHE?</span></div>
				<div class="hover_a">FAQ</div>
			</div>
			<div id="hover_col2">
				<div class="hover_a">RETROUVER<span>UNE CREATION</span></div>
				<?php wp_tag_cloud($args); ?>
			</div>
		</div>

		<nav class="nav">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
			<div class="menu" data-state="off">
				<a href="envoyer-une-creation/" class="menu_elem"><div class="a">ENVOYER<span>UNE CREATION</span></div><div class="nav_icon" id="m_crea"></div></a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#main" class="menu_elem"><div class="a">REGARDER<span>LE CATALOGUE</span></div><div class="nav_icon" id="m_cata"></div></a>
				<a href="envoyer-une-creation/" class="menu_elem"><div class="a">COMMENT<span>ÇA MARCHE?</span></div><div class="nav_icon" id="m_cmnt"></div></a>
				<a href="envoyer-une-creation/" class="menu_elem"><div class="a">FAQ</div><div class="nav_icon" id="m_faq"></div></a>
				<a href="checkout/" class="menu_elem_panier" ><div class="a_panier">BUTIN</div><div class="nav_icon" id="m_panier"></div><div id="compt_panier"><?php echo $num_items; ?></div></a>
			</div>
		</nav>

		<header id="header">
		
			<div id="title1">DENICHEZ DES PARLES GRAPHIQUES SORTIES DU GRENIER PAR LEURS CREATEURS ET RECEVEZ LES CHEZ VOUS...</div>
			<div id="title2">AU PRIX QUE VOUS DESIREZ !</div>
			
		</header>