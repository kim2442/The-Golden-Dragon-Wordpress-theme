<?php get_header(); ?>

<main id="primary" class="site-main author-page-container">

    <?php
    // Get the current author object
    $author = get_queried_object();
    ?>

    <!-- Author Profile Header -->
    <header class="author-profile">
        <div class="author-avatar">
            <?php echo get_avatar( $author->ID, 120 ); ?>
        </div>

        <div class="author-info">
            <h1 class="author-title"><?php echo esc_html( $author->display_name ); ?></h1>
            
            <?php if ( ! empty( $author->description ) ) : ?>
                <div class="author-bio">
                    <p><?php echo wp_kses_post( $author->description ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <!-- Author Articles Section -->
    <section class="author-articles">
        <h2>Articles by <?php echo esc_html( $author->display_name ); ?></h2>

        <?php if ( have_posts() ) : ?>

            <div class="author-posts-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'author-post-card' ); ?>>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="post-meta">
                                <time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
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