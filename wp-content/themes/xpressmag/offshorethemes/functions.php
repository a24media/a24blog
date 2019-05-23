<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Offshore Themes
 *
 * @subpackage xpressmag
 *
 * @since 1.0.0
 *
 */

/**
 * Breadcrumb declaration of the theme.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_breadcrumbs' ) ) :
    
    function xpressmag_breadcrumbs() {
    ?>
        <div class="breadcrumb">
            <?php
                $breadcrumb_args = array(
                    'show_browse' => false,
                );
                xpressmag_breadcrumb_trail( $breadcrumb_args );
            ?>
        </div> <!-- // breadcrumb -->
    <?php
    }
endif;
add_action( 'xpressmag_breadcrumbs', 'xpressmag_breadcrumbs', 10 );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function xpressmag_custom_excerpt_length( $length ) {
  if(is_admin() ){
    return $length;
  }
    return 27;
}
add_filter( 'excerpt_length', 'xpressmag_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function xpressmag_excerpt_more( $more ) {
  if(is_admin() ){
    return $more;
  }
    return '...';
}
add_filter( 'excerpt_more', 'xpressmag_excerpt_more' );

/**
 * Social Media Link
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'xpressmag_social_media_link' ) ){

    function xpressmag_social_media_link() {

        $get_social_media_icons = get_theme_mod( 'xpressmag_social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons ); 
        if( !empty( $get_decode_social_media ) ) {
          echo '<ul class="social_icons">';          
              foreach ( $get_decode_social_media as $single_icon ) {
                  $icon_class = $single_icon->social_icon_class;
                  $icon_url = $single_icon->social_icon_url;
                  if( !empty( $icon_url ) ) {
                      echo '<li><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></li>';
                  }
              }
          echo '</ul>';
        } 
    }
}
add_action( 'xpressmag_social_media', 'xpressmag_social_media_link', 5 );


/**
 * Footer Copyright Information
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'xpressmag_footer_copyright' ) ){

    function xpressmag_footer_copyright() {

        $copyright = get_theme_mod( 'xpressmag_footer_section_options' ); 

        if( !empty( $copyright ) ) { 

            echo apply_filters( 'xpressmag_copyright_text', $copyright ); 

        } else { 

            echo esc_html( apply_filters( 'xpressmag_copyright_text', $content = esc_html__('Copyright  &copy; ','xpressmag') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        }

        printf( ' WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://offshorethemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Offshore Themes','xpressmag').'</a>' );
    }
}
add_action( 'xpressmag_copyright', 'xpressmag_footer_copyright', 5 );


/**
 * Widget Category dropdown
 *
 * @return array();
 */
if( !function_exists( 'xpressmag_categories_dropdown' ) ) :

    function xpressmag_categories_dropdown() {

        $xpressmag_categories = get_categories( array( 'hide_empty' => 1 ) );

        $xpressmag_categories_lists = array();

        $xpressmag_categories_lists['0'] = esc_html__( 'Select Block Category ', 'xpressmag' );

        foreach( $xpressmag_categories as $category ) {

            $xpressmag_categories_lists[esc_attr( $category->term_id )] = esc_html( $category->name );

        }

        return $xpressmag_categories_lists;
    }

endif;


/**
 * Category list
 *
 * @return array();
 */
if( !function_exists( 'xpressmag_categories_lists' ) ) :

    function xpressmag_categories_lists() {

        $xpressmag_categories = get_categories( array( 'hide_empty' => 1 ) );

        $xpressmag_categories_lists = array();

        foreach( $xpressmag_categories as $category ) {

            $xpressmag_categories_lists[$category->term_id] = $category->name;
        }

        return $xpressmag_categories_lists;
    }
endif;

/**
 * Category Colors
 *
 * @return array();
 */
if ( !function_exists('xpressmag_colors_category') ){
  
    function xpressmag_colors_category() {
        global $post;
        $categories = get_the_category();
        $separator = '&nbsp;';
        $output = '';
        if($categories) {
            $output .= '<div class="entry_cats"><ul class="categories">';
                foreach($categories as $category) {
                    $color_code = xpressmag_category_color( get_cat_id( $category->cat_name ) );
                    if (!empty($color_code)) {
                        $output .= '<li><a href="'.esc_url( get_category_link( $category->term_id ) ).'" style="background:' . xpressmag_category_color( get_cat_id( $category->cat_name ) ) . '" rel="category tag">'.esc_html( $category->cat_name ).'</a></li>'.$separator;
                    } else {
                        $output .= '<li><a href="'.esc_url( get_category_link( $category->term_id ) ).'"  rel="category tag">'.esc_html( $category->cat_name ).'</a></li>'.esc_html( $separator );
                    }
                }
            $output .='</ul></div>';
            echo trim( $output, $separator );
        }
    }
}


