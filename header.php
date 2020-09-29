<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>
</head>

<body>
  <header>

    <div class="row">

      <div class="twelve columns">

        <div class="logo">
          <?php the_custom_logo(); ?>
        </div>

        <nav id="nav-wrap">

          <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
          <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
          
          <?php 
            wp_nav_menu( [
              'theme_location'  => 'top_menu',
              'container'       => false, 
              'menu_class'      => 'nav', 
              'menu_id'         => 'nav',
            ] );
          ?>

        </nav> <!-- end #nav-wrap -->

      </div>

    </div>

  </header> <!-- Header End -->