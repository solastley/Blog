<?php snippet('header'); ?>

<!-- Snippet for hero banner -->
<?php snippet('banner',
    array('title' => $page->title()->html())); ?>

<!-- Post Content -->
  <article>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 blog-post">
                  <?php echo $page->text()->kirbytext() ?>
              </div>
          </div>
      </div>
  </article>

  <hr>

<?php snippet('disqus', array('disqus_shortname' => 'solomonastley')); ?>

<?php snippet('footer'); ?>
