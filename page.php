<?php get_header(); ?>
	
	<div id="main">
	
		<div id="content">

			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div class="single page">
						<div class="single_title">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to <?php the_title(); ?>"><?php the_title(); ?></a> <small><?php edit_post_link('Editar'); ?></small></h2>
							<p>Publicado: <?php the_time('F j, Y'); ?> a las <?php the_time('g:i a'); ?></p>
						</div>
						<div class="single_body">
							<?php the_content('Continue reading &raquo;'); ?>
						</div>
					</div>
					<?php
				}
			} else {
			?>

				<h2>404.</h2>
				<p>Document not found.</p>
			<?php
			}
			?>

		</div>
	
		<?php get_sidebar(); ?>
	
	</div>

<?php get_footer(); ?>
