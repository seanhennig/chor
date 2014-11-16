<!-- header -->
<div id="header">
    <div id="header-left">
        <a href="/"><img src="/wp-content/themes/thorstengietz/img/logo.png" width="300" height="97" alt="Thorsten Gietz - Logo" /></a>
    </div><!-- header-left -->
    <div id="header-right">
        <div class="header-menu-wrapper clearfix">
            <div id="pngfix-right"></div>
             <?php if($options['use_wp_nav_menu']) { ?>
             <?php if (function_exists('wp_nav_menu')) { wp_nav_menu( array( 'sort_column' => 'menu_order') ); }; ?>
             <?php } else { ?>
             <ul class="menu">
              <li class="<?php if (!is_paged() && is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/"><?php _e('HOME','piano-black'); ?></a></li>
              <?php 
                    if($options['header_menu_type'] == 'pages') {
                    wp_list_pages('sort_column=menu_order&depth=0&title_li=&exclude=' . $options['exclude_pages']);
                    } else {
                    wp_list_categories('depth=0&title_li=&exclude=' . $options['exclude_category']);
                    }
              ?>
             </ul>
             <?php }; ?>
            <div id="pngfix-left"></div>
        </div>
        <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
        </nav>
    </div><!-- header-right -->

</div><!-- #header end -->