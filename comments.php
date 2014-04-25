<div id="comments">
	<?php
	//	Restricciones.
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('Please do not load this page directly. Thanks!');
	}
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
			echo '<h5>Post protegido por contrase&ntilde;a.</h5>';
			return;
		}
	}
	?>

	<?php
	//	Comentarios.
	if ($comments) { ?>
		<h5><?php comments_number('No hay comentarios', 'Hay un comentario', 'Hay % comentarios' );?> para este post:</h5>
		<div id="comments_block">
			<?php foreach ($comments as $comment) { ?>
				<div class="comments_single" id="comments_single_<?php comment_ID() ?>">
					<div class="comments_single_meta">
						<p><strong><?php comment_author_link() ?></strong> <small><?php edit_comment_link('Editar comentario','',''); ?></small></p>
						<p><?php comment_date('F j, Y'); ?> <?php comment_time('g:i a'); ?></p>
					</div>
					<div class="comments_single_content">
						<?php if ($comment->comment_approved == '0') { ?>
							<em>Este comentario est&aacute; esperando aprobaci&oacute;n.</em>
						<?php } ?>
						<?php comment_text() ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } else { ?>
		<?php if ('open' == $post->comment_status) { ?>
			<h5>No hay comentarios</h5>
		<?php } else { ?>
			<h5>Los comentarios est&aacute;n cerrados</h5>
		<?php } ?>
	<?php } ?>


	<?php
	//	Formulario.
	if ('open' == $post->comment_status) { ?>
		<div id="comments_form">
			<h5>Agrega tu comentario</h5>
			<?php if ( get_option('comment_registration') && !$user_ID ) { ?>
				<p>Tienes que estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrado</a> para comentar.</p>
			<?php } else { ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<fieldset>
						<?php if ( $user_ID ) { ?>
							<p>Comentando como <strong><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a></strong>. <a href="<?php echo wp_logout_url($redirect); ?>" title="deslogueate">Salir</a>.</p>
						<?php } else { ?>
							<p><label for="author">Nombre.</label>
							<input type="text" name="author" id="author" placeholder="Nombre" value="<?php echo $comment_author; ?>" /></p>
							<p><label for="email">Correo electr&oacute;nico.</label><input type="text" name="email" id="email" placeholder="Correo electr&oacute;nico" value="<?php echo $comment_author_email; ?>" /></p>
							<p><label for="url">Sitio web.</label><input type="text" name="url" id="url" placeholder="Sitio web" value="<?php echo $comment_author_url; ?>" /></p>
						<?php } ?>
						<!--<p><small><strong>XHTML:</strong> se puede usar algo de html: <?php echo allowed_tags(); ?></small></p>-->
						<p><textarea name="comment" id="comment" rows="12" placeholder="Comentario"></textarea></p>
						<p><input name="submit" type="submit" id="submit" value="Publicar comentario" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
						<?php do_action('comment_form', $post->ID); ?>
					</fieldset>
				</form>
			<?php } ?>
		</div>
	<?php } ?>
</div>
