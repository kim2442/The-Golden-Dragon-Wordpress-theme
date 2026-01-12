<?php 
/* 
Template Name: Article Page 
*/ 
get_header(); 
?> 

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main class="articles"> 
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
	<p>Note: Comments may take a while to be displayed. </p>	

</main>
<?php endwhile; endif; ?>


<aside class="sidebar articlesuggestions"> <!--assigns two classes to one element--> <!--hidden if smol scrren-->
    <h3>More from <i>The Golden Dragon</i>:</h3>
    <ul>
      <?php
      $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 7,
        'post_status' => 'publish',
        'orderby' => 'rand'
      ));
      foreach($recent_posts as $post) {
        echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
      }
      ?>
    </ul>
  </aside>

<?php get_footer(); ?>