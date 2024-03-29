<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php ibrarrkhan_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">
            <div class="container">
                <div id="branding">
                    <div id="site-logo" itemprop="publisher" itemscope itemtype=" ">
                        <a href="<?php echo is_front_page() ? '#top' : '/' ?>"><img src="<?php the_field('header_logo', 'options') ?>" itemprop="logo"></a>
                    </div>
                </div>
                <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php
                    if (is_front_page()) {
	                    wp_nav_menu(array('theme_location' => 'main-menu-home', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>'));
                    } else {
	                    wp_nav_menu(array('theme_location' => 'main-menu-other', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>'));
                    }
                    ?>
                </nav>
                <div class="hamburger-menu">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </header>

        <div class="overlay"></div>

        <div id="container">
            <main id="content" role="main" itemprop="mainContentOfPage">