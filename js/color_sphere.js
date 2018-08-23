// JavaScript Document
/* DHTML Color Sphere : v1.0.2 : 2008/04/17 */
/* http://www.colorjack.com/software/dhtml+color+sphere.html */

function $J(v,o) { return((typeof(o)=='object'?o:document).getElementById(v)); }
function $S(o) { o=$J(o); if(o) return(o.style); }
function abPos(o) { var o=(typeof(o)=='object'?o:$J(o)), z={X:0,Y:0}; while(o!=null) { z.X+=o.offsetLeft; z.Y+=o.offsetTop; o=o.offsetParent; }; return(z); }
function agent(v) { return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0)); }
function isset(v) { return((typeof(v)=='undefined' || v.length==0)?false:true); }
function toggle(i,t,xy) { var v=$S(i); v.display=t?t:(v.display=='none'?'block':'none'); if(xy) { v.left=xy[0]; v.top=xy[1]; } }
function XY(e,v) { var o=agent('msie')?{'X':event.clientX+document.documentElement.scrollLeft,'Y':event.clientY+document.documentElement.scrollTop}:{'X':e.pageX,'Y':e.pageY}; return(v?o[v]:o); }
function zero(n) { return(!isNaN(n=parseFloat(n))?n:0); }
function zindex(d) { d.style.zIndex=zINDEX++; }


/* COLOR PICKER */

Picker={};

Picker.stop=1;

Picker.core=function(o,e,xy,z,fu) {

	function point(a,b,e) { eZ=XY(e); commit([eZ.X+a,eZ.Y+b]); }
	function M(v,a,z) { return(Math.max(!isNaN(z)?z:0,!isNaN(a)?Math.min(a,v):v)); }

	function commit(v) { if(fu) fu(v);
	
		if(o=='mCur') { var W=parseInt($S('mSpec').width), W2=W/2, W3=W2/2; 

			var x=v[0]-W2-3, y=W-v[1]-W2+21, SV=Math.sqrt(Math.pow(x,2)+Math.pow(y,2)), hue=Math.atan2(x,y)/(Math.PI*2);

			Picker.hsv={'H':hue>0?(hue*360):((hue*360)+360), 'S':SV<W3?(SV/W3)*100:100, 'V':SV>=W3?Math.max(0,1-((SV-W3)/(W2-W3)))*100:100};

			$J('mHEX').innerHTML=color.HSV_HEX(Picker.hsv);

				if (color_target == 1) {
			
					jQuery("body").css('background-color', '#'+$J('mHEX').innerHTML );
				}else if (color_target == 2){
/*
					var css = document.createElement("style");
					css.type = "text/css";
					css.class = "text";
					css.innerHTML = "#header{background-color:#"+$J('mHEX').innerHTML+"!important;}";
					$("body").children("<link>:last").remove();
					document.body.appendChild(css);
					*/
					
					var style_output = "footer h4, #sidebar .widget h4, .masonry_item .masonry_desc, .title_underline, article,.page_title,.single .metadata,#footer h4,.ql_tagline,.ql_underline_title,#header,#sidebar .widget h4,.filter_list h4,.sub_footer_wrap{border-bottom-color: #"+$J('mHEX').innerHTML+"!important;}";
						style_output = style_output + ".entry,.metadata,#header,.portfolio_item .ql_hover .short_line,.portfolio_post,.portfolioItem_sidebar,.footer_wrap,.sub_footer_wrap{border-top-color: #"+$J('mHEX').innerHTML+"!important;}";
						style_output = style_output + ".service_item .service_icon i,.circle_service:hover .circle_icon,ul.fancy_tags li a,.pagination .active a,.pagination a:hover,.more-link,#respond input, #contact-form input,#respond .add-on, #contact-form .add-on,#respond #submit-respond, #contact-form #submit-form,.btn-cta,.simple_btn,.portfolio_item a .ql_hover .p_icon,ul.source li.active a,#sidebar .widget > ul li > a:hover,#sidebar .widget_tag ul li a{background-color: #"+$J('mHEX').innerHTML+"!important;}";
						style_output = style_output + ".service_item:hover .service_icon i,.circle_service:hover h3,.post_title h3 a:hover,.post_icon i,.metadata ul li:hover i,.metadata ul li a:hover,ul.fancy_tags li a:hover,.pagination a,.more-link:hover,#respond #submit-respond:hover, #contact-form #submit-form:hover,.widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a,footer .twitter_widget ul li i,.contact_info .contact_info li i,footer .quick_contact .form input,footer .quick_contact .form textarea,.simple_btn:hover,h2.intro_line strong,#header .jqueryslidemenu > ul > li > a:hover,#header .jqueryslidemenu > ul > .current_page_item > a,#header .jqueryslidemenu > ul > .current_page_parent > a,.filter_list ul li a:hover,.filter_list ul li.active a,ul.source li a:hover,ul.source li.active a:hover,#sidebar .widget ul li > a:hover,#sidebar .twitter_widget ul li i,#sidebar .widget_recent_comments ul li:before,#sidebar .widget_recent_comments ul li i,#sidebar .widget_recent_comments ul li a:hover,#sidebar .widget_tag ul li a:hover,.widget_search i{color: #"+$J('mHEX').innerHTML+"!important;}";
						style_output = style_output + "#respond .add-on,.service_item .service_icon i,.pagination a,#respond input, #contact-form input,#respond textarea, #contact-form textarea,#respond .add-on, #contact-form .add-on,footer .quick_contact .form input:focus,footer .quick_contact .form textarea:focus,.portfolio_item a .ql_hover,.widget_search #s:focus,.widget_post_tabs .nav-tabs > .active > a:hover,.widget_post_tabs .tab-content{border-color: #"+$J('mHEX').innerHTML+"!important;}";
						style_output = style_output + ".widget_post_tabs .nav-tabs > .active > a{border-color: #"+$J('mHEX').innerHTML+"  #"+$J('mHEX').innerHTML+" transparent!important;};";















					jQuery(".color_t").html(style_output);
						
					//$("#header").css('background-color', '#'+$J('mHEX').innerHTML+'!important' );
					

				}else if (color_target == 3){
					jQuery("body").css('color', '#'+$J('mHEX').innerHTML );
					




					var style_output = ".logo_container h1 a,#footer h4,#footer ul li > a:hover, footer ol li > a:hover,.filter_list h4,.sub_footer_wrap,#footer p, #footer ul, #footer ol,#footer ul li > a, footer ol li > a,.metadata ul li strong,.portfolio_item .ql_hover h2{color: #"+$J('mHEX').innerHTML+"!important;}";
					jQuery(".color_t2").html(style_output);
				};
			
			
						
			
			color.cords(W);

		}
		else if(o=='mSize') { var b=Math.max(Math.max(v[0],v[1])+oH,75); color.cords(b);

			$S('mini').height=(b+28)+'px'; $S('mini').width=(b+20)+'px';
			$S('mSpec').height=b+'px'; $S('mSpec').width=b+'px';

		}
		else {
		
			if(xy) v=[M(v[0],xy[0],xy[2]), M(v[1],xy[1],xy[3])]; // XY LIMIT

			if(!xy || xy[0]) d.left=v[0]+'px'; if(!xy || xy[1]) d.top=v[1]+'px';

		}
	};

	if(Picker.stop) { Picker.stop=''; var d=$S(o), eZ=XY(e); if(!z) zindex($J(o));

		if(o=='mCur') { var ab=abPos($J(o).parentNode); point(-(ab.X-5),-(ab.Y-28),e); }
		
		if(o=='mSize') { var oH=parseInt($S('mSpec').height), oX=-XY(e).X, oY=-XY(e).Y; }
		
		else { var oX=zero(d.left)-eZ.X, oY=zero(d.top)-eZ.Y; }

		document.onmousemove=function(e){ if(!Picker.stop) point(oX,oY,e); };
		document.onmouseup=function(){ Picker.stop=1; document.onmousemove=''; document.onmouseup=''; };

	}
};

