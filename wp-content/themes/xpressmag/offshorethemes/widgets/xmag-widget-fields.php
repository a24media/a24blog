<?php
/**
 * Define custom fields for widgets
 * 
 * @package Offshore Themes
 *
 * @subpackage Xpressmag
 *
 * @since 1.0.0
 */

function xpressmag_widgets_show_widget_field( $instance = '', $widget_field = '', $xmag_widget_field_value = '' ) {
    
    extract( $widget_field );

    switch ( $xpressmag_widgets_field_type ) {

        /**
         * Text field
         */
        case 'text' :
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_attr( $xpressmag_widgets_title ); ?></label></span>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" type="text" value="<?php echo esc_attr( $xmag_widget_field_value ); ?>" />

                <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * URL field
         */
        case 'url' :
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" type="text" value="<?php echo esc_url( $xmag_widget_field_value ); ?>" />

                <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * Number field
         */
        case 'number' :
            if( empty( $xmag_widget_field_value ) ) {
                $xmag_widget_field_value = $xpressmag_widgets_default;
            }
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span>
                <input name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" value="<?php echo esc_attr( $xmag_widget_field_value ); ?>" class="widefat" />

                <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * Textarea field
         */
        case 'textarea' :
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span>
                <textarea class="widefat" rows="<?php echo absint( $xpressmag_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>"><?php echo esc_textarea( $xmag_widget_field_value ); ?></textarea>
            </p>
        <?php
            break;
        
        /**
         * Checkbox field
         */
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $xmag_widget_field_value ); ?>/>
                <label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?></label>

                <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Select field
         */
        case 'select' :
            if( empty( $xmag_widget_field_value ) ) {
                $xmag_widget_field_value = $xpressmag_widgets_default;
            }

        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span> 
                <select name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $xpressmag_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
                        <option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $xmag_widget_field_value ); ?>><?php echo esc_html( $athm_option_title ); ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * Multiple checkboxes field
         */
        case 'multicheckboxes':
        ?>
            <p><span class="field-label"><label><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span></p>

            <div class="xmag-single-checkbox">
                <?php    
                    foreach ( $xpressmag_widgets_field_options as $athm_option_name => $athm_option_title) {
                        if( isset( $xmag_widget_field_value[$athm_option_name] ) ) {
                            $xmag_widget_field_value[$athm_option_name] = 1;
                        }else{
                            $xmag_widget_field_value[$athm_option_name] = 0;
                        }
                    
                ?>
                    
                        <p>
                            <input id="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ).'['.$athm_option_name.']' ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ).'['.$athm_option_name.']' ); ?>" type="checkbox" value="1" <?php checked('1', $xmag_widget_field_value[$athm_option_name]); ?>/>
                            <label for="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ).'['.$athm_option_name.']' ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                        </p>
                    
                <?php } ?>
            </div><!-- .xmag-single-checkbox -->

            <?php
                if ( isset( $xpressmag_widgets_description ) ) {
            ?>
                    <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
            <?php
                }
            break;

        /**
         * Selector field
         */
        case 'selector':
            if( empty( $xmag_widget_field_value ) ) {
                $xmag_widget_field_value = $xpressmag_widgets_default;
            }
        ?>
            <p><span class="field-label"><label class="field-title"><?php echo esc_html( $xpressmag_widgets_title ); ?></label></span></p>
        <?php            
            echo '<div class="selector-labels">';
            foreach ( $xpressmag_widgets_field_options as $option => $val ){
                $class = ( $xmag_widget_field_value == $option ) ? 'selector-selected': '';
                echo '<label class="'. esc_attr( $class ).'" data-val="'.esc_attr( $option ).'">';
                echo '<img src="'.esc_url( $val ).'"/>';
                echo '</label>'; 
            }
            echo '</div>';
            echo '<input data-default="'.esc_attr( $xmag_widget_field_value ).'" type="hidden" value="'.esc_attr( $xmag_widget_field_value ).'" name="'.esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ).'"/>';
            break;

        /**
         * Upload field
         */
        case 'upload':
            $image = $image_class = "";
            if( $xmag_widget_field_value ){ 
                $image = '<img src="'.esc_url( $xmag_widget_field_value ).'" style="max-width:100%;"/>';    
                $image_class = ' hidden';
            }
        ?>
            <div class="attachment-media-view">

            <p><span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>"><?php echo esc_html( $xpressmag_widgets_title ); ?>:</label></span></p>
            
                <div class="placeholder<?php echo esc_attr( $image_class ); ?>">
                    <?php esc_html_e( 'No image selected', 'xpressmag' ); ?>
                </div>
                <div class="thumbnail thumbnail-image">
                    <?php echo wp_kses_post ( $image ); ?>
                </div>

                <div class="actions xmag-clearfix">
                    <button type="button" class="button xmag-delete-button align-left"><?php esc_html_e( 'Remove', 'xpressmag' ); ?></button>
                    <button type="button" class="button xmag-upload-button alignright"><?php esc_html_e( 'Select Image', 'xpressmag' ); ?></button>
                    
                    <input name="<?php echo esc_attr( $instance->get_field_name( $xpressmag_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $xpressmag_widgets_name ) ); ?>" class="upload-id" type="hidden" value="<?php echo esc_url( $xmag_widget_field_value ) ?>"/>
                </div>

            <?php if ( isset( $xpressmag_widgets_description ) ) { ?>
                <br />
                <em><?php echo wp_kses_post( $xpressmag_widgets_description ); ?></em>
            <?php } ?>

            </div><!-- .attachment-media-view -->
        <?php
            break;
    }
}

function xpressmag_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    if ( $xpressmag_widgets_field_type == 'number') {
        return absint( $new_field_value );
    } elseif ( $xpressmag_widgets_field_type == 'textarea' ) {
        return sanitize_textarea_field( $new_field_value );
    } elseif ( $xpressmag_widgets_field_type == 'url' ) {
        return esc_url( $new_field_value );
    } elseif( $xpressmag_widgets_field_type == 'multicheckboxes' ) {
        return wp_kses_post( $new_field_value );
    } else {
        return strip_tags( $new_field_value );
    }
}