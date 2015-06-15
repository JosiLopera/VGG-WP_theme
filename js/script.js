$(document).ready(function(){

	//--------------------------------------------------

	$("#menu_filtre").prepend('<div id="All" class="btn_cat"><div id="All_icon" class="cat_icon cat_icon_on"></div><div class="cat_title cat_title_on">Vrac</div></div>');

	var win_height = $(window).height();

	$(".menu_right").css('height', win_height);

	var qsRegex;

	var $container = $('#catalogue');
	
	$container.isotope({
		itemSelector: '.creation_home',
		layoutMode: 'masonry',
		filter: function() {
			return qsRegex ? $(this).text().match( qsRegex ) : true;
		}
	});

	setTimeout(function(){
		$("#catalogue").isotope( 'layout' );
		$(".creation_home").each(function(){
			var img_size = $(this).height()/4;
			$(this).find(".mask_box").css("padding-top",img_size);
		});
	},100);

	var $quicksearch = $('#quicksearch').keyup( debounce( function() {
		if (($('#quicksearch').val())!="") {
			$(".cat_title").removeClass('cat_title_on');
			$(".cat_icon").removeClass('cat_icon_on');
		}else{
            if ($(".cat_title:not(.cat_title_on)") && $(".cat_icon:not(.cat_icon_on)")) {
                $("#All").find(".cat_title").addClass('cat_title_on');
				$("#All").find(".cat_icon").addClass('cat_icon_on');
            };
        };

		qsRegex = new RegExp( $quicksearch.val(), 'gi' );
		$container.isotope({
			filter: function() {
				return qsRegex ? $(this).text().match( qsRegex ) : true;
			}
		});
	}, 200 ) );

	function debounce( fn, threshold ) {
		var timeout;
		return function debounced() {
			if ( timeout ) {
				clearTimeout( timeout );
			}
			function delayed() {
				fn();
				timeout = null;
			}
			timeout = setTimeout( delayed, threshold || 100 );
		}
	}

	var $container2 = $('#main_footer');
		// init
		$container2.isotope({
		// options
		itemSelector: '.cols',
		layoutMode: 'masonry'
	});


	$("#Curiosity").on('click', function(){
		$container.isotope({ filter: '.Curiosity' });
		$("#quicksearch").val('');
	});

	$("#Stickers").on('click', function(){
		$container.isotope({ filter: '.Stickers' });
		$("#quicksearch").val('');
	});

	$("#Flyers").on('click', function(){
		$container.isotope({ filter: '.Flyers' });
		$("#quicksearch").val('');
	});

	$("#Affiches").on('click', function(){
		$container.isotope({ filter: '.Affiches' });
		$("#quicksearch").val('');
	});

	$("#CD-Vynile").on('click', function(){
		$container.isotope({ filter: '.CD-Vynile' });
		$("#quicksearch").val('');
	});

	$("#All").on('click', function(){
		$container.isotope({ filter: '*' });
		$("#quicksearch").val('');
	});

	$("#btn_set_prix").on('click',function(){
		var prix = $("#set_prix_font").val();
		if (prix == "" || prix < 0) {
			$("#msn_error, #msn_ok").remove();
			$("#content_prix").append('<div id="msn_error">Exemple: 0.10 - 1 - 5.60 - 29.30</div>');
		}else{
			$("#msn_error, #msn_ok").remove();
			$("#content_prix").append('<div id="msn_ok">Prix validé !</div>');
			$("input[name='price']").val(prix);
		};
		
	});

	$(".btn_cat").on('click', function(){
		$(".cat_title").removeClass('cat_title_on');
		$(".cat_icon").removeClass('cat_icon_on');
		$(this).find(".cat_title").addClass('cat_title_on');
		$(this).find(".cat_icon").addClass('cat_icon_on');
	});



	//------------------- SCROLL -----------------

	$(window).on('scroll', function() { 
		
		windowScroll = $(document).scrollTop();

		if (windowScroll>100) {
			$(".nav").addClass("nav_on");
			$(".logo").addClass("logo_on");
			$(".menu").addClass("menu_on");
			$(".a_panier").addClass("a_panier_on");
			$(".menu_elem").addClass("menu_elem_on");
			$(".menu_elem_panier").addClass("menu_elem_panier_on");
			$("#m_panier").css({"width":"45px","height":"45px;"});
			if ($(".menu").attr("data-state")=='off') {
				$(".menu").append('<div id="burguer" data-state="off"></div>');
				$(".menu").attr("data-state","on");
			};
		}else{
			$(".nav").removeClass("nav_on");
			$(".logo").removeClass("logo_on");
			$(".menu").removeClass("menu_on");
			setTimeout(function(){
				$(".a_panier").removeClass("a_panier_on");	
			},500);
			$(".menu_elem").removeClass("menu_elem_on");
			$(".menu_elem_panier").removeClass("menu_elem_panier_on");
			$("#m_panier").css({"width":"50px","height":"50px;"});
			$(".menu_right").removeClass('menu_right_on');
			$("#burguer").attr('data-state','off');
			$('header,section,footer').css({'-webkit-filter': 'blur(0)'});
			if ($(".menu").attr("data-state")=='on') {
				$("#burguer").remove();
				$(".menu").attr("data-state","off");
			};
		};
	});

	$(document).on('click', "#burguer", function(){
		if ($("#burguer").attr('data-state')=='off') {
			$("#burguer").css('background-position', '0 100%');
			$(".menu_right").addClass('menu_right_on');
			$('header,section,footer').css({'-webkit-filter': 'blur(5px)'});
			$("#burguer").attr('data-state','on');
		}else{
			$("#burguer").css('background-position', '0 0');
			$(".menu_right").removeClass('menu_right_on');
			$("#burguer").attr('data-state','off');
			$('header,section,footer').css({'-webkit-filter': 'blur(0)'});
		};
				
	});

	$("#gform_submit_button_1").val("ENVOYER UNE CREATION");

});