<?php
return array(
  'title' => 'Git Widget',
  'html'  => function() {
    // any data for the template
    $pull_message = panel()->site()->pull_message();
    $pos = strpos($pull_message, 'Merge conflict in ');

    $conflict = false;

    if ($pos === false) {
        $pull_message = "No conflict";
        site()->update(array(
            'pull_message' => '',
            'push_message' => ''
        ));
    }
    else {
        $conflict = true;

        $pos2 = strpos($pull_message, 'Automatic merge failed');
        $file_extension = substr($pull_message, $pos + 18, $pos2 - $pos - 19);
        $filename = panel()->kirby()->roots()->index() . '/' . $file_extension;

        $pull_message = '';
        $i = 0;
        $lines = file($filename);
        foreach ($lines as $line) {
            $pos = strpos($line, '<<<<<<< HEAD');
            $pos2 = strpos($line, '>>>>>>>');
            if ($pos === false) {
                $i = $i + 1;
                continue;
            }
            else {
                while ($pos2 === false) {
                    $pull_message .= $lines[$i];
                    $i = $i + 1;
                    $pos2 = strpos($lines[$i], '>>>>>>>');
                }
                $pull_message .= $lines[$i];
                break;
            }
        }
    }
    $data = array(
        'conflict' => $conflict,
        'pull_message' => $pull_message,
        'push_message' => panel()->site()->message3(),
    );
    return tpl::load(__DIR__ . DS . 'gittemplate.php', $data);
  }
);
?>
