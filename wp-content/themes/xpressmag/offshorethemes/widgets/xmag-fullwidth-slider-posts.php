<?php
/**
 * Xmag: Full Width Slider Multiple Layout Block
 *
 * Widget show the block posts from selected category in different slider layouts.
 *
 * @package Offshore Themes
 * @subpackage Xpressmag
 * @since 1.0.0
 */

class Xpressmag_Fullwidth_Slider_Block_Layout_Posts extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {

        $widget_ops = array( 
            'classname' => 'xpressmag_full_slider_block xmag-clearfix',
            'description' => esc_html__( 'Displays block posts from selected category in full slider layouts.', 'xpressmag' )
        );

        parent::__construct( 'xpressmag_full_slider_block', esc_html__( 'Xmag: Full Slider Posts', 'xpressmag' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $xpressmag_categories_lists = xpressmag_categories_lists();
        
        $fields = array(

            'block_title' => array(
                'xpressmag_widgets_name'         => 'block_title',
                'xpressmag_widgets_title'        => esc_html__( 'Block Layout Title', 'xpressmag' ),
                'xpressmag_widgets_description'  => esc_html__( 'Enter your block title. (Optional - Leave blank to hide the title.)', 'xpressmag' ),
                'xpressmag_widgets_field_type'   => 'text'
            ),

            'block_cat_id' => array(
                'xpressmag_widgets_name'         => 'block_cat_id',
                'xpressmag_widgets_title'        => esc_html__( 'Select Block Category', 'xpressmag' ),
                'xpressmag_widgets_default'      => 0,
                'xpressmag_widgets_field_type'   => 'multicheckboxes',
                'xpressmag_widgets_field_options' => $xpressmag_categories_lists
            ),

            'block_posts_count' => array(
                'xpressmag_widgets_name'         => 'block_posts_count',
                'xpressmag_widgets_title'        => esc_html__( 'No. of Posts', 'xpressmag' ),
                'xpressmag_widgets_default'      => '5',
                'xpressmag_widgets_field_type'   => 'number'
            ),

        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $xpressmag_block_title        = apply_filters( 'widget_title', !empty( $instance['block_title'] ) ? $instance['block_title'] : '', $instance, $this->id_base );
        $xpressmag_block_cat_id       = empty( $instance['block_cat_id'] ) ? '' : $instance['block_cat_id'];
        $xpressmag_block_post_count   = empty( $instance['block_posts_count'] ) ? 5 : $instance['block_posts_count'];


        if( !empty( $xpressmag_block_cat_id ) ) {
            $checked_cats = array();
            foreach( $xpressmag_block_cat_id as $cat_key => $cat_value ){            
                $checked_cats[] = $cat_key;
            }
        } else {
            return;
        }

        $xpressmag_get_cats_ids = implode( ",", $checked_cats );

        $xpressmag_block_args = array(
                'cat' => $xpressmag_get_cats_ids,
                'posts_per_page' => absint( $xpressmag_block_post_count )
            );

        echo $before_widget;
    ?>
        
        <div class="xp_post_widget_eleven section_spacing">
            <div class="section_inner">
                <?php
                    if ( ! empty( $xpressmag_block_title ) ) {

                        echo $args['before_title'] . esc_html( $xpressmag_block_title ) . $args['after_title'];
  
                    }
               
                    $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

                    if( $xpressmag_block_query->have_posts() ) {

                    echo '<div class="owl-carousel widget_eleven_carousel">';

                    while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();
                ?>
                        <div class="item">
                            <article class="card">
                                <div class="post_thumb">

                                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                        <?php
                                            the_post_thumbnail( 'xpressmag-fullslider' );
                                        ?>
                                    </a>

                                    <div class="post_holder">
                                        
                                        <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                                        <div class="post_title">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>

                                        <div class="meta">
                                            <?php xpressmag_posted_on(); ?>
                                        </div> <!-- // meta -->
                                    </div> <!-- // post_holder -->

                                </div> <!-- // post_thumb -->

                                <div class="mask"></div>

                            </article>
                            <!-- // card -->
                        </div> <!-- // item -->
                <?php }

                    echo '</div>';

                     } wp_reset_postdata();
                ?>
            </div>
            <!-- // section_inner -->
        </div><!-- // xp_post_widget_eleven -->

    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    xpressmag_widgets_updated_field_value()     defined in xmag-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$xpressmag_widgets_name] = xpressmag_widgets_updated_field_value( $widget_field, $new_instance[$xpressmag_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    xpressmag_widgets_show_widget_field()       defined in xmag-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $xpressmag_widgets_field_value = !empty( $instance[$xpressmag_widgets_name] ) ? wp_kses_post( $instance[$xpressmag_widgets_name] ) : '';
            xpressmag_widgets_show_widget_field( $this, $widget_field, $xpressmag_widgets_field_value );
        }
    }
}