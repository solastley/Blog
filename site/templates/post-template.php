<?php snippet('header'); ?>

<!-- Post Content -->
  <article>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 blog-post">
                  <h1 class="blog-post-title"><?= $page->title()->html() ?></h1>
                  <?php echo $page->text()->kirbytext() ?>
              </div>
          </div>
      </div>
  </article>

  <hr>

<?php snippet('disqus', array('disqus_shortname' => 'solomonastley')); ?>

<?php snippet('footer'); ?>
