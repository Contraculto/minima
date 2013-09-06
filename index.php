<?php get_header(); ?>
	<div id="main">
		<div id="content">
			<?php
			if (have_posts()) :
				$postCount=0;
				while (have_posts()) : the_post();
					$postCount++;
					?>
					<div class="single" id="single_<?php echo $postCount ;?>">
						<div class="single_title">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<p class="single_title_meta">Date: <?php the_time('d/m/Y'); ?> Time: <?php the_time('h:i'); ?> Categories: <?php the_category(','); ?>. <a href="<?php comments_link(); ?>"><?php comments_number('No comments', 'One comment', '% comments'); ?></a>. <?php edit_post_link('Edit post'); ?></p>
						</div>
						<div class="single_body">
							<?php the_content('Continue reading &raquo;'); ?>
						</div>
					</div>
					<?php
					comments_template();
				endwhile; ?>
				<div id="content_nav">
					<div id="content_nav_next"><?php next_posts_link('Next entries') ?></div>
					<div id="content_nav_prev"><?php previous_posts_link('Previous entries') ?></div>
				</div>
			<?php else : ?>
				<h2>404.</h2>
				<p>Document not found.</p>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>