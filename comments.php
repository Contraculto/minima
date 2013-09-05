<div id="comments">
<?php // the part you must not change
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // post is password protected.
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and my cookie is un-leet.
				?>
				<p class="comments_title">Post protegido por contrase&ntilde;a.<p>
				<?php
				return;
            }
        }
?>

<?php if ($comments) : ?>
	<p id="comments_title"><?php comments_number('No hay comentarios', 'Hay un comentario', 'Hay % comentarios' );?> para este post:</p> 

	<div id="comments_block">

	<?php foreach ($comments as $comment) : ?>

		<div class="comments_single" id="comments_single_<?php comment_ID() ?>">
			<div class="comments_single_meta">
				<p>(<a href="#comments_single_<?php comment_ID() ?>"><?php comment_date('d/m/Y'); ?> <?php comment_time('h:i'); ?></a>) <strong><?php comment_author_link() ?></strong>: <?php edit_comment_link('e','',''); ?></p>
			</div>
			<div class="comments_single_content">
				<?php if ($comment->comment_approved == '0') : ?>
					<em>Este comentario est&aacute; esperando aprobaci&oacute;n.</em>
				<?php endif; ?>
				<?php comment_text() ?>
			</div>

		</div>

	<?php endforeach; /* end for each comment */ ?>

	</div>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<p id="comments_callforcomments">Algo que agregar?</p>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Tienes que estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrado</a> para comentar.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<fieldset>

<?php if ( $user_ID ) : ?>

<p id="comments_registereduser">Est&aacute;s registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url($redirect); ?>" title="deslogueate">Eres otro?</a></p>

<?php else : ?>

<p><label for="author">Tu Nombre. <?php if ($req) echo "(Necesario)"; ?></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" /></p>

<p><label for="email">Tu e-mail. <?php if ($req) echo "(Necesario)"; ?></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" /></p>

<p><label for="url">Tu sitio web, si tienes.</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> se puede usar algo de html: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" rows="10" cols="10"></textarea></p>

<p><input name="submit" type="submit" id="submit" value="D&iacute;lo" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
<?php do_action('comment_form', $post->ID); ?>

</fieldset>
</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>