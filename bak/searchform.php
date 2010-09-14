<form method="get" action="<?php bloginfo('url'); ?>" class="sitesearch">
	<fieldset>
		<legend>Search for this site</legend>
		<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" placeholder="Search Keyword" />
		<input type="submit" id="searchsubmit" value="Search" />
	</fieldset>
</form>
