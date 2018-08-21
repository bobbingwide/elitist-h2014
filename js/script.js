jQuery(document).ready(function($){
						 
			
			

			$("#supersized-loader").addClass("hidden");

			//Navigation Background Slider-------------->
			$("#controls ul li a").on('click', function(e){
				e.preventDefault();
			})

			$("#ss_fullscreen_button").toggle(function (event) { 
					$(this).toggleClass("ql_toggle");
					$("#controls li").not($(this).parent()).animate({opacity: 0});
					$("header").fadeOut();
				}, function () {
					$(this).toggleClass("ql_toggle");
					$("#controls li").not($(this).parent()).animate({opacity: 1});
					$("header").fadeIn();
				});


				$("#jp_play_pause").toggle(function (event) { 
					$(this).toggleClass("ql_toggle");
					$jquery_jplayer_1.jPlayer("pause");
				}, function () {
					$(this).toggleClass("ql_toggle");
					$jquery_jplayer_1.jPlayer("play");
				});


				
				$("#hide-button").toggle(function () { 
				  $(this).addClass("pause");
				  var $main = $("#main");
				  var $header = $("#header");
					var window_height = $(window).height();
					var header_height = $header.height();
					$main.animate({top: window_height - header_height, opacity: 0});
					$header.animate({top: - header_height, opacity: 0});
					$(this).addClass("btn_open");
			

				}, function () {
				  $(this).removeClass("pause");
				  	var $main = $("#main");
				  var $header = $("#header");
					var window_height = $(window).height();
					var header_height = $header.height();
					$main.animate({top:0, opacity: 1});
					$header.animate({top:'35%', opacity: 1});
					$(this).removeClass("btn_open");
				});
				
			//Thumbnails Tray---------------------------------------->
			$("ul#thumb-list li").each(function(index) {
			    $(this).append("<span />");
			});
			
			$("#tray-button").toggle(function () { 
				var $main = $("#main");
				var window_height = $(window).height();
				var header_height = $("#header").height();
					$main.animate({top: window_height - header_height, opacity: 0});
				}, function () {
				  	var $main = $("#main");
					var window_height = $(window).height();
					var header_height = $("#header").height();
					$main.animate({top:0, opacity: 1});
				});
			//-------------------------------------------------------<




			





			//Make Supersized pages works on iPhones------------->
			
			var window_w = $(window).width();
			var $body = $("body");
			var ql_height;
			if(window_w < 979){
				//console.log(window_w);
				//console.log($(window).height());
				$("#controls").appendTo("body");
				if(window_w < 321){
				ql_height = $(window).height() + $("#header").height() + 170;
				}else{
					ql_height = $(window).height();
				}
				$body.height(ql_height);
			}
			$(window).on("debouncedresize", function( event ) {
			
			});

			//-------------------------------------------------------<
		



			$("#jqueryslidemenu > .nav").tinyNav({
			  header: true // Show header instead of the active item
			});
			

			$(".collapse").collapse({
			  toggle: false,
			  parent: ".accordion"
			})


			//Accordion Icons (+ & -) Bootstrap-------------->
			$(".accordion .collapse").on("hide", function(){
				var $a_i = $(this).prev().find(".accordion-toggle").children("i");
					$a_i.removeClass("icon-minus").addClass("icon-plus");
			})
			$(".accordion .collapse").on("show", function(){
				var $a_i = $(this).prev().find(".accordion-toggle").children("i");
					$a_i.removeClass("icon-plus").addClass("icon-minus");
			})
			//End Accordion Icons (+ & -) Bootstrap--------------<
			

			$('.dropdown-toggle').dropdown();
			//Tabs for Bootstrap-------------->
			$('.ql_tabs a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})
			
			
			//Nav Menu for Bootstrap-------------->
			$(".jqueryslidemenu > ul > li > .children").each(function(index) {
			    $(this).parent("li").addClass("dropdown");
			    $(this).prev("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown').append('<b class="caret"></b>');
			    $(this).addClass("dropdown-menu");
			});
			$(".jqueryslidemenu > ul > li > .sub-menu").each(function(index) {
			    $(this).parent("li").addClass("dropdown");
			    $(this).prev("a").addClass("dropdown-toggle").attr('data-toggle', 'dropdown').append('<b class="caret"></b>');
			    $(this).addClass("dropdown-menu");
			});
			//Nav Menu for Bootstrap-------------->

			
	
			
			
			
			
		
			
			
			
			//Tooltips
			$("*[rel^='tooltip']").tooltip();
			 
			//Lightbox
			$("a[rel^='prettyPhoto']").prettyPhoto({show_title: false, social_tools: false});
			
			//Gallery
			//If link to an Image do Prettyphoto
			attach = $(".gallery dl dt a").attr('href');
			comp = /attachment_id/;
			if(!comp.test(attach)){
			$(".gallery dl dt a").prettyPhoto({show_title: false, social_tools: false});
			}
			//Add class image-frame
			$(".gallery dl dt a").each(function(index) {
													$(this).attr('rel', 'prettyPhoto[pp_gal]')
													$(this).children("img").addClass("box_b");
												});												
			

			
			
			//Quick Contact Form styling
			$(".quick_contact input").click(function(){
					$(this).next().fadeOut(100);
			});
			
			
			
			  
			//Sidebar Menu Function
			$('#sidebar .widget ul li ul').parent().addClass('hasChildren').append("<i class='icon-chevron-down'></i>");
			var children;
			$("#sidebar .widget ul li").hoverIntent(
										  function () {
											children = $(this).children("ul");
											if($(children).length > 0){
													$(children).stop(true, true).slideDown('fast');	   
											}
										  }, 
										  function () {
											  $(this).children('ul').stop(true, true).slideUp(500);
										  }
			);
			//Footer Menu Function
			$('footer .widget ul li ul').parent().addClass('hasChildren').children('a').append("<span />");
			var children;
			$("footer .widget ul li").hoverIntent(
										  function () {
											children = $(this).children("ul");
											if($(children).length > 0){
													$(children).stop(true, true).slideDown('fast');	   
											}
										  }, 
										  function () {
											  $(this).children('ul').stop(true, true).slideUp(500);
										  }
			);	
			

			
												

});//Dom ready
function stringToBoolean(string){
        switch(string.toLowerCase()){
                case "true": case "yes": case "1": return true;
                case "false": case "no": case "0": case null: return false;
                default: return Boolean(string);
        }
}