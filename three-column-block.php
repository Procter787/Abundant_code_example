<?php
/* Flexible Content - Three Column Block
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/three-column-block' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/

$featured_blocks        = get_sub_field('featured_block');
$add_featured_block     = get_sub_field('add_featured_block');
$blocks                 = get_sub_field('block');
$marginTop              = get_sub_field('shift_up');
$marginBottom           = get_sub_field('shift_down');
$full_color             = get_sub_field('full_width_background');
$modal                  = get_sub_field('modal_text_pop_up');
?>


<?php if( get_row_layout() == 'three_column_blocks' ): ?>
    <div class="three-column-container <?php if (!$full_color) : echo 'container no-background'; endif;?>" style="<?php if ($full_color) : echo ' padding-top: 200px; padding-bottom: 200px; background: '.$full_color.';'; endif;?> <?php if ($marginTop) : echo ' margin-top: 150px; margin-bottom: 0; padding-top: 50px'; endif; ?> <?php if ($marginBottom) : echo ' margin-bottom: 150px; margin-top: 0; padding-bottom: 50px'; endif; ?>">
        <?php if ($full_color) : echo '<div class="container">'; endif;?>
        <div class="row justify-content-between" style="<?php if ($marginTop) : echo 'margin-top: -100px; '; endif; ?><?php if ($marginBottom) : echo 'margin-bottom: -100px; '; endif; ?>">

        <?php if($add_featured_block == 1){ ?>
            <?php foreach( $featured_blocks as $index=>$featured_block ) : 
                $featured_text          = $featured_block['featured_text']; 
                $featured_preview_text  = $featured_block['featured_preview_text']; 
                $featured_image         = $featured_block['featured_image'];
                $featured_page          = $featured_block['featured_page'];
                $featured_header        = $featured_block['featured_no_link_header'];
                $featured_sub           = $featured_block['featured_sub_header'];
            ?>
            
            <div class="block col-lg-12 d-lg-flex">
                <div class="col-sm-12 col-md-12 col-lg-6" style="max-height: 400px;">
                    <?php if ($featured_image) : ?><?php if ($modal) : ?><a href="#featured-team<?php echo $index; ?>" data-toggle="modal" data-target="#featured-team<?php echo $index; ?>"><?php endif; ?><img style="max-height: 400px;" src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($featured_image['alt']) ?: 'Abundant Dental Block Image'; ?>" /><?php if ($modal) : ?></a><?php endif; ?><?php endif; ?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                <?php if ($featured_page) : ?>
                <a href="<?php echo esc_url($featured_page['url']); ?>" target="<?php echo esc_attr( $featured_page['target'] ? $featured_page['target'] : '_self' ); ?>">
                    <h4><?php echo $featured_page['title']; ?><?php if ($featured_sub) : echo "<span>".$featured_sub."</span>"; endif?></h4>
                </a>
                <?php else : ?>
                    <h4><?php echo $featured_header; ?><?php if ($featured_sub) : echo "<span>".$featured_sub."</span>"; endif?></h4>
                <?php endif; ?>
                <?php if ($featured_preview_text) : ?>
                    <div><?php echo $featured_preview_text; ?></div>
                <?php endif; ?>
                <?php if ($modal) : ?>
                    <p class='more'>
                        <a href="#featured-team<?php echo $index; ?>" data-toggle="modal" data-target="#featured-team<?php echo $index; ?>">Read More<span class="arrow"></span></a>
                    </p>
                    <div class="modal" id="featured-team<?php echo $index; ?>" tabindex="-1" aria-labelledby="featured-team<?php echo $index; ?>-label" aria-hidden="true">
                        <div class="vertical-alignment-helper">
                            <div class="modal-dialog vertical-align-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?php echo $featured_header; ?><?php if ($featured_sub) : echo "<span>".$featured_sub."</span>"; endif?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="row modal-body">
                                        <?php if ($featured_image) : ?><img class="col-sm-12 col-md-12 col-lg-3 mb-20" style="max-height: 293.75px;" src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($featured_image['alt']) ?: 'Abundant Dental Block Image'; ?>" /><?php endif; ?>
                                        <p class="col-sm-12 col-md-12 <?php if ($featured_image) : echo 'col-lg-9'; else: echo 'col-lg-12'; endif;?>"><?php echo $featured_text; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php if ($featured_text) : ?><p><?php echo $featured_text; ?></p><?php endif; ?>
                    <?php if ($featured_page) : ?>
                    <p class='more'>
                        <a href="<?php echo esc_url($page['url']); ?>" target="<?php echo esc_attr( $page['target'] ? $page['target'] : '_self' ); ?>">Learn More<span class="arrow"></span></a>
                    </p>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>

        <?php }; ?>
            <?php foreach( $blocks as $index=>$block ) : 
                $text               = $block['text']; 
                $image              = $block['image'];
                $add_white_border   = $block['add_white_border'];
                $page               = $block['page'];
                $header             = $block['no_link_header'];
                $sub                = $block['sub_header'];
            ?>
            
            <div class="block col-sm-12 col-md-6 col-lg-4">
                <?php if ($image) : ?><?php if ($modal) : ?><a href="#team<?php echo $index; ?>" data-toggle="modal" data-target="#team<?php echo $index; ?>"><?php endif; ?><img class="<?php if($add_white_border == 0){echo "no-border";} ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Abundant Dental Block Image'; ?>" /><?php if ($modal) : ?></a><?php endif; ?><?php endif; ?>
                <?php if ($page) : ?>
                <a href="<?php echo esc_url($page['url']); ?>" target="<?php echo esc_attr( $page['target'] ? $page['target'] : '_self' ); ?>">
                    <h4><?php echo $page['title']; ?><?php if ($sub) : echo "<span>".$sub."</span>"; endif?></h4>
                </a>
                <?php else : ?>
                    <h4><?php echo $header; ?><?php if ($sub) : echo "<span>".$sub."</span>"; endif?></h4>
                <?php endif; ?>
                <?php if ($modal) : ?>
                    <p class='more'>
                        <a href="#team<?php echo $index; ?>" data-toggle="modal" data-target="#team<?php echo $index; ?>">Read More<span class="arrow"></span></a>
                    </p>
                    <div class="modal" id="team<?php echo $index; ?>" tabindex="-1" aria-labelledby="team<?php echo $index; ?>-label" aria-hidden="true">
                        <div class="vertical-alignment-helper">
                            <div class="modal-dialog vertical-align-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?php echo $header; ?><?php if ($sub) : echo "<span>".$sub."</span>"; endif?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="row modal-body">
                                        <?php if ($image) : ?><img class="col-sm-12 col-md-12 col-lg-3 mb-20" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Abundant Dental Block Image'; ?>" /><?php endif; ?>
                                        <p class="col-sm-12 col-md-12 <?php if ($image) : echo 'col-lg-9'; else: echo 'col-lg-12'; endif;?>"><?php echo $text; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php if ($text) : ?><p><?php echo $text; ?></p><?php endif; ?>
                    <?php if ($page) : ?>
                    <p class='more'>
                        <a href="<?php echo esc_url($page['url']); ?>" target="<?php echo esc_attr( $page['target'] ? $page['target'] : '_self' ); ?>">Learn More<span class="arrow"></span></a>
                    </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if ($full_color) : echo '</div>'; endif;?>
    </div>
<?php endif; ?>