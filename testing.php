<?php get_header(); ?>

<section class="articles">
  <?php
	
  // !!!!! Add or remove post IDs (available in admin panel) from the below list to add or remove posts from homepage.
  // the thumbnails, blurbs, and title will automatically be populated.
  // VVVVVVVVVVVVVVVVVVVVVVV
  $post_ids = [72, 75, 99, 61, 64, 90, 116];
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
      <article>
        <a href="<?php echo esc_url($permalink); ?>">
          <?php if ($thumbnail) echo $thumbnail; ?>
          <h2><?php echo $title; ?></h2>
        </a>
        <p><?php echo esc_html($excerpt); ?></p>
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
</section>

<aside class="sidebar">
  <div class="updates">
    <h3>Upcoming</h3>
    <ul>
		<li>Winter Formal: November 11 @ B2 Gym (7–9 PM)</li>
		<li>Starry Starry Campfire Night (Grades 6–8): November 14 (5:30–9PM)</li>
		<li>December SAT registration deadline: November 21</li>
		<li>CLUE theatre performance: November 25–27 @ PAC</li>
		<li>HEAL Club Blood Drive: December 5th @ TCIS (9:30 AM–3:00 PM)</li>
    </ul>
  </div>

  <div class="poll">
    <h3>Poll</h3>
	  
	  	  <!--To replace with new poll, replace the below Strawpoll embed code -->

	  
<div class="strawpoll-embed" id="strawpoll_3RnYXaQ3mye" style="height: 516px; max-width: 640px; width: 100%; margin: 0 auto; display: flex; flex-direction: column;"><iframe title="StrawPoll Embed" id="strawpoll_iframe_3RnYXaQ3mye" src="https://strawpoll.com/embed/3RnYXaQ3mye" style="position: static; visibility: visible; display: block; width: 100%; flex-grow: 1;" frameborder="0" allowfullscreen allowtransparency>Loading...</iframe><script async src="https://cdn.strawpoll.com/dist/widgets.js" charset="utf-8"></script></div>
	  
	  	 <!--To replace with new poll, replace the above Strawpoll embed code -->

  </div>
</aside>

<?php get_footer(); ?>

/*
Theme Name: Golden 4
Theme URI: https://goldendragon.news
Author: Sean Kim
Description: For Golden Dragon Newspaper club
Version: 1.0
License: GNU General Public License v2 or later
Text Domain: golden-dragon
*/

:root {
  --gold: #cfa03b;
  --red: #91302d;
  --dark-red: #7a2016;
  --cream: #f9e7c5;
  --ink: #1b1b1b;
  --border: #d4b67a;
}

body {
  margin: 0;
  font-family: "Georgia", serif;
  background-color: var(--cream);
  color: var(--ink);
}

p {
  font-family: "Verdana", sans-serif;
}

header {
  background-color: #3a1515;
  color: #fff;
  text-align: center;
  padding: 0 0 0.5rem;
  border-bottom: 4px solid var(--gold);
}

.banner img {
  width: 53%;
  height: auto;
  margin: auto;
  min-width: 390px;
}


header .coolwave {
  top: 0px;
  width: 100%;
}

.coolwave img {
  width: 100%;
}

.nav {
  background-color: goldendrod;
  padding: 0.7rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
}

.since {
  color: #fff;
  font-style: italic;
  font-size: 0.9rem;
  text-align: center;
  display: block;
  margin-bottom: 0.3rem;
}

.nav-links {
  display: flex;
  gap: 2rem;
  justify-content: center;
  flex: 1 1 auto;
  flex-wrap: wrap;
}

.nav a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  transition: opacity 0.3s;
}

.nav a:hover {
  opacity: 0.8;
}

