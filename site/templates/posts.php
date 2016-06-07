<?php $articles = page('posts')->children()->visible(); ?>

<?php snippet('header'); ?>

<!-- Snippet for hero banner -->
<?php snippet('banner',
    array('title' => 'Blog Posts')); ?>

<!-- Main Content -->
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <?php foreach($articles as $article): ?>
              <div class="post-preview">
                  <a href="<?= $article ?>">
                      <h2 class="post-title">
                          <?= $article->title() ?>
                      </h2>
                      <h3 class="post-subtitle">
                          <?= $article->summary() ?>
                      </h3>
                  </a>
                  <p class="post-meta">Posted by <?= $article->author() ?> on
                      <?= $article->date('m/d/Y, h:i a') ?></p>
              </div>
              <hr>
          <?php endforeach; ?>
          </div>
      </div>
  </div>

  <hr>



<?php snippet('footer'); ?>
