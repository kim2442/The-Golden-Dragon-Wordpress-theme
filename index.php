<?php
get_header();

/**
 * ============================================================================
 * HOW TO LIST NEW ARTICLES ON HOMEPAGE
 * Provide Post IDs in order:
 *  - [0]      => Hero Feature
 *  - [1, 2]   => Side List Stories (2 posts)
 *  - [3, 4, 5, etc]=> Featured Grid Cards (rest of the posts)
 * ============================================================================
 */
$homepage_post_ids = array(52, 60);

$hero_id      = isset($homepage_post_ids[0]) ? $homepage_post_ids[0] : null;
$side_ids      = array_slice($homepage_post_ids, 1, 2);
$grid_card_ids = array_slice($homepage_post_ids, 3, 3);
?>

<div class="date-ribbon">August 2026</div>

<main class="page">

  <!-- ============ HERO + SIDE STORIES ============ -->
  <section class="hero-row">
    <?php
    if ($hero_id) :
      $feature = get_post($hero_id);
      if ($feature) :
        $f_title     = get_the_title($feature);
        $f_permalink = get_permalink($feature);
        $f_thumb     = get_the_post_thumbnail_url($feature, 'large');
        $f_author    = get_the_author_meta('display_name', $feature->post_author);
        $f_date      = get_the_date('F j, Y', $feature);
        $f_pub       = get_post_meta($feature->ID, 'publication_name', true);
    ?>
      <a href="<?php echo esc_url($f_permalink); ?>">  
	  	<article class="feature" <?php echo $f_thumb ? 'style="background-image:url(\'' . esc_url($f_thumb) . '\');"' : ''; ?>>
          <div class="feature-content">
            <?php if (!empty($f_pub)) : ?>
              <span class="kicker"><?php echo esc_html($f_pub); ?></span>
            <?php endif; ?>
            <h2><?php echo esc_html($f_title); ?></h2>
            <p class="byline"><?php echo esc_html($f_author); ?> · <?php echo esc_html($f_date); ?></p>
          </div>
        </article>
	  </a>
    <?php 
      endif;
    endif; 
    ?>

    <aside class="side-list">
      <?php
      foreach ($side_ids as $s_id) :
        $p = get_post($s_id);
        if (!$p) continue;

        $permalink = get_permalink($p);
        $title     = get_the_title($p);
        $blurb     = wp_trim_words(get_the_excerpt($p), 38, '…');
        $author    = get_the_author_meta('display_name', $p->post_author);
        $date      = get_the_date('F j, Y', $p);
        $pub       = get_post_meta($p->ID, 'publication_name', true);
      ?>
        <div class="side-item">
          <?php if (!empty($pub)) : ?>
            <div class="meta"><?php echo esc_html($pub); ?></div>
          <?php endif; ?>
          <h3><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></h3>
          <p><?php echo esc_html($blurb); ?></p>
          <span class="byline"><?php echo esc_html($author); ?> · <?php echo esc_html($date); ?></span>
        </div>
      <?php endforeach; ?>

      <a href="<?php echo esc_url(home_url('/articles')); ?>" class="view-all">View All Articles →</a>
    </aside>
  </section>

  <!-- ============ 3-UP FEATURED CARDS ============ -->
  <section class="featured-grid">
    <?php
    foreach ($grid_card_ids as $c_id) :
      $p = get_post($c_id);
      if (!$p) continue;

      $permalink = get_permalink($p);
      $title     = get_the_title($p);
      $blurb     = wp_trim_words(get_the_excerpt($p), 32, '…');
      $thumb     = get_the_post_thumbnail_url($p, 'medium_large');
      $author    = get_the_author_meta('display_name', $p->post_author);
      $date      = get_the_date('F j, Y', $p);
      $pub       = get_post_meta($p->ID, 'publication_name', true);
    ?>
      <article class="card">
        <?php if ($thumb): ?>
          <div class="thumb" style="background-image:url('<?php echo esc_url($thumb); ?>');"></div>
        <?php else: ?>
          <div class="thumb"></div>
        <?php endif; ?>

        <?php if (!empty($pub)) : ?>
          <div class="kicker"><?php echo esc_html($pub); ?></div>
        <?php endif; ?>

        <h3><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></h3>
        <p><?php echo esc_html($blurb); ?></p>
        <span class="byline"><?php echo esc_html($author); ?> · <?php echo esc_html($date); ?></span>
      </article>
    <?php endforeach; ?>
  </section>

  <!-- ============ STATS BAR ============ -->
  <section class="stats" aria-label="KISPA by the numbers">
    <div class="stat">
      <span class="num">3</span>
      <span class="label">Member Publications</span>
    </div>
    <div class="stat">
      <span class="num">10</span>
      <span class="label">Student Journalists, Writers, and Editors</span>
    </div>
 	<div class="stat">
  		<span class="num"><?php echo wp_count_posts()->publish; ?></span>
  		<span class="label">Articles Published</span>
	</div>
  </section>

  <!-- ============ MISSION BAND ============ -->
  <section class="mission">
    <div class="grid">
      <div>
        <h2>Connecting Student Journalists Across Korea</h2>
        <p>KISPA is a student-led organization for student publications at international schools in Korea.</p>
        <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn">Learn More</a>
        <a href="<?php echo esc_url(home_url('/members')); ?>" class="btn btn-outline">Member Directory</a>
      </div>
    </div>
  </section>

  <!-- ============ MEMBER SCHOOLS ============ -->
  <section class="members">
    <div class="head">
      <h2>Member Schools</h2>
      <a href="<?php echo esc_url(home_url('/members')); ?>">Full Directory →</a>
    </div>
    <div class="grid">
      <?php
      $schools = function_exists('kispa_get_member_schools') ? kispa_get_member_schools(10) : array();
      foreach ($schools as $s) :
        $name = get_the_title($s);
        $pub  = get_post_meta($s->ID, 'publication', true);
        $logo = get_the_post_thumbnail_url($s, 'medium');
      ?>
        <div class="school">
          <?php if ($logo): ?>
            <div class="logo"><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($name); ?>"></div>
          <?php else: ?>
            <div class="logo"></div>
          <?php endif; ?>
          <div class="name"><?php echo esc_html($name); ?></div>
          <?php if ($pub): ?>
            <div class="pub"><?php echo esc_html($pub); ?></div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</main>

<?php 
get_footer();