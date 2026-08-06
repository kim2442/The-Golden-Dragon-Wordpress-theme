<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header class="site-header">
    <div class="masthead">
		
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
		  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/kispalogo.png' ); ?>"/>
	  </a>
      <div class="tagline">Korean International Scholastic Press Association</div>
    </div>

    <nav class="primary-nav" aria-label="Primary">
      <div class="nav-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_front_page() ? 'current' : ''; ?>">Home</a>
        <a href="<?php echo esc_url(home_url('/members')); ?>" class="<?php echo is_page('members') ? 'current' : ''; ?>">Members</a>
        <a href="<?php echo esc_url(home_url('/awards')); ?>" class="<?php echo is_page('awards') ? 'current' : ''; ?>">Awards</a>
        <a href="<?php echo esc_url(home_url('/about')); ?>" class="<?php echo is_page('about') ? 'current' : ''; ?>">About KISPA</a>
        <a href="<?php echo esc_url(home_url('/resources')); ?>" class="<?php echo is_page('resources') ? 'current' : ''; ?>">Resources</a>
      </div>
    </nav>
  </header>
