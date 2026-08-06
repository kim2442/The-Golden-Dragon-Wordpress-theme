<?php 
/* 
Template Name: Article Page 
*/ 
get_header(); 
?>

<div class="article-layout">
  <main class="articles">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article> 
        <h1 class="headline">
          <?php the_title(); ?>
        </h1> 
        
        <p class="post-meta">
          <?php $author_link = get_author_posts_url( get_the_author_meta('ID') ); ?>
          Published on <?php echo get_the_date('F j, Y'); ?> by 
          <a href="<?php echo esc_url( $author_link ); ?>">
            <?php echo get_the_author(); ?>
          </a>
        </p>

        <div class="post-body">
          <?php the_content(); ?>
        </div>
      </article>

      <p id="category"><i>Category: <?php the_category(', '); ?></i></p>
      
      <?php comments_template(); ?>
      <p><small>Note: Comments may take a while to be displayed.</small></p>    
    <?php endwhile; endif; ?>
  </main>

  <aside class="sidebar articlesuggestions">
    <h3>More from <i>KISPA</i>:</h3>
    <ul>
      <?php
      $recent_posts = wp_get_recent_posts( array(
        'numberposts' => 3,
        'post_status' => 'publish',
        'orderby'     => 'rand'
      ) );
      
      foreach ( $recent_posts as $post ) {
        echo '<li><a href="' . get_permalink( $post['ID'] ) . '">' . esc_html( $post['post_title'] ) . '</a></li>';
      }
      wp_reset_query();
      ?>
    </ul>
  </aside>
</div>

<?php get_footer(); ?>