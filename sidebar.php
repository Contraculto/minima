		<div id="sidebar">
			
			<div class="sidebar_single" id="sidebar_single_introduccion">
				<h3>Acerca de <?php bloginfo('name'); ?></h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
			</div>

			<?php if ( is_home() || is_archive() || is_single() ) { ?>
				<div class="sidebar_single" id="sidebar_single_categorias">
					<h3>Categor&iacute;as</h3>
					<ul>
						<?php wp_list_categories('title_li='); ?>
					</ul>
				</div>
			<?php } ?>

			<?php if ( is_page() ) { ?>
				<div class="sidebar_single" id="sidebar_single_paginas">
					<h3>P&aacute;ginas</h3>
					<ul>
						<?php wp_list_pages('title_li='); ?>
					</ul>
				</div>
			<?php } ?>

		</div>
