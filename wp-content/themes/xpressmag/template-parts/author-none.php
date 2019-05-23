<div class="author_box">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="author_thumb">
                <?php echo wp_kses_post( get_avatar( get_the_author_meta('email'), 160) ); ?>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="author_details">
                <div class="author_name">
                    <h3><?php the_author_meta('display_name'); ?></h3>
                </div>
                <div class="author_desc">
                    <p><?php the_author_meta('description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>