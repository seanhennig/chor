<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     
        <?php wp_head(); ?>
    </head>
    <body>
     
        <div id="wrapper">
         
           <div id="header"></div><!-- header -->
         
           <div id="main">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
                       <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
           </div><!-- main -->
         
           <div id="sidebar"></div><!-- sidebar --> 
         
           <div id="footer"></div><!-- footer -->
         
        </div><!-- wrapper -->
     
    </body>
</html>