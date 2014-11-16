<?php
/**
 * Index site of the thorstengietz theme
 *
 * author: Sean Hennig
 * contact: sean.hennig@gmx.net
 * url: http://www.sean-hennig.de
 * date: 2014/11/16
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
        
        <link rel="stylesheet" type="text/css" href="/wp-content/themes/thorstengietz/css/component.css" />
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper">
            <div id="contents">
        
         
                <?php get_header(); ?>
             
               <div id="middle-contents">
                    <div id="left-col">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <div class="entry">
                               <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif; ?>
                    </div><!-- left-col -->
                    <div id="right-col">
                        <div id="sidebar">
                            <?php get_sidebar( 'content' ); ?>
                        </div><!-- sidebar -->
                    </div><!-- right-col -->
                    <div style="clear: both;"></div>
               </div><!-- middle-contents -->
               
               <?php get_footer(); ?>
               
            </div> <!--contents-->
         
        </div><!-- wrapper -->
     
    <!-- includes the search, based on https://github.com/codrops/ExpandingSearchBar -->
    <script src="/wp-content/themes/thorstengietz/js/classie.js"></script>
    <script src="/wp-content/themes/thorstengietz/js/uisearch.js"></script>
    <script>
            new UISearch( document.getElementById( 'sb-search' ) );
    </script>
    <?php wp_footer(); ?>
    </body>
</html>