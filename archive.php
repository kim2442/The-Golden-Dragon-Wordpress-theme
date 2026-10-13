<?php
/**
 * The template for displaying archives
 *
 * @package The_Golden_Dragon
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header><section class="articles">
            <?php
            while ( have_posts() ) :
                the_post();

                $title     = get_the_title();
                $excerpt   = get_the_excerpt();
                $permalink = get_permalink();
                $thumbnail = get_the_post_thumbnail( get_the_ID(), 'medium', ['class' => 'article-thumb'] );
            ?>
                
                <article class="article-card">
                    <div class="article-content">
                        <h2><a href="<?php echo esc_url($permalink); ?>"><?php echo $title; ?></a></h2>
                        <p>
                            <?php echo esc_html($excerpt); ?>
                            <a href="<?php echo esc_url($permalink); ?>" class="read-more">Read&nbsp;More&nbsp;→</a>
                        </p>
                    </div>
                    
                    <?php if ($thumbnail) : ?>
                        <div class="article-image">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <?php echo $thumbnail; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </article>

            <?php endwhile; ?>

            <div class="pagination">
                <?php the_posts_navigation(); ?>
            </div>

        </section>

    <?php else : ?>
        <article>
            <h2>No articles found</h2>
            <p>It looks like nothing was found at this location.</p>
        </article>
    <?php endif; ?>

</main><?php
get_footer();