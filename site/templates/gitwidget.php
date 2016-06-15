<?php snippet('header'); ?>
<?php snippet('banner'); ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['conflict'];
        echo $message;
    }
 ?>
<h3>Let's see what the hell this does</h3>
<?php snippet('footer'); ?>
