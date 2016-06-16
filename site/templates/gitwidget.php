<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['conflicts'])) { $messages = unserialize(base64_decode($_POST['conflicts'])); };
        if (isset($_POST['filenames'])) { $filenames = unserialize(base64_decode($_POST['filenames'])); };

        if (isset($_POST['fixed-conflicts'])) {
            $fixed_conflicts = $_POST['fixed-conflicts'];
            $filenames = $_POST['fixed-filenames'];

            $first_line;
            $last_line;
            $j = 0;
            foreach ($filenames as $filename) {
                $first_line = array();
                $last_line = array();
                $lines = file($filename);
                $i = 0;
                $temp_index;
                foreach($lines as $line) {
                    $pos = strpos($line, '<<<<<<< HEAD');
                    $pos2 = strpos($line, '>>>>>>>');
                    if ($pos === false) {
                        $i = $i + 1;
                        continue;
                    }
                    else {
                        $temp_index = $i + 1;
                        array_push($first_line, $i);
                        while ($pos2 === false) {
                            $i = $i + 1;
                            $pos2 = strpos($lines[$i], '>>>>>>>');
                        }
                        array_push($last_line, $i);
                        $i = $temp_index;
                        continue;
                    }
                }

                $file = fopen($filename, 'w');
                $i = 0;
                $k = 0;
                $written = array();
                array_push($written, false);
                foreach($lines as $line) {
                    if ($i < $first_line[$k] || $i > $last_line[$k]) {
                        fwrite($file, $line);
                        $i = $i + 1;
                    }
                    else if (!$written[$k]) {
                        fwrite($file, $fixed_conflicts[$j][$k]);
                        $written[$k] = true;
                        $i = $i + 1;
                    }
                    else {
                        if ($i == $last_line[$k]) {
                            $k = $k + 1;
                        }
                        $i = $i + 1;
                    }
                }
                $j = $j + 1;
            }

            chdir("/home/astley/GitProjects/Blog");
            shell_exec("git config user.email 'solastley@gmail.com'");
            shell_exec("git config user.name 'Solomon Astley'");
            shell_exec("git config push.default simple");
            error_log("Doing a git add -A --- " . shell_exec("git add -A") . ' --- ');
            error_log("Doing a git commit: --- " . shell_exec("git commit -m 'automatic commit from updated panel'") . ' --- ');
            $pull_message = shell_exec("git pull");
            error_log("Doing a git pull: --- " . $pull_message . ' --- ');
            $push_message = shell_exec("git push");
            error_log("Doing a git push: --- " . $push_message . ' --- ');

            site()->update(array(
                'pull_message' => $pull_message,
                'push_message' => $push_message
            ));
        }
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

     <!-- favicon link -->
     <link rel='shortcut icon' type='image/x-icon' href='/assets/images/favicon.ico' />

     <!-- Custom Fonts -->
     <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <?php if (!isset($_POST['fixed-conflicts'])): ?>
        <h3>Please edit and submit the changes to your merge conflict(s):</h3>
        <form name="conflict-edit-form" id="conflict-edit-form" method="post">
        <?php $i = 0; ?>
        <?php foreach($filenames as $filename): ?>
            <?= $filename ?>
            <br />
            <?php $j = 0; ?>
            <?php foreach($messages[$i] as $message): ?>
                <textarea name="fixed-conflicts[<?=$i?>][<?=$j?>]" rows="20" style="width: 50%;" class="new-message"><?= $message ?></textarea>
                <input name="fixed-filenames[<?=$i?>]" class="hidden-filename" style="display: none;" value="<?= $filename ?>"/>
                <br />
            <?php $j = $j + 1; ?>
            <?php endforeach; ?>
        <?php $i = $i + 1; ?>
        <?php endforeach; ?>
            <input type="submit" id="fix-form-submit-btn" />
        </form>
    <?php else: ?>
        <h3>Merge conflicts resolved.</h3>
    <?php endif; ?>
</body>
