<?php

    /* An array that contains the name of each featured article, as defined in
    the markdown for the home page */
    $articles = [];
    array_push($articles, $page->featured_article_1_url());
    array_push($articles, $page->featured_article_2_url());

?>

<!-- Snippet for HTML head and navbar -->
<?php snippet('header') ?>

<!-- Snippet for hero banner -->
<?php snippet('banner',
    array('title' => 'SOBLOGMON', 'subtitle' => 'Apples, Tutorials, Thoughts')); ?>

<!-- Main Content -->
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <?php foreach($articles as $article): ?>
              <div class="post-preview">
                  <a href="posts/<?php echo $article ?>">
                      <h2 class="post-title">
                          <?php echo page('posts/' . $article)->title() ?>
                      </h2>
                      <h3 class="post-subtitle">
                          <?php echo page('posts/' . $article)->summary() ?>
                      </h3>
                  </a>
                  <p class="post-meta">Posted by <?= page('posts/' . $article)->author() ?> on
                      <?php echo page('posts/' . $article)->date('m/d/Y') ?></p>
              </div>
              <hr>
          <?php endforeach; ?>
              <!-- Pager -->
              <ul class="pager">
                  <li class="next">
                      <a href="<?= page('posts')->url() ?>">Blog Posts</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>

  <hr>

<!-- Snippet for footer -->
<?php snippet('footer') ?>
