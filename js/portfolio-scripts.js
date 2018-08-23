//Portfolio Script 1.0
//Author: Nico Andrade
//http://www.eneaa.com
jQuery(document).ready(function($) {
	
	/*Black & White hover effect */
	
	$("#container").on('hover', function(){
		$(this).find("#portfolio_container").removeClass("black_a_white");
	},function(){
		$(this).find("#portfolio_container").addClass("black_a_white");
	});
	
	/*---------------------------*/





	var $container_isotope = $('#portfolio_container');
	
	//Set height for loading gif
	$container_isotope.addClass("ql_height");

	$container_isotope.imagesLoaded( function( $images, $proper, $broken ) {

		$container_isotope.isotope({
			// options
			itemSelector : '.portfolio_item',
			layoutMode : 'masonry',
			resizable : false,
			transformsEnabled : true,

			getSortData : {
			  // ...
			  year : function ( $elem ) {
			    return parseInt( $elem.attr('data-year'));
			  }

			}
		});//isotope

		//$container_isotope.isotope({ sortBy : 'year' });

		//Resize Items at start
		resizeItems();

		//Remove loading gif
		$container_isotope.removeClass("ql_height");
		$(".preloader").fadeOut('slow');


		$('.filter_list').appendTo("#filter_lists");

		// filter items when filter link is clicked
		$('.filter_list a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container_isotope.isotope({ filter: selector });
		  var $parent = $(this).parents(".filter_list");
		  $parent.find(".active").removeClass('active');
		  $(".filter_list").not($parent).find("li").removeClass('active').first().addClass("active");
		  $(this).parent().addClass("active");
		  return false;
		});


		function getItemWidth(){
			var columns = 4;
			var window_width = $(window).width();
			
			if(window_width >=2100){
				columns = 6;
			}else if(window_width >=1600 && window_width <2100){
				columns = 5;
			}else if(window_width >=1400 && window_width <1600){
				columns = 5;
			}else if(window_width >=1100 && window_width <1400){
				columns = 4;
			}else if(window_width >=481 && window_width <1100){
				columns = 2;
			}else if(window_width <481){
				columns = 1;
			}
			 //console.log("Window:"+window_width);
			 //console.log("Columns:"+columns);
			return Math.floor( $container_isotope.width() / columns);
		} 


		
		function resizeItems(){
			var item_width = getItemWidth();
			$(".portfolio_item").each(function(index){
				$(this).css('width', item_width+'px');
			});
			$container_isotope.isotope('reLayout'); 
		}



		$(window).on("debouncedresize", function( event ) {
		    resizeItems();

		});



	});//images loaded




});