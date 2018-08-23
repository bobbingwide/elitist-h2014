					<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                        <input type="text" class="input-search" value="<?php the_search_query(); ?>" name="s" id="s">
                        <i class="icon-search"></i>
                        <input type="submit" class="search-button" id="searchsubmit" value="Search">
					</form>