if ( ! function_exists( 'xpressmag_category_color' ) ){

    function xpressmag_category_color( $wp_category_id ) {
        $args = array(
          'orderby' => 'id',
          'hide_empty' => 0
        );
        $category = get_categories( $args );
        foreach ( $category as $category_list ) {
          $color = get_theme_mod( 'xpressmag_category_color_'.$wp_category_id );
          return $color;
        }
    }
}


/**
 * Register different widgets
 *
 * @since 1.0.0
 */
function xpressmag_register_widgets() {

    /**
     * Social Media Link Widget
    */
    register_widget( 'Xpressmag_Social_Media' );

    /**
     * Multiple Display Block Layout Posts
    */
    register_widget( 'Xpressmag_Multiple_Block_Layout_Posts' );

    /**
     * Full Width Slider Block Layout Posts
    */
    register_widget( 'Xpressmag_Fullwidth_Slider_Block_Layout_Posts' );

    /**
     * Carousel Slider Display Block Layout Posts
    */
    register_widget( 'Xpressmag_Carousel_Block_Layout_Posts' );

    /**
     * Feature Block Posts
    */
    register_widget( 'Xpressmag_Feature_Block_Posts' );

    /**
     * Recent & Random Posts
    */
    register_widget( 'Xpressmag_Recent_Random_Block_Posts' );

    /**
     * Timeline Block Posts
    */
    register_widget( 'Xpressmag_Timeline_Block_Posts' );

    /**
     * Popular / Tags / Comments Tabs Block Posts
    */
    register_widget( 'Xpressmag_Tabbed_Block_Posts' );

}
add_action( 'widgets_init', 'xpressmag_register_widgets' );



