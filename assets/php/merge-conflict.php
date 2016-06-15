<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text = $_POST['text'];
        $filename = $_POST['filename'];

        echo $text;
        $lines = file($filename);
        $i = 0;
        $first_line;
        $last_line;
        foreach($lines as $line) {
            $pos = strpos($line, '<<<<<<< HEAD');
            $pos2 = strpos($line, '>>>>>>>');
            if ($pos === false) {
                $i = $i + 1;
                continue;
            }
            else {
                $first_line = $i;
                while ($pos2 === false) {
                    $i = $i + 1;
                    $pos2 = strpos($lines[$i], '>>>>>>>');
                }
                $last_line = $i;
                break;
            }
        }

        $file = fopen($filename, 'w');
        $i = 0;
        $written = false;
        foreach($lines as $line) {
            if ($i < $first_line || $i > $last_line) {
                fwrite($file, $line);
                $i = $i + 1;
            }
            else if (!$written) {
                fwrite($file, $text);
                $written = true;
                $i = $i + 1;
            }
            else {
                $i = $i + 1;
            }
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
 ?>
