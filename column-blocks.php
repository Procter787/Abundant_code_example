<?php
/* Flexible Content - Column Blocks
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/column-block' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
$blocks = get_sub_field('block');
$marginTop = get_sub_field('shift_up');
$marginBottom = get_sub_field('shift_down');
$cancelMargin = get_sub_field('cancel_shift_on_small');
$full_color = get_sub_field('full_width_background');
 ?>


<?php if( get_row_layout() == 'column_blocks' ): ?>
    <div class="column-blocks  <?php if ($marginBottom): echo 'shift-down'; endif;?><?php if ($marginTop): echo 'shift-up'; endif;?> <?php if($cancelMargin): echo 'cancel-margin'; endif; if (!$full_color && 2142 !== get_the_ID()) : echo 'container'; endif; if(2142 === get_the_ID()): echo ''; endif; ?>" style="<?php if ($full_color) : echo ' padding-top: 5em; padding-bottom: 5em; margin-bottom: 0; background: '.$full_color; endif;?>">
        <?php if ($full_color) : echo '<div class="container">'; endif;?>
        <div class="row no-gutters justify-content-between">
            <?php foreach( $blocks as $block ) : 
                $width = $block['block_width'] ?? null; 
                $image = $block['image'] ?? null;
                $header = $block['header'] ?? null;
                $hover = $block['hover_content']['hover_color'] ?? null;
                $content = $block['hover_content']['content'] ?? null;
                $page_links = $block['hover_content']['page_links'] ?? null;
                $button = $block['hover_content']['button'] ?? null;
                $button_2 = $block['hover_content']['secondary_button'] ?? null;
                $hover_image = $block['hover_content']['hover_image'] ?? null;
                $second_column = $block['hover_content']['second_column'] ?? null;
                $main_button = $block['main_button'] ?? null;
                $testimonials = $block['testimonials'] ?? null;
                $video = $block['video'] ?? null;
                $thumbnail = $block['video_thumbnail'] ?? null;
                $black_and_white = $block['black_and_white_image_overlay'] ?? null;
                $reduced_size_block = $block['reduced_size_block'] ?? null;
                $testimonial_header = $block['testimonial_header'] ?? null;
                $form = $block['form_name'] ?? null;
                $link = $block['page_link'] ?? null;
            ?>
            <div class="col-sm-12 col-md-12 col-lg-<?php echo $width; ?> <?php if ($block['block_type'] == 'Header w/ Button'): echo 'banner-header'; endif; if ($block['block_type'] == 'Video'): echo 'video '; endif; if ($block['block_type'] == '2-Column Content'): echo 'two-column'; endif;  if ($block['block_type'] == 'Testimonials'): echo 'testimonial-container-alignment'; endif; if ($block['block_type'] == 'Form'): echo 'form-container form-container-alignment'; endif; ?>">
                <?php if ($block['block_type'] == 'Image' || $block['block_type'] == '2-Column Content') : ?>
                    <div class="block-overlay" style="<?php if($hover): echo 'background: '.$hover.'D9;'; endif; ?>"></div>
                    <div class="gradient-overlay"></div>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Abundant Dental Block Image'; ?>" />
                    <?php if ($header) : echo "<h3>".$header."<span class='arrow'></span></h3>"; endif; ?>
                    <?php if ($content || $page_links || $button) : ?>
                    <div class="hover-content <?php if ($hover_image) : echo "row justify-content-between no-gutters"; endif; ?>">
                        <?php if ($hover_image) : ?>
                        <div class='col-sm-12 col-md-8 col-lg-8 relative'><div class="content">
                        <?php endif; ?>
                        <div class="content-wrapper">
                            <?php if ($content) : echo "<p>".$content."</p>"; endif; ?>
                            <?php if ($page_links) : ?>
                            <?php foreach( $page_links as $link ) : ?>
                                <a href="<?php echo esc_url($link['link']['url'] ?? null); ?>" target="<?php echo esc_attr( $link['link']['target'] ? $link['link']['target'] : '_self' ); ?>"><?php echo $link['link']['title'] ?? '';?></a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($button) : ?>
                            <div class='hover-buttons'>
                                <a class="btn-secondary" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr( $button['target'] ? $button['target'] : '_self' ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                <?php if ($button_2) : ?>
                                <a class="btn-secondary hover" href="<?php echo esc_url($button_2['url']); ?>" target="<?php echo esc_attr( $button_2['target'] ? $button_2['target'] : '_self' ); ?>"><?php echo esc_html( $button_2['title'] ); ?></a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($block['block_type'] == '2-Column Content'): ?>
                        <div class="column-2">
                            <?php foreach ($second_column['info'] as $info): ?>
                                <div class='icon'>
                                    <img class="style-svg" alt="alt-text" src="<?php echo $info['icon']; ?>" />
                                    <p><?php echo $info['label'];?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if ($hover_image) : ?>
                        </div>
                        </div>
                        <div class="hover-image d-sm-none d-md-block col-md-4 col-lg-4">
                        <img src="<?php echo esc_url($hover_image['url']); ?>" alt="<?php echo esc_attr($hover_image['alt']) ?: 'Abundant Dental Block Image'; ?>" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                <?php elseif ($block['block_type'] == 'Header w/ Button') : ?>
                    <div class="gradient">
                        <?php if ($header) : echo "<h3>".$header."</h3>"; endif; ?>
                        <?php if ($main_button) : ?>
                        <a class="btn-primary" href="<?php echo esc_url($main_button['url']); ?>" target="<?php echo esc_attr( $main_button['target'] ? $main_button['target'] : '_self' ); ?>"><?php echo esc_html( $main_button['title'] ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php elseif ($block['block_type'] == 'Testimonials') : ?>
                    <div class="testimonial-box">
                        <div class="testimonials">
                            <div class="owl-carousel">
                                <?php if($testimonial_header){?>
                                    <div class="testimonial-header">
                                        <?php echo $testimonial_header ?>
                                    </div>
                               <?php } ?>
                                <?php foreach ($testimonials as $quote) : ?>
                                <div class="testimonial-slide">
                                    <div class="testimonial-header" style="color: #BB1C84; text-align: center; font-size: 36px; padding-top: 20px; padding-bottom: 20px; "> <?php echo $quote['testimonial_header'];?></div>
                                    <div class="testimonial" style="color: #939393; text-align: center;"><?php echo $quote['quote']; ?></div>
                                    <div class="details-block" style="text-align: center; padding-top: 20px;">
                                    <div class="details" style="width: 100%;">
                                        <div class="author" style="color: #939393;"><?php echo $quote['person']; ?></div>
                                        <div class="source"><?php echo $quote['date_source']; ?></div>
                                    </div>
                                </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php elseif ($block['block_type'] == 'Video') : ?>
                    <div class="embed-container">
                        <?php echo $video; ?>
                        <?php if ($black_and_white == false){?>
                            <?php if ($thumbnail) : ?>
                                <div class="video-overlay" style="filter: none; max-width: 100%; width: 100%; background: url(<?php echo $thumbnail; ?>) no-repeat center center / cover;"></div>
                                <div class="color-overlay"></div>
                                <button class="play-video"><img class="style-svg" alt="alt-text" src="<?php echo get_template_directory_uri() . '/images/play_video.svg';?>" /></button>
                            <?php endif; ?>
                        <?php } else{ ?>
                            <?php if ($thumbnail) : ?>
                                    <div class="video-overlay" style="background: url(<?php echo $thumbnail; ?>) no-repeat center center / cover;"></div>
                                    <div class="color-overlay"></div>
                                    <button class="play-video"><img class="style-svg" alt="alt-text" src="<?php echo get_template_directory_uri() . '/images/play_video.svg';?>" /></button>
                            <?php endif; ?>
                        <?php } ?>

                    </div>
                <?php elseif ($block['block_type'] == 'Form') : ?>
                    <div class='contact-form col-sm-12 col-md-12 col-lg-12' >
                        <div class="block-overlay form-overlay"  "></div>
                        <?php /* <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Abundant Dental Block Image'; ?>" /> */?>
                        <?php foreach( $form as $p ): // variable must NOT be called $post (IMPORTANT) 
                            $cf7_id= $p->ID;
                            if($p->post_title == 'Request An Appointment') {
                                echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" html_id="normal_form"]' );
                                $posttitle = 'Emergency Appointment';
                                $postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'" );
                                if ($postid) {
                                    echo do_shortcode( '[contact-form-7 id="'.$postid.'" html_id="emergency_form"]' );
                                }
                            } else {
                                echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
                            }
                        endforeach; ?>
                    </div>
                <?php elseif ($block['block_type'] == 'Image Link') : ?>
                    <div class="gradient-overlay">
                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr( $link['target'] ? $link['target'] : '_self' ); ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Abundant Dental Block Image'; ?>" />
                            <?php echo "<h3>".$link['title']."<span class='arrow'></span></h3>"; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if ($full_color) : echo '</div>'; endif;?>
    </div>
<?php endif; ?>