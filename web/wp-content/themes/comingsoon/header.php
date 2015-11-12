<?php include( 'config.php' ); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />

		<title><?php wp_title( ' | ', true, 'right' ); ?></title>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/css/lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:400,700" />

		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="outer_container">
			<div class="container">