Picker.hsv={H:0, S:0, V:100};

zINDEX=2;


/* COLOR LIBRARY */

color={};

color.cords=function(W) {

	var W2=W/2, rad=(Picker.hsv.H/360)*(Math.PI*2), hyp=(Picker.hsv.S+(100-Picker.hsv.V))/100*(W2/2);

	$S('mCur').left=Math.round(Math.abs(Math.round(Math.sin(rad)*hyp)+W2+3))+'px';
	$S('mCur').top=Math.round(Math.abs(Math.round(Math.cos(rad)*hyp)-W2-21))+'px';

};

color.HEX=function(o) { o=Math.round(Math.min(Math.max(0,o),255));

    return("0123456789ABCDEF".charAt((o-o%16)/16)+"0123456789ABCDEF".charAt(o%16));

};

color.RGB_HEX=function(o) { var fu=color.HEX; return(fu(o.R)+fu(o.G)+fu(o.B)); };

color.HSV_RGB=function(o) {
    
    var R, G, A, B, C, S=o.S/100, V=o.V/100, H=o.H/360;

    if(S>0) { if(H>=1) H=0;

        H=6*H; F=H-Math.floor(H);
        A=Math.round(255*V*(1-S));
        B=Math.round(255*V*(1-(S*F)));
        C=Math.round(255*V*(1-(S*(1-F))));
        V=Math.round(255*V); 

        switch(Math.floor(H)) {

            case 0: R=V; G=C; B=A; break;
            case 1: R=B; G=V; B=A; break;
            case 2: R=A; G=V; B=C; break;
            case 3: R=A; G=B; B=V; break;
            case 4: R=C; G=A; B=V; break;
            case 5: R=V; G=A; B=B; break;

        }

        return({'R':R?R:0, 'G':G?G:0, 'B':B?B:0, 'A':1});

    }
    else return({'R':(V=Math.round(V*255)), 'G':V, 'B':V, 'A':1});

};

color.HSV_HEX=function(o) { return(color.RGB_HEX(color.HSV_RGB(o))); };