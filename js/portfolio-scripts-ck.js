//Portfolio Script 1.0
//Author: Nico Andrade
//http://www.eneaa.com
jQuery(document).ready(function(e){e("#container").on("hover",function(){e(this).find("#portfolio_container").removeClass("black_a_white")},function(){e(this).find("#portfolio_container").addClass("black_a_white")});var t=e("#portfolio_container");t.addClass("ql_height");t.imagesLoaded(function(n,r,i){function s(){var n=4,r=e(window).width();r>=2100?n=5:r>=1600&&r<2100?n=4:r>=1400&&r<1600?n=4:r>=1100&&r<1400?n=3:r>=481&&r<1100?n=2:r<481&&(n=1);return Math.floor(t.width()/n)}function o(){var n=s();e(".portfolio_item").each(function(t){e(this).css("width",n+"px")});t.isotope("reLayout")}t.isotope({itemSelector:".portfolio_item",layoutMode:"masonry",resizable:!1,transformsEnabled:!0,getSortData:{year:function(e){return parseInt(e.attr("data-year"))}}});o();t.removeClass("ql_height");e(".preloader").fadeOut("slow");e(".filter_list").appendTo("#filter_lists");e(".filter_list a").click(function(){var n=e(this).attr("data-filter");t.isotope({filter:n});var r=e(this).parents(".filter_list");r.find(".active").removeClass("active");e(".filter_list").not(r).find("li").removeClass("active").first().addClass("active");e(this).parent().addClass("active");return!1});e(window).on("debouncedresize",function(e){o()})})});