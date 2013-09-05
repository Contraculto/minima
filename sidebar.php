<div id="sidebar">
	<div class="sidebar_single" id="sidebar_single_introduction">
		<h2>About</h2>
		<p>This is an example item.</p>
	</div>

	<div class="sidebar_single" id="sidebar_single_categories">
		<h2>Categories</h2>
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</div>

	<div class="sidebar_single" id="sidebar_single_links">
		<h2>Links</h2>
		<ul>
			<?php get_links('-1', '<li>', '</li>', ' ', false, 'name', FALSE); ?>
		</ul>
	</div>
</div>
