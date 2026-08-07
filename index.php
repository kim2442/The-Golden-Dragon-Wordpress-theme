\<?php get_header(); ?>

<section class="articles">
  <?php
	
  // !!!!! Add or remove post IDs (available in admin panel) from the below list to add or remove posts from homepage.
  // the thumbnails, blurbs, and title will automatically be populated.
  // VVVVVVVVVVVVVVVVVVVVVVV
  $post_ids = [171, 138, 153, 147, 167, 185, 135, 182, 144, 156, 209, 180];
  // ^^^^^^^^^^^^^^^^^^^^
  // !!!!!

  foreach ($post_ids as $post_id) :
    $post = get_post($post_id);

    if ($post) :
      $title = get_the_title($post);
      $excerpt = get_the_excerpt($post);
      $permalink = get_permalink($post);
      $thumbnail = get_the_post_thumbnail($post, 'medium', ['class' => 'article-thumb']);
  ?>
      <article class="article-card">
        <div class="article-content">
          <h2><a href="<?php echo esc_url($permalink); ?>"><?php echo $title; ?></a></h2>
          <p><?php echo esc_html($excerpt); ?><a href="<?php echo esc_url($permalink); ?>" class="read-more">Read&nbsp;More&nbsp;→</a></p>
        </div>
        <?php if ($thumbnail) : ?>
        <div class="article-image">
          <a href="<?php echo esc_url($permalink); ?>">
            <?php echo $thumbnail; ?>
          </a>
        </div>
        <?php endif; ?>
      </article>
  <?php
    else :
      // fallback if post not found
  ?>
      <article>
        <h2>No article found with the provided post ID (very sad)</h2>
        <p>Something has gone wrong. Perhaps u typed the post ID wrong?</p>
      </article>
  <?php
    endif;
  endforeach;
  ?>
	
<div style="background-color: DeepSkyBlue; padding: 10px;">
	<?php
	$the_golden_dragon_archive_content = '<h1>' . sprintf( esc_html__( 'Previous issues%1$s', 'the-golden-dragon' ), ':') . '</h1>';
	the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$the_golden_dragon_archive_content" );
	the_widget( 'WP_Widget_Tag_Cloud' );
	?>
</div>
	
</section>

<aside class="sidebar">
  <div class="updates">
    <h3>Upcoming</h3>
    <ul>
		<li>HEAL Club Blood Drive: December 5th @ TCIS (9:30 AM–3:00 PM)</li>
		<li>Christmas Bazaar: December 6</li>
		<li>SAT: December 6</li>
		<li>Robotics team competition: December 12</li>
		<li>Winter Break: December 20</li>
    </ul>
  </div>

  <div class="poll">
    <h3>Poll</h3>
	  
	  	  <!--To replace with new poll, replace the below Strawpoll embed code -->

	  
<div class="strawpoll-embed" id="strawpoll_poy9kDwNDgJ" style="height: 644px; max-width: 640px; width: 100%; margin: 0 auto; display: flex; flex-direction: column;"><iframe title="StrawPoll Embed" id="strawpoll_iframe_poy9kDwNDgJ" src="https://strawpoll.com/embed/poy9kDwNDgJ" style="position: static; visibility: visible; display: block; width: 100%; flex-grow: 1;" frameborder="0" allowfullscreen allowtransparency>Loading...</iframe><script async src="https://cdn.strawpoll.com/dist/widgets.js" charset="utf-8"></script></div>
	  
	  	 <!--To replace with new poll, replace the above Strawpoll embed code -->

  </div>
</aside>

<?php get_footer(); ?>