/* Search bar */
.nav-search {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.nav-search input {
  padding: 0.4rem 0.6rem;
  border: none;
  border-radius: 4px;
}

.nav-search button {
  background-color: #fff;
  color: var(--gold);
  border: none;
  padding: 0.4rem 0.8rem;
  border-radius: 4px;
  font-weight: bold;
  cursor: pointer;
}

.nav-search button:hover {
  opacity: 0.85;
}



.issue {
  text-align: center;
  margin: 1rem auto;
  font-size: 1.1rem;
  color: var(--dark-red);
}

.content {
  display: flex;
  flex-wrap: wrap;
  width: 90%;
  margin: 0 auto;
  gap: 2rem;
}

.articles {
  flex: 2;
  background-color: #fff;
  border: 2px solid var(--border);
  /* border-radius: 10px; */
  padding: 1rem 1.5rem;
}

.articles article {
  margin-bottom: 1.5rem;
}

h2 {
  border-bottom: 3px solid var(--gold);
  padding-bottom: 0.3rem;
  margin-bottom: 0.5rem;
  color: var(--red);
}

.sidebar {
  flex: 1;
  background-color: #fff;
  border: 2px solid var(--border);
  /* border-radius: 10px; */
  padding: 1rem;
  min-width: 260px;
}

h3 {
  border-bottom: 3px solid var(--gold);
  color: var(--red);
  margin-bottom: 0.5rem;
  padding-bottom: 0.3rem;
}

.sidebar li {
  margin: 1rem 0rem;
	font-family: "Verdana", sans-serif;
}

.morenav {
  background-color: var(--gold);
  text-align: center;
  padding: 0.7rem 0;
  margin-top: 2rem;
}

.morenav a {
  color: #fff;
  text-decoration: none;
  margin: 0 1.5rem;
  font-weight: bold;
}

.morenav a:hover {
  opacity: 0.8;
}

.nav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-right: 16px;
  font-size: 17px;
}

/* Article pages */

.article-layout {
  width: 90%;
  margin: 2rem auto;
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 2rem;
}

.headline {
  border-bottom: 3px solid var(--gold);
  padding-bottom: 0.3rem;
  margin-bottom: 0.5rem;
  color: var(--red);
}

.post-content {
  background: #fff;
  border: 1px solid #ddd;
  padding: 2rem;
}

.post-meta {
  color: #777;
  font-size: 0.9rem;
  margin-bottom: 1rem;
}

.sidebar {
  background: #faf6f4;
  border: 1px solid #e0d8d4;
  padding: 1.5rem;
}

/* end of article pages */

/* comments */

.comment-form-url {
  display: none; /* remove unnnecessary website param */
}

textarea {
	width: 70%; /* stops commentbox overflowing in thin screens */
}

/* footers d */

footer {
  background-color: var(--dark-red);
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 2rem;
  padding: 2rem;
  font-size: 0.95rem;
  margin-bottom: 0px;
}

.footer-left,
.footer-right {
  flex: 1 1 300px;
}

.footer-left h3 {
  margin-bottom: 1rem;
  font-size: 1.2rem;
}

.footer-links {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin-bottom: 1rem;
}

.footer-links a {
  color: #fff;
  font-weight: 600;
  transition: opacity 0.3s;
}

.footer-links a:hover {
  opacity: 0.7;
}

.footer-copyright {
  font-size: 0.85rem;
  opacity: 0.8;
}

.footer-right p {
  line-height: 1.6;
  margin: 0;
	font-family: "Georgia", serif;
}

footer .coolwave {
    bottom: 0px;
}

.login a {
  text-decoration: none;
  color: white;
}

.widgettitle {
	display: none;
}

/* search page */

.searchpage-title {
  background-color: #ddd;
}

.entry-title a {
  text-decoration: none;
  color: white;
}

.entry-header {
  background-color: var(--gold);
}

.primary {
  margin: auto;
}

@media (max-width: 800px) {
  .content {
    flex-direction: column;
  }
	
.nav {
    align-items: stretch;
    text-align: center;
  }

  .since {
    font-size: 0.85rem;
  }

  .nav-links {
    flex-direction: column;
    gap: 1rem;
  }

.nav-search {
    flex: 0 1 160px;
    max-width: 230px;
    white-space: nowrap;
}

	.nav-search input {
    flex: 1 1 auto;
    min-width: 0;
}


  .login {
    display: none;
  }

  .articlesuggestions {
    display: none;
  }
	
  .banner img {
  width: 90%;
  min-width: 100px;
}
}
