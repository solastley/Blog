<?php

if (!isset($title)) $title = "BLOG";

 ?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/assets/images/home-bg2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?= $title ?></h1>
                    <?php if (isset($subtitle)): ?>
                        <hr class="small">
                        <span class="subheading"><?= $subtitle ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
