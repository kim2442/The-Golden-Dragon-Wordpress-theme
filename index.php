<?php get_header(); ?>
<section class="articles">
  <?php
	//TODO: replace with frontpage.php and not index.php
  // !!!!! Add or remove post IDs (available in admin panel) from the below list to add or remove posts from homepage.
  // the thumbnails, blurbs, and title will automatically be populated.
  // VVVVVVVVVVVVVVVVVVVVVVV
  $post_ids = [432, 451, 437, 440, 482];
  // ^^^^^^^^^^^^^^^^^^^^
  // !!!!!
  foreach ($post_ids as $index => $post_id) :
    $post = get_post($post_id);
    if ($post) :
      $title = get_the_title($post);
      $excerpt = get_the_excerpt($post);
      $permalink = get_permalink($post);
      $thumbnail = get_the_post_thumbnail($post, 'medium', ['class' => 'article-thumb']);

      if ($index === 0) :
        // — Hero card —
  ?>
      <article class="article-card featured">
        <?php if ($thumbnail) : ?>
        <div class="article-image">
          <a href="<?php echo esc_url($permalink); ?>">
            <?php echo $thumbnail; ?>
          </a>
        </div>
        <?php endif; ?>
        <div class="article-content">
          <h2><a href="<?php echo esc_url($permalink); ?>"><?php echo $title; ?></a></h2>
          <p><?php echo esc_html($excerpt); ?><a href="<?php echo esc_url($permalink); ?>" class="read-more">Read&nbsp;More&nbsp;→</a></p>
        </div>
      </article>

  <?php
      elseif ($index === 1) :
        // - 2-up grid  —
        $post3     = get_post($post_ids[2]);
        $title3    = $post3 ? get_the_title($post3)    : '';
        $excerpt3  = $post3 ? get_the_excerpt($post3)  : '';
        $link3     = $post3 ? get_permalink($post3)    : '';
        $thumb3    = $post3 ? get_the_post_thumbnail($post3, 'medium', ['class' => 'article-thumb']) : '';
  ?>
      <div class="article-grid-row">
        <article class="article-card compact">
          <?php if ($thumbnail) : ?>
          <div class="article-image">
            <a href="<?php echo esc_url($permalink); ?>">
              <?php echo $thumbnail; ?>
            </a>
          </div>
          <?php endif; ?>
          <div class="article-content">
            <h2><a href="<?php echo esc_url($permalink); ?>"><?php echo $title; ?></a></h2>
            <p><?php echo esc_html($excerpt); ?><a href="<?php echo esc_url($permalink); ?>" class="read-more">Read&nbsp;More&nbsp;→</a></p>
          </div>
        </article>

        <?php if ($post3) : ?>
        <article class="article-card compact">
          <?php if ($thumb3) : ?>
          <div class="article-image">
            <a href="<?php echo esc_url($link3); ?>">
              <?php echo $thumb3; ?>
            </a>
          </div>
          <?php endif; ?>
          <div class="article-content">
            <h2><a href="<?php echo esc_url($link3); ?>"><?php echo $title3; ?></a></h2>
            <p><?php echo esc_html($excerpt3); ?><a href="<?php echo esc_url($link3); ?>" class="read-more">Read&nbsp;More&nbsp;→</a></p>
          </div>
        </article>
        <?php endif; ?>
      </div><!-- .article-grid-row -->

  <?php
      elseif ($index === 2) :
        continue;

      else :
        // — Standard horizontal card for remaining articles —
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
      endif;
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
	
<div class="archive-section">
	<?php
	$the_golden_dragon_archive_content = '<h1>' . sprintf( esc_html__( 'Previous issues%1$s', 'the-golden-dragon' ), ':') . '</h1>';
	the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$the_golden_dragon_archive_content" );
	?>
</div>
	
</section>
<aside class="sidebar">
 <!-- <div class="updates">
    <h3>Upcoming</h3>
<ul>
  <li><strong>February 28:</strong> MS KAIAC Boys Basketball Jamboree; MS KAIAC Girls Basketball Jamboree; Varsity Badminton Match – GSIS; Varsity Soccer vs OMHS</li>
    <li><strong>March 1:</strong> Samil Day</li>
    <li><strong>March 2:</strong> Substitute Holiday - No School; Residence Opens (6:30 PM)</li>
    <li><strong>March 3:</strong> Gold Week; Mock Exams Math; Activity Committee Meeting (4:15 PM)</li>
    <li><strong>March 4:</strong> APAC Band - AISG; APAC Theatre - TCIS; Varsity Soccer Game - CDS</li>
    <li><strong>March 5:</strong> APAC Band - AISG; APAC Theatre - TCIS</li>
</ul>
  </div> -->
  <div class="poll">
    <h3>Poll</h3>
	  
	  	  <!--To replace with new poll, replace the below Strawpoll embed code -->
	  
<div class="strawpoll-embed" id="strawpoll_QrgewzqDryp" style="height: 480px; max-width: 640px; width: 100%; margin: 0 auto; display: flex; flex-direction: column;"><iframe title="StrawPoll Embed" id="strawpoll_iframe_QrgewzqDryp" src="https://strawpoll.com/embed/QrgewzqDryp" style="position: static; visibility: visible; display: block; width: 100%; flex-grow: 1;" frameborder="0" allowfullscreen allowtransparency>Loading...</iframe><script nonce="MThlNjdjNTQxMzkzMGY3ODE5YjlkMTlkMDIwNWM1MzJhOTMyNGYzYg==" async src="https://cdn.strawpoll.com/dist/widgets.js" charset="utf-8"></script></div>	 
	  
	  <!--To replace with new poll, replace the above Strawpoll embed code -->
  </div>
</aside>
<?php get_footer(); ?>