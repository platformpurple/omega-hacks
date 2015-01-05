<div class="figure <?php echo implode( ' ', $figure_classes ); ?> <?php echo $image_stretch  ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
    <?php if( !empty( $hover_link ) ) : ?>
        <?php if( $hover_link == 'html' ): ?>
            <div id="portfolio-html-container-<?php echo get_the_ID() ?>" class="portfolio-html-container mfp-hide mfp-with-zoom">
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                <h2><?php echo get_the_title()?></h2>
                <div><?php echo get_the_content()?></div>
            </div>
            <a href="#portfolio-html-container-<?php echo get_the_ID() ?>" class="open-popup-link-<?php echo get_the_ID() ?> figure-image">
            <script type="text/javascript">
                jQuery(function() {

                        jQuery('.open-popup-link-<?php echo get_the_ID() ?>').magnificPopup({
                            type: 'inline',
                            removalDelay: 300,
                            midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
                        	mainClass: 'mfp-fade'
                        });

                });
            </script>
            <style type="text/css">
                .portfolio-html-container{
                    max-width: 1200px;
                    margin: 0 auto;
                    background: #fff;
                    padding: 15px;
                    box-shadow: 1px 1px 10px #ccc;
                    margin-top: 50px;
                    position: relative;
                }
                .portfolio-html-container h2{
                    padding-bottom: 20px;
                }

                .portfolio-html-container .mfp-close{
                    top: 0;
                }
                @media (max-width: 1200px){
                    .portfolio-html-container {
                        max-width: 1000px;
                    }
                }

                @media (max-width: 991px){
                    .portfolio-html-container {
                        max-width: 780px;
                    }
                }
                /* overlay at start */
.mfp-fade.mfp-bg {
  opacity: 0;

  -webkit-transition: all 0.15s ease-out;
  -moz-transition: all 0.15s ease-out;
  transition: all 0.15s ease-out;
}
/* overlay animate in */
.mfp-fade.mfp-bg.mfp-ready {
  opacity: 0.8;
}
/* overlay animate out */
.mfp-fade.mfp-bg.mfp-removing {
  opacity: 0;
}

/* content at start */
.mfp-fade.mfp-wrap .mfp-content {
  opacity: 0;

  -webkit-transition: all 0.15s ease-out;
  -moz-transition: all 0.15s ease-out;
  transition: all 0.15s ease-out;
}
/* content animate it */
.mfp-fade.mfp-wrap.mfp-ready .mfp-content {
  opacity: 1;
}
/* content animate out */
.mfp-fade.mfp-wrap.mfp-removing .mfp-content {
  opacity: 0;
}
            </style>
        <?php else: ?>
            <a href="<?php echo $hover_link; ?>" class="figure-image <?php echo implode( ' ', $hover_link_classes ); ?>" data-links="<?php echo implode( ',', $gallery_images ); ?>" target="<?php echo $link_target; ?>">
        <?php endif;?>
    <?php else : ?>
        <span class="figure-image">
    <?php endif; ?>

    <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" class="<?php echo $image_stretch  ?>"/>
    <?php if( $overlay !== 'none' ) : ?>
    <div class="figure-overlay <?php echo implode( ' ', $overlay_classes ); ?>">
        <div class="figure-overlay-container">
            <?php if( $overlay === 'caption' || $overlay === 'strip' ) : ?>
                <div class="figure-caption">
                    <h3 class="figure-caption-title bordered bordered-small"><?php echo $caption_title; ?></h3>
                    <p class="figure-caption-description"><?php echo $caption_text; ?></p>
                </div>
            <?php elseif( $overlay === 'icon' ) : ?>
                <span class="figure-icon">
                    <?php include OXY_THEME_DIR . 'assets/images/svg/' . $overlay_icon . '.svg'; ?>
                </span>
            <?php elseif( $overlay === 'buttons' || $overlay === 'buttons_only' ) : ?>
                <div class="figure-caption">
                    <?php if( $overlay === 'buttons' ) : ?>
                        <h4 class="figure-caption-title element-small-bottom bordered bordered-small"><?php echo $caption_title; ?></h4>
                    <?php endif; ?>
                    <p class="figure-caption-description">
                        <a href="<?php echo $magnific_link_url; ?>" class="btn btn-primary btn-sm <?php echo implode( ' ', $magnific_link_classes ); ?>" data-links="<?php echo implode( ',', $gallery_images ); ?>"><?php echo $button_text_zoom; ?></a>
                        <a href="<?php echo $link; ?>" class="btn btn-primary btn-sm" target="<?php echo $link_target; ?>"><?php echo $button_text_details; ?></a>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if( !empty( $hover_link ) ) : ?>
        </a>
    <?php else : ?>
        </span>
    <?php endif; ?>

<?php if( $captions_below === 'show' ) : ?>
    <div class="figure-caption text-<?php echo $caption_align; ?>">
        <h3 class="figure-caption-title bordered bordered-small <?php if( !empty( $below_title_link ) ) { echo 'bordered-link'; } ?>">
            <?php if( !empty( $below_title_link ) ) : ?>
                <a href="<?php echo $below_title_link; ?>" class="<?php echo implode( ' ', $below_title_link_classes ); ?>" data-links="<?php echo implode( ',', $gallery_images ); ?>" target="<?php echo $link_target; ?>">
            <?php endif; ?>
            <?php echo $caption_title; ?>
            <?php if( !empty( $below_title_link ) ) : ?>
                </a>
            <?php endif; ?>
        </h3>
        <p class="figure-caption-description"><?php echo $caption_text; ?></p>
    </div>
<?php endif; ?>
</div>
