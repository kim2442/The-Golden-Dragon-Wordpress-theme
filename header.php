<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header>
    <div class="coolwave">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/wavepattern.gif' ); ?>"/>
    </div>
    <div class="banner">
      <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/goldenlogo.png' ); ?>"/></a>
      <span class="since"><i>Serving Taejon Christian International School since c. 1977</i></span>
    </div>

  <nav class="nav">

    <div class="nav-links">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <a href="https://docs.google.com/forms/d/1H_xmKV07h20juFSoEEyuv49wRiKzurTcfDkyP74aXz0/edit">Apply!</a>
      <a href="<?php echo esc_url(home_url('/past-issues')); ?>">Past Issues</a>
      <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
    </div>

    <form class="nav-search" method="get" action="https://www.goldendragon.news/">
      <input type="text" name="s" placeholder="Search…" />
      <button type="submit">→</button>
    </form>
  </nav>


  </header>
  
  <div class="issue">
    <b>Current issue:</b> November 2025
  </div>
  <main class="content">
