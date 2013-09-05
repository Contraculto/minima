<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="author" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title><?php bloginfo('name'); wp_title('-'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> rss feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body class="sans">
<div id="wrapper">
	<div id="header">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2><?php bloginfo('description'); ?></h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="<?php bloginfo('url'); ?>/">Home</a></li>
			<?php wp_list_pages('title_li='); ?>
			<li><a href="<?php bloginfo('rss2_url'); ?>">Feed RSS</a></li>
		</ul>
	</div>