/**
 * Carousel Slider Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_carousel_slider_layout_section' ) ) :

  function xpressmag_carousel_slider_layout_section( $xpressmag_block_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    if( $xpressmag_block_query->have_posts() ) {

      echo '<div class="owl-carousel xp_g_banner xp_banner_layout_one">';

      while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();

        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'xpressmag-carousel', true );
    ?>    
        <div class="item">
            <div class="banner_post_holder" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
                <div class="post_holder">
                    
                    <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                    <div class="post_title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                    <div class="meta">
                        <?php xpressmag_posted_on(); ?>
                    </div> <!-- // meta -->

                </div> <!-- // post_holder -->

                <div class="mask"></div>
            </div>
            <!-- // banner_post_holder -->
        </div>
        
    <?php

      }

      echo '</div>'; // owl-carousel banner_carousel

    } wp_reset_postdata();

  }
endif;

/**
 * Features Block Posts Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_features_posts_layout_section' ) ) :

  function xpressmag_features_posts_layout_section( $xpressmag_block_args, $xpressmag_features_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    $xpressmag_features_posts_query = new WP_Query( $xpressmag_features_args );

    ?>  
        <div class="xp_banner xp_banner_lay_two">
            <div class="banner_inner">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 left_gutter">
                      <div class="owl-carousel widget_features_posts">
                          <?php if( $xpressmag_block_query->have_posts() ) { while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post(); ?>
                              <article class="card">
                                  <div class="post_thumb">
                                      <?php
                                          the_post_thumbnail( 'xpressmag-fullgrid' );
                                      ?>
                                      <div class="post_holder">

                                          <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                                          <div class="post_title">
                                              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                          </div>

                                          <div class="meta">
                                              <?php xpressmag_posted_on(); ?>
                                          </div> <!-- // meta -->
                                      </div> <!-- // post_holder -->

                                      <div class="mask"></div>

                                  </div> <!-- // post_thumb -->
                              </article> <!-- // card -->
                          <?php } } wp_reset_postdata(); ?>
                      </div> 
                    </div><!-- // col -->

                    <div class="col-md-4 col-sm-12 col-xs-12 right_gutter">
                        <div class="right_post_holder">
                            <div class="row">
                              <?php if( $xpressmag_features_posts_query->have_posts() ) { while( $xpressmag_features_posts_query->have_posts() ) { $xpressmag_features_posts_query->the_post(); ?>
                                <div class="col-md-12 col-sm-6 col-xs-12 gutter_right_top">
                                    <article class="card">
                                        <div class="post_thumb">
                                            <?php
                                                the_post_thumbnail( 'xpressmag-grid' );
                                            ?>
                                            <div class="post_holder">
                                                <?php xpressmag_colors_category(); ?><!-- // entry_cats -->
                                                <div class="post_title">
                                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                </div>
                                                <div class="meta">
                                                    <?php xpressmag_posted_on(); ?>
                                                </div> <!-- // meta -->
                                            </div>
                                            <!-- // post_holder -->
                                            <div class="mask"></div>
                                        </div>
                                        <!-- // post_thumb -->
                                    </article>
                                    <!-- // card -->
                                </div><!-- // col -->
                              <?php } } wp_reset_postdata(); ?>
                            </div>
                            <!-- // row -->
                        </div>
                        <!-- // right_post_holder -->
                    </div> <!-- // col -->

                </div> <!-- // row -->
            </div> <!-- // banner_inner -->
        </div>
    <?php

  }
endif;


/**
 * Block First Posts Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_multiple_features_layout_section' ) ) :

  function xpressmag_multiple_features_layout_section( $xpressmag_block_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    if( $xpressmag_block_query->have_posts() ) {

      echo '<div class="row">';

      $count = 1;
      while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();

      if( $count == 1 ){
    ?>  
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <article class="card">
                <div class="post_thumb">
                    <?php
                        the_post_thumbnail( 'xpressmag-fullslider' );
                    ?>
                    <div class="post_holder">
                        
                        <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                        <div class="post_title">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="meta">
                            <?php xpressmag_posted_on(); ?>
                        </div> <!-- // meta -->

                    </div><!-- // post_holder -->
                </div>
                <!-- // post_thumb -->
                <div class="mask"></div>
            </article>
            <!-- // card -->
        </div> <!-- // col -->

    <?php }else{ ?>

        <!-- <div class="widget_one_bottom_posts"> -->
            <div class="col-md-6 col-sm-6 col-xs-12 gutter">
                <article class="card">
                    <div class="post_thumb">
                        <?php
                            the_post_thumbnail( 'xpressmag-fullgrid' );
                        ?>
                        <div class="post_holder">

                            <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                            <div class="post_title">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>

                            <div class="meta">
                                <?php xpressmag_posted_on(); ?>
                            </div><!-- // meta -->
                        </div> <!-- // post_holder -->
                    </div> <!-- // post_thumb -->

                    <div class="mask"></div>

                </article> <!-- // card -->
            </div>
        <!-- </div> --> <!-- // widget_one_bottom_posts -->

    <?php } $count++;  } 

      echo '</div>'; // owl-carousel banner_carousel

    } wp_reset_postdata();

  }
endif;

/**
 * Grid Block Posts Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_multiple_grid_layout_section' ) ) :

  function xpressmag_multiple_grid_layout_section( $xpressmag_block_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    if( $xpressmag_block_query->have_posts() ) {

      echo '<div class="post_widget_inner"><div class="row">';

      while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();
    ?>

        <div class="com-md-4 col-sm-4 col-xs-12 watchheight">
            <div class="box">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="post_thumb imghover">
                            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php
                                    the_post_thumbnail( 'xpressmag-grid' );
                                ?>
                            </a>
                        </div>
                    </div>
                    <!-- // col -->
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="right_box">
                            <div class="post_title">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="meta">
                                <?php xpressmag_posted_on( array( 'date', 'author' ) ); ?>
                            </div>
                            <!-- // meta -->
                        </div>
                        <!-- // right_box -->
                    </div>
                    <!-- // col -->
                </div>
                <!-- // row -->
            </div>
            <!-- // box -->
        </div><!-- // col -->
        
    <?php }

      echo '</div></div>'; // owl-carousel banner_carousel

    } wp_reset_postdata();

  }
endif;


/**
 * Large Grid Block Posts Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_multiple_large_grid_layout_section' ) ) :

  function xpressmag_multiple_large_grid_layout_section( $xpressmag_block_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    if( $xpressmag_block_query->have_posts() ) {

      echo '<div class="row">';

      while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();
    ?>

        <div class="col-md-4 col-sm-6 col-xs-12 watchheight">
            <div class="card">
                <div class="post_thumb imghover">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                            the_post_thumbnail( 'xpressmag-grid' );
                        ?>
                    </a>
                </div> <!-- // post_thumb -->

                <div class="card_content">

                     <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                    <div class="post_title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                    <div class="meta">
                        <?php xpressmag_posted_on(); ?>
                    </div>

                </div> <!-- // card_content -->
            </div> <!-- // card -->
        </div>
        
    <?php }

      echo '</div>'; // owl-carousel banner_carousel

    } wp_reset_postdata();

  }
endif;

/**
 * List Grid Block Posts Layout
 *
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_multiple_list_grid_layout_section' ) ) :

  function xpressmag_multiple_list_grid_layout_section( $xpressmag_block_args ) {

    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

    if( $xpressmag_block_query->have_posts() ) {

      while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();
    ?>  

        <div class="row boxes_holder">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="post_thumb imghover">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                            the_post_thumbnail( 'xpressmag-largegrid' );
                        ?>
                    </a>
                </div>
            </div> <!-- // col-->

            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="right_box">

                    <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                    <div class="post_title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                    <div class="the_content">
                        <?php the_excerpt(); ?>
                    </div> <!-- // the_content -->

                    <div class="meta">
                        <?php xpressmag_posted_on(); ?>
                    </div> <!-- // meta -->
                </div><!-- // rightbox -->
            </div><!-- // col-->
        </div>
        
    <?php }

    } wp_reset_postdata();

  }
endif;




if( class_exists( 'WP_Customize_control' ) ) { 

	 /**
     * Switch Controller ( Enable or Disable )
     *
     * @since 1.0.0
    */

    class Xpressmag_Switch_Control extends WP_Customize_Control{

        public $type = 'switch';

        public $on_off_label = array();

        public function __construct($manager, $id, $args = array() ){
            $this->on_off_label = $args['on_off_label'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
        ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                	<?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <?php
                $switch_class = ($this->value() == 'on') ? 'switch-on' : '';
                $on_off_label = $this->on_off_label;
            ?>
            <div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
                <div class="onoffswitch-inner">
                    <div class="onoffswitch-active">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
                    </div>

                    <div class="onoffswitch-inactive">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
                    </div>
                </div>  
            </div>
            <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
            <?php
        }
    }

    /**
     * Select Single Category Controller
     *
     * @since 1.0.0
    */

    class Xpressmag_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

      public $type = 'dropdown-taxonomies';

      public $taxonomy = '';


        public function __construct( $manager, $id, $args = array() ) {

            $our_taxonomy = 'category';

            if ( isset( $args['taxonomy'] ) ) {

                $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );

                if ( true === $taxonomy_exist ) {

                    $our_taxonomy = esc_attr( $args['taxonomy'] );

                }
            }

            $args['taxonomy'] = $our_taxonomy;

            $this->taxonomy = esc_attr( $our_taxonomy );

            parent::__construct( $manager, $id, $args );

        }

        public function render_content() {

        $tax_args = array(
          'hierarchical' => 0,
          'taxonomy'     => $this->taxonomy,
        );

        $all_taxonomies = get_categories( $tax_args );

        ?>
            <label>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                 <select <?php echo esc_url( $this->link() ); ?>>
                    <?php
                      printf('<option value="%1$s" %2$s>%3$s</option>', '', selected($this->value(), '', false), esc_html__('Select Single Category', 'xpressmag') );
                    ?>
                    <?php if ( ! empty( $all_taxonomies ) ): ?>
                      <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                        <?php
                          printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr( $tax->term_id ), selected($this->value(), esc_attr( $tax->term_id ), false), esc_html( $tax->name ) );
                         ?>
                      <?php endforeach ?>
                   <?php endif ?>
                 </select>

            </label>

        <?php }
    }

    /**
     * Page/Post Layout Controller
     *
     * @since 1.0.0
    */
    class Xpressmag_Customize_Control_Radio_Image extends WP_Customize_Control {
        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'radio-image';

        /**
         * Loads the jQuery UI Button script and custom scripts/styles.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button' );
        }

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();

            // We need to make sure we have the correct image URL.
            foreach ( $this->choices as $value => $args )
                $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

            $this->json['choices'] = $this->choices;
            $this->json['link']    = $this->get_link();
            $this->json['value']   = $this->value();
            $this->json['id']      = $this->id;
        }


        /**
         * Underscore JS template to handle the control's output.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */

        public function content_template() { ?>
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <div class="buttonset">

                <# for ( key in data.choices ) { #>

                    <input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} <# if ( key === data.value ) { #> checked="checked" <# } #> /> 

                    <label for="{{ data.id }}-{{ key }}">
                        <span class="screen-reader-text">{{ data.choices[ key ]['label'] }}</span>
                        <img src="{{ data.choices[ key ]['url'] }}" title="{{ data.choices[ key ]['label'] }}" alt="{{ data.choices[ key ]['label'] }}" />
                    </label>
                <# } #>

            </div><!-- .buttonset -->
        <?php }
    }

    /**
     * Customize controls for repeater field
     *
     * @since 1.0.0
     */
    class Xpressmag_Repeater_Controler extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'repeater';

        public $xpressmag_box_label = '';

        public $xpressmag_box_add_control = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();

        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            $this->fields = $fields;
            $this->xpressmag_box_label = $args['xpressmag_box_label'] ;
            $this->xpressmag_box_add_control = $args['xpressmag_box_add_control'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            $values = json_decode( $this->value() );
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php if( $this->description ){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <ul class="xmag-repeater-field-control-wrap">
                <?php $this->xpressmag_get_fields(); ?>
            </ul>

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="xmag-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <button type="button" class="button xmag-repeater-add-control-field"><?php echo esc_html( $this->xpressmag_box_add_control ); ?></button>
        <?php }

        private function xpressmag_get_fields(){
            $fields = $this->fields;
            $values = json_decode( $this->value() );

            if( is_array( $values ) ){
            foreach( $values as $value ){
        ?>
            <li class="xmag-repeater-field-control">
              <h3 class="xmag-repeater-field-title"><?php echo esc_html( $this->xpressmag_box_label ); ?></h3>
            
              <div class="xmag-repeater-fields">
                <?php
                    foreach ( $fields as $key => $field ) {
                    $class = isset( $field['class'] ) ? $field['class'] : '';
                ?>
                    <div class="xmag-repeater-field xmag-repeater-type-<?php echo esc_attr( $field['type'] ).' '. esc_attr( $class ); ?>">

                      <?php 
                          $label = isset( $field['label'] ) ? $field['label'] : '';
                          $description = isset( $field['description'] ) ? $field['description'] : '';
                          if( $field['type'] != 'checkbox' ) { 
                      ?>
                              <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                              <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                      <?php }

                          $new_value = isset( $value->$key ) ? $value->$key : '';
                          $default = isset( $field['default'] ) ? $field['default'] : '';

                          switch ( $field['type'] ) {

                              case 'text':
                                  echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_attr( $new_value ).'"/>';
                                  break;

                              case 'url':
                                  echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_url( $new_value ).'"/>';
                                  break;

                              case 'social_icon':
                                  echo '<div class="xmag-repeater-selected-icon">';
                                    echo '<i class="'.esc_attr( $new_value ).'"></i>';
                                    echo '<span><i class="fa fa-angle-down"></i></span>';
                                  echo '</div>';
                                  echo '<ul class="xmag-repeater-icon-list xmag-clearfix">';
                                    $xpressmag_font_awesome_social_icon_array = xpressmag_font_awesome_social_icon_array();
                                    foreach ( $xpressmag_font_awesome_social_icon_array as $xpressmag_font_awesome_icon ) {
                                        $icon_class = $new_value == $xpressmag_font_awesome_icon ? 'icon-active' : '';
                                        echo '<li class='. esc_attr( $icon_class ) .'><i class="'. esc_attr( $xpressmag_font_awesome_icon ) .'"></i></li>';
                                    }
                                  echo '</ul>';
                                  echo '<input data-default="'.esc_attr( $default ).'" type="hidden" value="'.esc_attr( $new_value ).'" data-name="'.esc_attr($key).'"/>';
                                  break;

                              default:
                                  break;
                          }
                      ?>
                    </div>

                <?php } ?>

                  <div class="xmag-clearfix xmag-repeater-footer">
                      <div class="alignright">
                      <a class="xmag-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'xpressmag' ) ?></a> |
                      <a class="xmag-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'xpressmag' ) ?></a>
                      </div>
                  </div>
              </div>

            </li>
            <?php }
            }
        }
    }


}