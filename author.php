<?php get_header(); ?>

<main class="site-main author-page-container">

    <?php $author = get_queried_object(); ?>

    <header class="author-profile">
        <?php echo get_avatar( $author->ID, 120 ); ?>

        <div>
            <h1 class="author-title"><?php echo esc_html( $author->display_name ); ?></h1>

            <?php if ( ! empty( $author->description ) ) : ?>
                <div class="author-bio">
                    <?php echo wp_kses_post( $author->description ); ?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <section class="author-articles">
        <h2>Articles by <?php echo esc_html( $author->display_name ); ?></h2>

        <?php if ( have_posts() ) : ?>

            <div class="author-posts-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'author-post-card' ); ?>>
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'textdomain' ),
                    'next_text' => __( 'Next &raquo;', 'textdomain' ),
                ) ); ?>
            </div>

        <?php else : ?>
            <p>No articles published yet by this author.</p>
        <?php endif; ?>
    </section>

</main>

<?php get_footer(); ?>