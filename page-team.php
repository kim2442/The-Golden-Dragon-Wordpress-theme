<?php
/**
 * Template Name: Team / Author List
 *
 * Renders a static list of users (name, profile picture, bio) populated
 * from the $team_user_ids array below. To add or remove a member, edit
 * the array — no other code needs to change.
 */

get_header();

/**
 * !!!!! Add or remove WordPress user IDs (visible in wp-admin -> Users)
 * VVVVVVVVVVVVVVVVVVVVVVV
 */
$team_user_ids = array( 1, 2, 3 );
?>

<main class="site-main team-page-container">

  <header class="team-page-header">
    <h1 class="team-page-title"><?php the_title(); ?></h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if ( get_the_content() ) : ?>
        <div class="team-page-intro"><?php the_content(); ?></div>
      <?php endif; ?>
    <?php endwhile; endif; ?>
  </header>

  <section class="team-list">
    <?php foreach ( $team_user_ids as $uid ) : ?>
      <?php $user = get_userdata( $uid ); ?>
      <?php if ( ! $user ) : continue; endif; ?>

      <article class="team-member">
        <div class="team-member-avatar">
          <?php echo get_avatar( $user->ID, 160 ); ?>
        </div>
        <div class="team-member-info">
          <h2 class="team-member-name"><?php echo esc_html( $user->display_name ); ?></h2>
          <?php if ( ! empty( $user->description ) ) : ?>
            <div class="team-member-bio">
              <?php echo wp_kses_post( $user->description ); ?>
            </div>
          <?php endif; ?>
        </div>
      </article>

    <?php endforeach; ?>
  </section>

</main>

<?php get_footer(); ?>
