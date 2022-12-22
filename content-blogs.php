<?php
/**
 * The template for displaying archive Blog page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EpicPress
 */

$categories = get_terms(array('taxonomy' => 'category', 'ignore_term_order' => TRUE, 'order_by' => 'name', 'order' => 'ASC' ));
$current = get_queried_object();
$args = [
    'posts_per_page'   => -1,
    'cat'         => 1,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post'
];
$featured = get_posts($args);//var_dump($posts);
?>

	<main id="primary" class="site-main">
        <div class="hero-banner">
            <?php
            $hero_image = get_field('main_image', 'options'); ?>
            <div class="container">
                <h1>Abundant Dental Care Blog</h1>
            </div>
            <img class="hero-image overlay" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']) ?? 'hero image'; ?>" />
            <div class="image-overlay" style="background: #94167CD9;"></div>
        </div>
        <?php if ($featured) : ?>
        <div class="container featured-blogs">
            <div class="featured owl-carousel">
                <?php foreach ($featured as $post) : ?>
                <div class="blog-slide">
                    <?php echo get_the_post_thumbnail(); ?>
                    <div class="block-overlay"></div>
                    <a href="<?php the_permalink($post); ?>">
                    <h3><?php the_title(); ?></h3></a>
                    <p class='read-more'><a href="<?php the_permalink(); ?>">Read More<span class="arrow"></span></a></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
		<?php if ( have_posts() ) : ?>
        <div class="container blog-container"> 
            <?php if($categories) : ?>
                <nav class="blog-categories">
                    <select onchange="location = this.value;">
                        <option selected="selected" value="<?php echo site_url(); ?>/blog">All Categories</option>
                    <?php foreach($categories as $category) : ?>
                        <?php if ($category->name !== 'Featured') : ?>
                            <?php if ($current && $current->slug === $category->slug) : ?>
                            <option selected="selected" value="<?php echo site_url(); ?>/category/<?php echo $category->slug; ?>" class="active">
                            <?php else : ?>
                            <option value="<?php echo site_url(); ?>/category/<?php echo $category->slug; ?>">
                            <?php endif; ?>
                                <?php echo $category->name; ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </select>
                </nav>
            <?php endif; ?>
            <div class="blog-posts row">
			<?php
			/* Start the Loop */
            $i = 0;
			while ( have_posts() ) :
				the_post();
                $blog_cat = get_the_category()[0]->slug;
                if ($i < 4): ?>
                
				<div class="entry-content col-sm-12 col-md-12 col-lg-6">
                    <?php echo get_the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    <p class="fine">Posted on <?php the_time('F j, Y'); ?></p>
					<?php the_excerpt(); ?>
                    <p class='read-more'><a href="<?php the_permalink(); ?>">Read More<span class="arrow"></span></a></p>
				</div><!-- .entry-content -->
                <?php else: ?>
                    <?php if ($i == 4) { echo '<div class="hide-posts col-sm-12 col-md-12 col-lg-12 row justify-content-beween">'; } ?>
                    <div class="entry-content col-sm-12 col-md-12 col-lg-6">
                    <?php echo get_the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    <p class="fine">Posted on <?php the_time('F j, Y'); ?></p>
					<?php the_excerpt(); ?>
                    <p class='read-more'><a href="<?php the_permalink(); ?>">Read More<span class="arrow"></span></a></p>
                    </div>
                    <?php if (($wp_query->current_post + 1) == $wp_query->post_count) { echo '</div>';
                        echo '<div class="show-button col-sm-12 col-md-12 col-lg-12">Load More<span class="arrow"></span></div>'; } ?>
                    <?php endif; ?>
                <?php $i++ ?>
            <?php endwhile; ?>
            </div><!-- .blog-posts -->
			<?php the_posts_navigation(); ?>
        </div><!-- .container -->
		<?php endif; ?>

	</main><!-- #main -->

<?php