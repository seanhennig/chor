<?php
/**
 * The header of the theme
 *
 * author: Sean Hennig
 * contact: sean.hennig@gmx.net
 * url: http://www.sean-hennig.de
 * date: 2014/11/16
 */
?>
<!-- header -->
<div id="header">
    <div id="header-left">
        <div id="navbar" class="navbar">
            <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            </nav><!-- #site-navigation -->
        </div><!-- #navbar -->
    </div><!-- header-left -->
    <div id="header-right">
        <a href="/"><img src="/wp-content/themes/thorstengietz/img/logo.png" width="300" height="70" alt="Thorsten Gietz - Logo" /></a>
    </div><!-- header-right -->

</div><!-- #header end -->