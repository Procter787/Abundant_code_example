<?php if (get_row_layout() == 'news_article') : ?>
  <?php


  /**
   * news article
   * The template part for displaying news article
   * <?php get_template_part( 'global-templates/news-article' ); ?>
   */

  $custom_section_title_or_use_category_title = get_sub_field('custom_section_title_or_use_category_title');
  $select_news_post                           = get_sub_field('select_news_post');
  $custom_section_title                       = get_sub_field('custom_section_title');
  $social_icons                               = get_sub_field('social_icons'); //repeater
  // $how_many_posts_to_display = get_sub_field('how_many_posts_to_display');
  ?>

  <div class="blog-posts">
    <div class="container">
      <div class="row ">
        <div class="col-12 col-lg-10">
          <span class='blog-posts-header'>
            <h1><?php echo $custom_section_title; ?></h1>
          </span>
          <div class="border-title"></div>
        </div>
        <div class="social-links col-lg-2 d-flex">
            <?php 
            if (!empty($social_icons)) {
              foreach ($social_icons as $social_icon) {
            ?>
                <div class="social-link">
								  <a class="text-black social-media-link  mr-20" href="<?php echo $social_icon['social_media_profile']; ?>"><?php echo $social_icon['font_awesome_icon']; ?></a>
                </div>
            <?php
              }
            }
            ?>
          </div>
      </div>
      <div class="row">
        <?php
        // $select_news_post   = the_sub_field('select_news_post');
        // echo '<pre>' . print_r($v, 1) . '</pre>'
        if (is_array($select_news_post)) {
          $first_post = $select_news_post[0]->ID;
        };
        ?>
        <div class="col-lg-6 col-sm-12">
          <div class="big-box pt-1 pb-1 pr-0 pl-0">
            <img src="<?php echo get_the_post_thumbnail_url($first_post) ?>"></img>
            <div class="color-overlay p-1">
              <div class="card-content">
                <p><?php echo get_the_title($first_post) ?></p>
                <a href="<?php the_permalink($first_post); ?>">READ MORE></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="row h-100">
            <?php if ($select_news_post) { ?>
              <?php foreach ($select_news_post as $k => $v) {
                if ($v->ID != $first_post) {
                  $post_image       = wp_get_attachment_url(get_post_thumbnail_id($v->ID), 'single-post-thumbnail');
                  $post_title       = get_the_title($v->ID); ?>
                  <div class="col-lg-6 col-sm-12 p-1">
                    <div class="mini-box">
                      <img class='' src="<?php echo $post_image ?>">
                      <div class="color-overlay p-1">
                        <div class="card-content p-20">
                          <p><?php echo $post_title; ?></p>
                          <a href="<?php the_permalink($v); ?>">READ MORE></a>
                        </div>
                      </div>
                      </img>
                    </div>
                  </div>
                <?php } ?>
              <?php }; ?>
            <?php }; ?>
          </div>
        </div>
        <?php
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>
