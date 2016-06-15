<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['conflict'];
        $filename = $_POST['filename'];
    }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="<?= $site->description() ?>">
     <meta name="author" content="<?= $site->author() ?>">

     <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

     <?php echo css('/assets/css/bootstrap.min.css') ?>
     <?php echo css('/assets/css/c3.min.css') ?>
     <?php echo css('/assets/css/clean-blog.css') ?>

     <?php echo js('/assets/js/jquery.min.js') ?>
     <?php echo js('/assets/js/merge-editor.js') ?>

     <!-- favicon link -->
     <link rel='shortcut icon' type='image/x-icon' href='/assets/images/favicon.ico' />

     <!-- Custom Fonts -->
     <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

 </head>

<body>
    <h3>Please edit and submit the changes to your merge conflict:</h3>
    <?= $filename ?>
    <form name="conflict-edit-form" id="conflict-edit-form">
        <textarea name="fixed-conflict" rows="20" style="width: 50%;" id="new-message"><?= $message ?></textarea>
        <input name="filename" id="hidden-filename" style="display: none;" value="<?=$filename?>"/>
        <br />
        <input type="submit" id="fix-form-submit-btn" />
    </form>
</body>
