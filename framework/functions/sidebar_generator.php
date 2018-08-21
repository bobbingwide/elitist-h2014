<?php
add_action('init','init_sidebar_g');
add_action('admin_print_scripts', 'admin_print_scripts');	
add_action('wp_ajax_add_sidebar', 'add_sidebar' );
add_action('wp_ajax_remove_sidebar', 'remove_sidebar' );

		//edit posts/pages
		add_action('edit_form_advanced', 'edit_form');
		add_action('edit_page_form', 'edit_form');
		
		//save posts/pages
		add_action('edit_post',  'save_form');
		add_action('publish_post',  'save_form');
		add_action('save_post',  'save_form');
		add_action('edit_page_form', 'save_form');

function admin_print_scripts(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function add_sidebar( sidebar_name )
				{
					
					var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "add_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					return true;
				}
				
				function remove_sidebar( sidebar_name,num )
				{
					
					var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "remove_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.setVar( "row_number", num );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					//alert('hi!:::'+sidebar_name+num);
					return true;
				}
			</script>
            <script>
			function remove_sidebar_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
				if(answer){
					//alert('AJAX REMOVE');
					remove_sidebar(name,num);
				}else{
					return false;
				}
			}
			function add_sidebar_link(){
				var sidebar_name = prompt("Sidebar Name:","");
				//alert(sidebar_name);
				add_sidebar(sidebar_name);
			}
		</script>
		<?php
	}

	
	function add_sidebar(){
		$sidebars = get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = name_to_class($name);
		if(isset($sidebars[$id])){
			die("alert('Sidebar already exists, please use a different name.')");
		}
		
		$sidebars[$id] = $name;
		update_sidebars($sidebars);
		
		$js = "
			var tbl = document.getElementById('sbg_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);
			
			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$name');
			cellLeft.appendChild(textNode);
			
			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$id');
			cellLeft.appendChild(textNode);
			
			//var cellLeft = row.insertCell(2);
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return remove_sidebar_link($name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)
			
			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_sidebar_link(\'$name\')');
			removeLink.setAttribute('href', 'javacript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);

			
		";
		
		
		die( "$js");
	}
	
	function remove_sidebar(){
		$sidebars = get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = name_to_class($name);
		if(!isset($sidebars[$id])){
			die("alert('Sidebar does not exist.')");
		}
		$row_number = $_POST['row_number'];
		unset($sidebars[$id]);
		update_sidebars($sidebars);
		$js = "
			var tbl = document.getElementById('sbg_table');
			tbl.deleteRow($row_number)

		";
		die($js);
	}
	
	
	
	
		/**
	 * gets the generated sidebars
	*/
	function get_sidebars(){
		$sidebars = get_option('sbg_sidebars');
		return $sidebars;
	}
		/**
	 * replaces array of sidebar names
	*/
	function update_sidebars($sidebar_array){
		$sidebars = update_option('sbg_sidebars',$sidebar_array);
	}	
	function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	
	
	
	//Register the Sidebars
	function init_sidebar_g(){
		//go through each sidebar and register it
	    $sidebars = get_sidebars();
	    

	    if(is_array($sidebars)){
			foreach($sidebars as $sidebar){
				$sidebar_class = name_to_class($sidebar);
				register_sidebar(array(
					'name'=>$sidebar,
			    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   			'after_widget' => '</div>',
		   			'before_title' => '<h4>',
					'after_title' => '<i></i></h4>',
		    	));
			}
		}
	}
	
	
	
	
	
	
	/**
	 * for saving the pages/post
	*/
	function save_form($post_id){
		if(isset($_POST['sbg_edit'])){
			$is_saving = $_POST['sbg_edit'];
		}
		if(!empty($is_saving)){
			delete_post_meta($post_id, 'sbg_selected_sidebar');
			delete_post_meta($post_id, 'sbg_selected_sidebar_replacement');
			//add_post_meta($post_id, 'sbg_selected_sidebar', $_POST['sidebar_generator']);
			add_post_meta($post_id, 'sbg_selected_sidebar_replacement', $_POST['sidebar_generator_replacement']);
		}		
	}
	
	function edit_form(){
	    global $post;
	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }
	    $selected_sidebar_replacement = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);
		/*
		if(!is_array($selected_sidebar_replacement)){
	    	$tmp = $selected_sidebar_replacement; 
	    	$selected_sidebar_replacement = array(); 
	    	$selected_sidebar_replacement[0] = $tmp;
	    }
		*/
		?>
	 
	<div id='sbg-sortables' class='meta-box-sortables'>
		<div id="sbg_box" class="postbox " >
			<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Sidebars</span></h3>
			<div class="inside">
				<div class="sbg_container">
					<input name="sbg_edit" type="hidden" value="sbg_edit" />
					
					<p>Select the sidebar you wish to display on this page. (The Blog page will always use the default sidebar)</p>
					<ul>
					<?php 
					//global $wp_registered_sidebars;
					//var_dump($wp_registered_sidebars);		
						?>
							<li>
							<select name="sidebar_generator_replacement">
								<option value="0"<?php if($selected_sidebar_replacement == ''){ echo " selected";} ?>>Default</option>
							<?php
							//All the Sidebars
							//$sidebar_replacements = $wp_registered_sidebars;
							
							//Get Only the generated sidebars
							$sidebar_replacements = get_sidebars();
							
							if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
								foreach($sidebar_replacements as $sidebar){
									if($selected_sidebar_replacement == $sidebar){
										echo "<option value='{$sidebar}' selected>{$sidebar}</option>\n";
									}else{
										echo "<option value='{$sidebar}'>{$sidebar}</option>\n";
									}
								}
							}
							?>
							</select> 
							
							</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>

		<?php
	}	

?>