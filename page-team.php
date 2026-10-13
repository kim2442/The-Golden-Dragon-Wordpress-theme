<?php
/**
 * Template Name: Team / Author List
 *
 * Renders a static list of users (name, profile picture, bio) populated
 */

get_header();

/**
 * Automatically fetch all WordPress users, excluding user ID 8 (ID 8 is an advertisement account).
 * To exclude additional users, add their IDs to the $excluded_user_ids array.
 */
$excluded_user_ids = array( 8 );
$team_users        = get_users( array( 'exclude' => $excluded_user_ids ) );
?>

<main class="content">
  <section class="articles team-page">
    <h1><?php the_title(); ?></h1>
    <header class="team-page-header">
      <!--Fix later, no need for content-->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_content() ) : ?>
          <div class="team-page-intro"><?php the_content(); ?></div>
        <?php endif; ?>
      <?php endwhile; endif; ?>
    </header>

    <div class="team-list">
      <?php foreach ( $team_users as $user ) : ?>
        <?php if ( ! $user ) : continue; endif; ?>

          <article class="team-member">
            <div class="team-member-avatar">
              <?php echo get_avatar( $user->ID, 160 ); ?>
            </div>
            <div class="team-member-info">
              <h2 class="team-member-name">
                <a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>">
                  <?php echo esc_html( $user->display_name ); ?>
                </a>
              </h2>
              <?php if ( ! empty( $user->description ) ) : ?>
                <div class="team-member-bio">
                  <?php echo wp_kses_post( $user->description ); ?>
                </div>
              <?php endif; ?>
            </div>
          </article>

      <?php endforeach; ?>
    </div>

  </section>
</main>

<?php get_footer(); ?>