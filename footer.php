		<footer id="footer" class="site_footer">
			<div id="logo_box">
				<div id="pie"></div>
			</div>
			<div id="info_box">
				<div id="main_footer">
				<div id="col1" class="cols">
					<h4>INFORMATIONS</h4>
					<a href="#">livraison</a>
					<a href="#">FAQ</a>
					<a href="#">Mentions Legales</a>
					<a href="#">Conditions Génerales de Vente</a>
					<a href="#">Payement Sécurisé:</a>
					<div id="icon_pay"></div>
				</div>
				<div id="col2" class="cols">
					<h4>DECOUVRIR</h4>
					<?php $categories = get_categories(array( 'taxonomy' => 'cat_creas', 'hide_empty' => 1, 'order' => 'ASC', 'orderby' => 'name')); ?>
					<?php foreach ($categories as $cat) {?>
						<?php $cat_menu = $cat->name;?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>#main" id="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>	 
					<?php } ?>
				</div>
				<div id="col3" class="cols">
					<h4>CONTACT</h4>
					<a href="#">videgreniergraphique@mail.fr</a>
					<div id="nl">NEWSLETTERS:</div>
					<input type="text" id="new_letter" placeholder="Votre E-mail..." />
				</div>		
			</div>
			<div id="cr">LE VIDE GRENIER GRAPHIQUE ,  all rights reserved.</div>
			</div>
			
		</footer><!-- .site-footer -->
	</body>
</html>
