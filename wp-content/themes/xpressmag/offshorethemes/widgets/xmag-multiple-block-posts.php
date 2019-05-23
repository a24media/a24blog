<?php
/**
 * Xmag: Multiple Layout Block
 *
 * Widget show the block posts from selected category in different layouts.
 *
 * @package Offshore Themes
 * @subpackage Xpressmag
 * @since 1.0.0
 */

class Xpressmag_Multiple_Block_Layout_Posts extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {

        $widget_ops = array( 
            'classname' => 'xpressmag_block_posts xmag-clearfix',
            'description' => esc_html__( 'Displays block posts from selected category in different layouts.', 'xpressmag' )
        );

        parent::__construct( 'xpressmag_block_posts', esc_html__( 'Xmag: Multiple Block Layout', 'xpressmag' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $xpressmag_categories_dropdown = xpressmag_categories_dropdown();
        
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
                'xpressmag_widgets_field_type'   => 'select',
                'xpressmag_widgets_field_options' => $xpressmag_categories_dropdown
            ),

            'block_posts_count' => array(
                'xpressmag_widgets_name'         => 'block_posts_count',
                'xpressmag_widgets_title'        => esc_html__( 'No. of Posts', 'xpressmag' ),
                'xpressmag_widgets_default'      => '6',
                'xpressmag_widgets_field_type'   => 'number'
            ),

            'block_layout' => array(
                'xpressmag_widgets_name'         => 'block_layout',
                'xpressmag_widgets_title'        => esc_html__( 'Select Block Display Layouts', 'xpressmag' ),
                'xpressmag_widgets_default'      => 'layout1',
                'xpressmag_widgets_field_type'   => 'selector',
                'xpressmag_widgets_field_options' => array(
                    'layout1' => esc_url( get_template_directory_uri() . '/assets/dist/images/archive-layout2.png' ),
                    'layout2' => esc_url( get_template_directory_uri() . '/assets/dist/images/block-layout2.png' ),
                    'layout3' => esc_url( get_template_directory_uri() . '/assets/dist/images/block-layout3.png' ),
                    'layout4' => esc_url( get_template_directory_uri() . '/assets/dist/images/block-layout4.png' )
                )
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

        $xpressmag_block_title    = apply_filters( 'widget_title', !empty( $instance['block_title'] ) ? $instance['block_title'] : '', $instance, $this->id_base );
        $xpressmag_block_cat_id   = empty( $instance['block_cat_id'] ) ? '' : $instance['block_cat_id'];
        $xpressmag_posts_count    = empty( $instance['block_posts_count'] ) ? 6 : $instance['block_posts_count'];
        $xpressmag_block_layout   = empty( $instance['block_layout'] ) ? 'layout1' : $instance['block_layout'];

        if( $xpressmag_block_layout == 'layout1' ){
            $layoutclass = 'xp_post_widget_one';
        }elseif( $xpressmag_block_layout == 'layout2' ){
            $layoutclass = 'xp_post_widget_six';
        }elseif( $xpressmag_block_layout == 'layout3' ){
            $layoutclass = 'xp_post_widget_three';
        }elseif( $xpressmag_block_layout == 'layout4' ){
            $layoutclass = 'xp_post_widget_five';
        }else{
            $layoutclass = 'xp_post_widget_one';
        }

        $xpressmag_block_args = array(
                'cat' => $xpressmag_block_cat_id,
                'posts_per_page' => absint( $xpressmag_posts_count )
            );

        echo $before_widget;
    ?>
        <div class="<?php echo esc_attr( $layoutclass ); ?> section_spacing">
            <div class="section_inner">
                <?php
                    if ( ! empty( $xpressmag_block_title ) ) {

                        echo $args['before_title'] . esc_html( $xpressmag_block_title ) . $args['after_title'];

                    }
                    
                    switch ( $xpressmag_block_layout ) {

                        case 'layout2':

                            xpressmag_multiple_grid_layout_section( $xpressmag_block_args );

                            break;

                        case 'layout3':

                            xpressmag_multiple_large_grid_layout_section( $xpressmag_block_args );

                            break;

                        case 'layout4':

                            xpressmag_multiple_list_grid_layout_section( $xpressmag_block_args );

                            break;
                        
                        default:

                            xpressmag_multiple_features_layout_section( $xpressmag_block_args );

                            break;
                    }
                ?>
            </div>
        </div>
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