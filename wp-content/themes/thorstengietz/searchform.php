<?php
/**
 * default search form
 *
 * author: Sean Hennig
 * contact: sean.hennig@gmx.net
 * url: http://www.sean-hennig.de
 * date: 2014/11/16
 */
?>  
<div class="column">
    <div id="sb-search" class="sb-search">
        <form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="s" id="search-input">
            <input class="sb-search-submit" type="submit" id="search-submit" value="">
            <span class="sb-icon-search"></span>
        </form>
    </div><!-- /sb-search -->
</div><!-- /column-->