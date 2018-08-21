$(document).ready(function() {

						    	
	$("#shortcode").change(function(){
							var selected = $("#shortcode option:selected");
							
							//Hide the rest of the layouts
							$(".shortcode-div").css('display', 'none');
							$("#output-div").css('display', 'none');
							//Show the selected one
							$("#"+selected.val()).fadeIn(); 
						});
	
	
	var span_all = $("#column-controls span");
	var columns_touse;
	var layout_checked;
	//Apply styles when select a column layout
	span_all.click(function(){
							span_all.css('background-color', '#f9fafa');
							$(this).css('background-color', '#ccc');
							
							layout_checked = $("#columns"+selected.val()+" input:checked");
							//Numbers of Columns to display
							columns_touse = $(layout_checked).attr('data');
							
							//All the textareas for the columns
							var textareas = $(".column-content");
							textareas.css('display', 'none');
							
							//Show the numbers of textareas = number of columns selected
							for(i = 0; i < columns_touse; i++){
								$(textareas[i]).fadeIn();
							}

					});
	var icons = $("#icons_list img"), icon_selected;
	icons.click(function(){
							icons.removeClass('image-frame');
							$(this).addClass('image-frame');
							
							icon_selected = $(this);

					});
	
	var selected;
	//Show wich layou is selected
	$("#column").change(function(){
							selected = $("#column option:selected");
							
							//Hide the rest of the layouts
							$(".columns-layouts").css('display', 'none');
							//Show the selected one
							$("#columns"+selected.val()).fadeIn(); 
						});
	
	
	
	$("#view_code_columns").click(function(e){
							 e.preventDefault();
							var open_tag, close_tag, final_close_tag, final_open_tag;
							switch(selected.val()){
								case '2':
									open_tag = "[one_half]";
									close_tag = "[/one_half]";
									final_open_tag = "[one_half_last]";
									final_close_tag = "[/one_half_last]";
								break;
								case '3':
									open_tag = "[one_third]";
									close_tag = "[/one_third]";
									final_open_tag = "[one_third_last]";
									final_close_tag = "[/one_third_last]";
								break;
								case '4':
									open_tag = "[one_fourth]";
									close_tag = "[/one_fourth]";
									final_open_tag = "[one_fourth_last]";
									final_close_tag = "[/one_fourth_last]";
								break;
								case '5':
									open_tag = "[one_fifth]";
									close_tag = "[/one_fifth]";
									final_open_tag = "[one_fifth_last]";
									final_close_tag = "[/one_fifth_last]";
								break;
								case '6':
									open_tag = "[one_sixth]";
									close_tag = "[/one_sixth]";
									final_open_tag = "[one_sixth_last]";
									final_close_tag = "[/one_sixth_last]";
								break;
							}
							
							var s_open_tag, s_close_tag, s_final_close_tag, s_final_open_tag;
							
							var value_length = $(layout_checked).val().length;
							
							
							
							//Return the last caracter of the value
							var s_tag_position = $(layout_checked).val().substr(value_length-1,value_length);
							
							//Return the name of the value
							s_open_tag = "["+$(layout_checked).val().substring(0,value_length-1)+"]";
							s_close_tag = "[/"+$(layout_checked).val().substring(0,value_length-1)+"]";
							s_final_open_tag = "["+$(layout_checked).val().substring(0,value_length-1)+"_last]";
							s_final_close_tag = "[/"+$(layout_checked).val().substring(0,value_length-1)+"_last]";
							
							var output = "", pre_text = "";
							for(i = 1; i <= columns_touse; i++){
								pre_text = $("#text-"+[i]).val();
								
								
								if(i == columns_touse){
									if(i == s_tag_position){
										pre_text = s_final_open_tag +  pre_text + s_final_close_tag+"\n";
									}else{
										pre_text = final_open_tag +  pre_text + final_close_tag+"\n";
									}
									
									
								}else{
									if(i != s_tag_position){
										pre_text = open_tag +  pre_text + close_tag+"\n";
									}else{
										pre_text = s_open_tag +  pre_text + s_close_tag+"\n";
									}
								}
								
								output = output + pre_text;
							}
							
							//Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
							
								   
								   
						});
	
	
		/*Buttons------------------------------------------------------*/
		$("#view_code_buttons").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[button";
							 var close_tag = "[/button]";
							 var style = $("#button").val();
							 var color = $("#btn_color").val();
							 var text = $("#btn_text").val();
							 var link_t = $("#btn_link").val();
							
							output = open_tag + " style='"+ style +"' color='"+ color + "' href='"+ link_t + "']"+  text + close_tag;
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Dropcaps------------------------------------------*/
		$("#dropcap").change(function(){
							selected = $(this).val();
							
							if(selected == "2"){
								$("#dropcap_color_div").fadeIn();
							}else{
								$("#dropcap_color_div").css('display', 'none');
							}
						});
		
		
		$("#view_code_dropcaps").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[dropcap";
							 var close_tag = "[/dropcap]";
							 var style = $("#dropcap").val();
							 var color = $("#dropcap_color").val();
							 var text = $("#dropcap_text").val();
							 
							if(style == 2){
								output = open_tag + " style='"+ style +"' color='"+ color + "']"+  text + close_tag;
							}else{
								output = open_tag + " style='"+ style +"']"+  text + close_tag;
							}	
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();   
						});


		/*Blockquotes----------------------------------------------------*/
		$("#view_code_blockquote").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[blockquote";
							 var close_tag = "[/blockquote]";
							 var color = $("#blockquote_color").val();
							 var text = $("#blockquote_text").val();
							 var cite = $("#blockquote_cite").val();
							 var align = $("#blockquote_align").val();
							 
							 if(cite != ""){
								 cite = "cite='"+cite+"'";
							 }else{
								 cite = " ";
							 }
							 
							 if(align == "left" || align == "right" ){
								 align = "align='"+align+"'";
							 }else{
								 align = "";
							 }
							 
							
							output = open_tag + " color='"+ color + "' "+ cite + " "+ align + "]"+  text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		
		
		/*Code----------------------------------------------------------------*/
		$("#view_code_code").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[code";
							 var close_tag = "[/code]";
							 var text = $("#code_text").val();							 
							
							output = open_tag + "]"+ text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		/*Lists----------------------------------------------------------------*/
		var one_more = 1;
		$("#one_more_list").click(function(e){
							 
							e.preventDefault();
							 
							var list_item_div = $("#list_item_div"+one_more).clone();
							
							
							
							
							$("#list_item_div"+one_more).after(list_item_div);
							var number_more = one_more + 1;
							
							var new_tag = "list_text"+number_more;
							var new_tag2 = "list_item_div"+number_more;
							 
							$(list_item_div).attr("id", new_tag2).find("#list_text"+one_more).attr("id", new_tag);
							$("#list_item_div"+one_more).after(list_item_div); 
							one_more++;
						});
		
		$("#view_code_list").click(function(e){
							 e.preventDefault();
							 var output, pre_output = "";
							 
							 
							 
							 
							 var open_tag = "[list";
							 var close_tag = "[/list]";
							 var text = $("#code_text").val();	
							 var color = $("#list_color").val();
							 var style = $("#list").val();
							 
							 var cant_item = $(".list_item").length;
							 
							 
							 for(i = 1; i <= cant_item; i++){
								 
								 pre_output = pre_output + "[li color='"+ color + "']"+ $("#list_text"+i).val() + "[/li]\n";
								 
							 }
							 
							
							output = open_tag + " style='"+ style+"']\n"+ pre_output + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Video---------------------------------------------*/
		$("#view_code_video").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 
							 
							 var open_tag = "[video";
							 var close_tag = "]";
							 var id = $("#video_id").val();	
							 var type = $("#video").val();
							 
							
							output = open_tag + " type='"+ type+"' video_id='"+ id +"' "+ close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Lightbox---------------------------------------------*/
		$("#view_code_lightbox").click(function(e){
							 e.preventDefault();
							 var output, pre_output = "";
							 
							 
							 
							 
							 var open_tag = "[lightbox";
							 var close_tag = "[/lightbox]";
							 var text = $("#lightbox_text").val();	
							 var title = $("#lightbox_title").val();
							 var group = $("#lightbox_group").val();
							 var href = $("#lightbox_image").val();
							 
							 if(group != ""){
								 group = " group='"+ group + "' "
							 }
							 
							 if(title != ""){
								 title = " title='"+ title + "' "
							 }
							 
							 
						
							 
							
							output = open_tag + group + title + " href='"+ href+"']"+ text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		/*Highlight---------------------------------------------*/
		$("#view_code_highlight").click(function(e){
							 e.preventDefault();
							 var output, pre_output = "";
							 
							 var open_tag = "[highlight";
							 var close_tag = "[/highlight]";
							 var text = $("#highlight_text").val();	
							 var style = $("#highlight").val();

							 
							 if(style == "dark"){
								 style = " style='"+ style + "' "
							 }else{
								 style= "";
							 }

							 
							 
						
							 
							
							output = open_tag + style +"]"+ text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		
		
		
		
		
		/*Tabs---------------------------------------------*/
		one_more = 1;
		$("#one_more_tab").click(function(e){
							 
							e.preventDefault();
							 
							var tab_div = $("#tab_div"+one_more).clone();
							
							
							
							
							$("#tab_div"+one_more).after(tab_div);
							var number_more = one_more + 1;
							
							var new_tag_menu = "menu"+number_more;
							var new_tag_textarea = "tab_content"+number_more;
							var new_tag2 = "tab_div"+number_more;
							var new_tag_tab = "Tab "+number_more;
							 
							$(tab_div).attr("id", new_tag2).find("#menu"+one_more).attr("id", new_tag_menu)
															.parent().find("#tab_content"+one_more).attr("id", new_tag_textarea)
															.parent().find("h3").text(new_tag_tab);
							
							$("#tab_div"+one_more).after(tab_div); 
							one_more++;
						});
		
		$("#view_code_tab").click(function(e){
							 e.preventDefault();
							 var output, pre_output = "", pre_output_tab_content = "";
							 
							 
							 
							 var cant_item = $(".tabs").length;
							 
							 
							 for(i = 1; i <= cant_item; i++){
								 
								 pre_output = pre_output + "[nav]"+ $("#menu"+i).val() + "[/nav]\n";
								 
								 pre_output_tab_content = pre_output_tab_content + "[tab]"+ $("#tab_content"+i).val() + "[/tab]\n";
								 
							 }
							 
							
							output = "[menu]\n" + pre_output + "[/menu]\n" + "[tabs]\n" + pre_output_tab_content + "[/tabs]";
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Image----------------------------------------------------*/
		$("#view_code_image").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[img-frame";
							 var close_tag = "[/img-frame]";
							
							 var image_url = $("#image_url").val();
							 var align = $("#image_align").val();
							 
							 
							 if(align == "left" || align == "right" ){
								 align = " align='"+align+"' ";
							 }else{
								 align = "";
							 }
							 
							
							output = open_tag + align + "]"+  image_url + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Alertbox----------------------------------------------------*/
		$("#view_code_alertbox").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[alert-box";
							 var close_tag = "[/alert-box]";
							
							 var alertbox_text = $("#alertbox_text").val();
							 var alertbox_style = $("#alertbox").val();
							 
							 
							 if(alertbox_style == "select style..."){
								 alertbox_style = "";
							 }else if(alertbox_style != ""){
								 alertbox_style = " style='"+alertbox_style+"' ";
							 }
							 
							
							output = open_tag + alertbox_style + "]"+  alertbox_text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		
		/*Map----------------------------------------------------*/
		$("#view_code_map").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[map";
							 var close_tag = "]";
							
							 var map_html = $("#map_text").val();
							 var map_popup = $("#map_popup").val();
							 var map_width = $("#map_width").val();
							 var map_height = $("#map_height").val();
							 var map_zoom = $("#map_zoom").val();
							 var map_latitude = $("#map_latitude").val();
							 var map_longitude = $("#map_longitude").val();
								
							
							 
							 
							 if(map_popup == "false" || map_popup == "true"){
								 map_popup = " popup='"+ map_popup +"'";
							 }else{
								 map_popup = " popup='false'";
							 }
							 
							 
							 
							
							output = open_tag + map_popup + " html='"+ map_html + "' width='"+ map_width + "' height='"+ map_height + "' zoom='"+ map_zoom + "' latitude='"+ map_latitude + "' longitude='"+ map_longitude + "'" + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Form----------------------------------------------------*/
		$("#view_code_form").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[form";
							 var close_tag = "]";
							
							 var form_email = $("#form_mail").val();

							output = open_tag + " email='"+ form_email + "' " + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Icon----------------------------------------------------*/
		$("#view_code_icon").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[icon";
							 var close_tag = "]";
							
							 var src_icon = $(icon_selected).attr("src");
							 var src_icon_length = src_icon.length;
							 
							 
							
							var pre_icon_name = src_icon.substr(19,src_icon_length);
							var icon_name = pre_icon_name.substr(0,pre_icon_name.length-4);
							
							
							output = open_tag + " name='" + icon_name + "' " + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		
		/*Slogan----------------------------------------------------*/
		$("#view_code_slogan").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[slogan]";
							 var close_tag = "[/slogan]";
							
							 var slogan_text = $("#slogan_text").val();
							 var slogan_button_text = $("#slogan_button_text").val();
							 var slogan_button_link = $("#slogan_button_link").val();
							 var slogan_button_color = $("#slogan_button_color").val();
							 							
							
							output = open_tag + "&lt;h2&gt;" + slogan_text + "&lt;/h2&gt;\n" + "[sloganlink color='" + slogan_button_color + "' href='" + slogan_button_link + "' ]" + slogan_button_text + "[/sloganlink]\n" + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		/*Toggle----------------------------------------------------*/
		$("#view_code_toggle").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[toggle";
							 var close_tag = "[/toggle]";
							
							 var toggle_title = $("#toggle_title").val();
							 var toggle_text = $("#toggle_text").val();
							
							
							output = open_tag + " title='" + toggle_title + "']"+ toggle_text + close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
		
		/*Read More----------------------------------------------------*/
		$("#view_code_readmore").click(function(e){
							 e.preventDefault();
							 var output;
							 
							 
							 var open_tag = "[read_more";
							 var close_tag = "]";
							
							 var readmore_link = $("#readmore_link").val();
							
							
							output = open_tag + " href='" + readmore_link + "' "+ close_tag;
							
							 
							 //Show the code
							$("#output").html(output).css('display', 'block');
							$("#output-div").fadeIn();
							
								   
								   
						});
	
	
	
		/*Colorpicker---------------------------------------------*/
		jQuery('.selectColor').ColorPicker({
			 color: '#a621b5',
			 onShow: function (colpkr) {
			 jQuery(colpkr).fadeIn(500);
			 return false;
			 },
			onHide: function (colpkr) {
			 jQuery(colpkr).fadeOut(500);
			 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
			 
			 jQuery('.selectColor').children('div').css('backgroundColor', '#' + hex);
			 jQuery('.selectColor').next('input').attr('value','#' + hex);
			
			 }
	 	}); 
	
	
});