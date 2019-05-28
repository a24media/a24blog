<html>
    <head>
        <title><?php _e( 'Form Preview', 'anonymous-post-pro' ); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
            .ap-preview-subtitle a { color: #116CB9;}.ap-form-preview-wrap {
                width: 60%;
                margin: 0 auto;
                padding: 60px;
                background: #fff;
                box-shadow: 0 0 2px;
                margin-bottom: 20px;
            }
            .ap-preview-title-wrap {
                text-align: center;
                font-size: 20px;
            }
            .ap-preview-note {
                width: 60%;
                margin: 20px auto;
                font-size: 15px;
                text-align: center;
            }
        </style>

    </head>
    <body>
        <div class="ap-preview-title-wrap">
            <div class="ap-preview-title"><?php _e( 'Preview Mode', 'ultimate-form-builder-lite' ); ?></div>
        </div>
        <div class="ap-preview-note"><?php _e( 'This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', 'ultimate-form-builder-lite' ); ?></div>
        <div class="ap-form-preview-wrap">

            <?php
            $form_id = sanitize_text_field( $_GET['form_id'] );
            echo do_shortcode( '[ap-form id="' . $form_id . '"]' );
            ?>
        </div>

    </body>

</html>

