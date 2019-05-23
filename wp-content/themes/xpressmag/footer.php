<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpressmag
 */

?>
<style>

.copyrights{
	text-align: center;
}
/*.blocks{
	background-color: #FFD733;
}*/
.column {
  float: left;
  width: 33.33%;

  padding: 20px
 
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
#footer_added ul 
{
list-style-type: none;
}



</style>
	</div>
	<footer id="colophon" class="footer">
        <div class="site-footer footer_inner">
            <div class="xp_container">
                <?php if( get_theme_mod( 'xpressmag_footer_widget_area_option', 'on' ) == 'on' ){ ?>

                    <div class="row">
                        <div class="column" id="footer_added">
                        	<p>About the Company</p>
                        	 
                                    <ul>
                                    <li><a href="http://www.a24media.com/about/">About us</a></li>
                                    <li><a href="http://www.a24media.com/contact-us/">Contact us</a></li>
                                    <li><a href="http://www.a24media.com/portfolio/">Services</a></li>
                                    <li><a href="http://www.a24media.com/blog/">News & Blogs</a></li>
                                   
                                    </ul> 
                            <div class="blocks">
    							<?php 

    							    if( is_active_sidebar( 'footer-1' ) ){

    							        dynamic_sidebar( 'footer-1' );

    							    }
    							?>
                            </div><!-- // blocks -->
                        </div>
                        <!-- // col-->
                        <div class="column">
                        	
                          
                        
                            <div class="blocks">
    							<?php 
    							    if( is_active_sidebar( 'footer-2' ) ){

    							        dynamic_sidebar( 'footer-2' );

    							    }
    							?>
                            </div><!-- // blocks -->
                        </div>
                        <!-- // col-->

                        <div class="column">

    
                            <div class="blocks">
    							<?php 
    							    if( is_active_sidebar( 'footer-3' ) ){

    							        dynamic_sidebar( 'footer-3' );

    							    }
    							?>
                            </div><!-- // blocks -->
                        </div>
                        <!-- // col-->
                    </div><!-- // row -->
                <?php } ?>                
            </div><!-- // xp_container -->
            <div class="mask"></div>
        </div><!-- // footer_inner -->

        <div class="copyright_section">
            <div class="xp_container">
                <div class="row">
                        <div class="copyrights">
                            Copyright &COPY; 2019 by Africa24Media
                        </div>
                   

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer_nav">
                            <?php
                                if( has_nav_menu( 'menu-3' ) ){
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-3',
                                        'container'      => '',
                                    ) );
                                }
                            ?>
                        </div> <!-- // footer_nav -->
                    </div> <!-- // col -->

                </div>
                <!-- / row -->
            </div><!-- // copyright_section -->
        </div>
        
    </footer>

</div><!-- #page -->

<div class="footer_social">
    <div class="xp_container">
        <?php
    		/**
    		 * Social Media Link
    		*/
    		do_action( 'xpressmag_social_media', 5 );
    	?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
