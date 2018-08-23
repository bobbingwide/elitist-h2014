<?php
add_action('init','init_portfolio');
add_action('admin_print_scripts', 'admin_print_scripts_portfolio');	
add_action('wp_ajax_add_portfolio', 'add_portfolio' );
add_action('wp_ajax_remove_portfolio', 'remove_portfolio' );

		//edit posts/pages
		add_action('edit_form_portfolio_advanced', 'edit_form_portfolio');
		add_action('edit_page_form', 'edit_form_portfolio');
		
		//save posts/pages
		add_action('edit_post',  'save_form_portfolio');
		add_action('publish_post',  'save_form_portfolio');
		add_action('save_post',  'save_form_portfolio');
		add_action('edit_page_form', 'save_form_portfolio');

function admin_print_scripts_portfolio(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function add_portfolio( portfolio_name )
				{
					
					var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "add_portfolio" );
				  	mysack.setVar( "portfolio_name", portfolio_name );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add portfolio' )};
				  	mysack.runAJAX();
					return true;
				}
				
				function remove_portfolio( portfolio_name,num )
				{
					
					var mysack = new sack("<?php echo site_url(); ?>/wp-admin/admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "remove_portfolio" );
				  	mysack.setVar( "portfolio_name", portfolio_name );
				  	mysack.setVar( "row_number", num );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add portfolio' )};
				  	mysack.runAJAX();
					//alert('hi!:::'+portfolio_name+num);
					return true;
				}
			</script>
            <script>
			function remove_portfolio_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any items you have assigned to this portfolio.");
				if(answer){
					//alert('AJAX REMOVE');
					remove_portfolio(name,num);
				}else{
					return false;
				}
			}
			function add_portfolio_link(){
				var portfolio_name = prompt("portfolio Name:","");
				//alert(portfolio_name);
				add_portfolio(portfolio_name);
			}
		</script>
		<?php
	}

	
	function add_portfolio(){
		$portfolios = get_portfolios();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['portfolio_name']);
		$id = name_to_class_portfolio($name);
		if(isset($portfolios[$id])){
			die("alert('portfolio already exists, please use a different name.')");
		}
		
		$portfolios[$id] = $name;
		update_portfolios($portfolios);
		
		$js = "
			var tbl = document.getElementById('sbg_table_portfolio');
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
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return remove_portfolio_link($name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)
			
			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_portfolio_link(\'$name\')');
			removeLink.setAttribute('href', 'javacript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);

			
		";
		
		
		die( "$js");
	}
	
	function remove_portfolio(){
		$portfolios = get_portfolios();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['portfolio_name']);
		$id = name_to_class_portfolio($name);
		if(!isset($portfolios[$id])){
			die("alert('portfolio does not exist.')");
		}
		$row_number = $_POST['row_number'];
		unset($portfolios[$id]);
		update_portfolios($portfolios);
		$js = "
			var tbl = document.getElementById('sbg_table_portfolio');
			tbl.deleteRow($row_number)

		";
		die($js);
	}
	
	
	
	
		/**
	 * gets the generated portfolios
	*/
	function get_portfolios(){
		$portfolios = get_option('sbg_portfolios');
		return $portfolios;
	}
		/**
	 * replaces array of portfolio names
	*/
	function update_portfolios($portfolio_array){
		$portfolios = update_option('sbg_portfolios',$portfolio_array);
	}	
	function name_to_class_portfolio($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	
	
	
	//Register the portfolios
	function init_portfolio(){
		//go through each portfolio and register it
	    $portfolios = get_portfolios();	
		
		
		
		
		
		
		
	}//init_portfolios()
	
	
	
	
	
	
	/**
	 * for saving the pages/post
	*/
	function save_form_portfolio($post_id){
		if(isset($_POST['sbg_edit'])){
			$is_saving = $_POST['sbg_edit'];
		}
		if(!empty($is_saving)){
			delete_post_meta($post_id, 'sbg_selected_portfolio');
			delete_post_meta($post_id, 'sbg_selected_portfolio_replacement');
			//add_post_meta($post_id, 'sbg_selected_portfolio', $_POST['portfolio_generator']);
			if(isset($_POST['portfolio_generator_replacement'])){
				add_post_meta($post_id, 'sbg_selected_portfolio_replacement', $_POST['portfolio_generator_replacement']);
			}
		}		
	}
	
	function edit_form_portfolio(){
	    global $post;
	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }
	    $selected_portfolio_replacement = get_post_meta($post_id, 'sbg_selected_portfolio_replacement', true);
		/*
		if(!is_array($selected_portfolio_replacement)){
	    	$tmp = $selected_portfolio_replacement; 
	    	$selected_portfolio_replacement = array(); 
	    	$selected_portfolio_replacement[0] = $tmp;
	    }
		*/
		?>
	 
	<div id='sbg-sortables' class='meta-box-sortables'>
		<div id="sbg_box" class="postbox " >
			<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Portfolios</span></h3>
			<div class="inside">
				<div class="sbg_container">
					<input name="sbg_edit" type="hidden" value="sbg_edit" />
					
					<p>Select the portfolio you wish to display on this page. (Only works if you select in a Portfolio page template)</p>
					<ul>
					<?php 
					//global $wp_registered_portfolios;
					//var_dump($wp_registered_portfolios);		
						?>
							<li>
							<select name="portfolio_generator_replacement">
								<option value="0"<?php if($selected_portfolio_replacement == ''){ echo " selected";} ?>>Default</option>
							<?php
							//All the portfolios
							//$portfolio_replacements = $wp_registered_portfolios;
							
							//Get Only the generated portfolios
							$portfolio_replacements = get_portfolios();
							
							if(is_array($portfolio_replacements) && !empty($portfolio_replacements)){
								foreach($portfolio_replacements as $portfolio){
									if($selected_portfolio_replacement == $portfolio){
										echo "<option value='{$portfolio}' selected>{$portfolio}</option>\n";
									}else{
										echo "<option value='{$portfolio}'>{$portfolio}</option>\n";
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