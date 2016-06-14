<?php

if (!isset($title)) $title = "BLOG";

if ($title == "SOBLOGMON") {
    $home_page = True;
}
else {
    $home_page = False;
}

 ?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/assets/images/banner.svg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <?php if ($home_page): ?>
                        <h1 class="title-letters">SOLOMON<br />ASTLEY</h1>
                    <?php else: ?>
                        <h1 class="title-letters"><?= $title ?></h1>
                    <?php endif; ?>
                    <?php if (isset($subtitle)): ?>
                        <hr class="small">
                        <span class="subheading"><?= $subtitle ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
