<?php
return array(
  'title' => 'Git Widget',
  'html'  => function() {
    // any data for the template
    $result4 = panel()->site()->pull_message();
    $pos = strpos($result4, 'Merge conflict in ');

    $conflict = false;

    if ($pos === false) {
        $result4 = "No conflict";
        site()->update(array(
            'message1' => '',
            'message2' => ''
        ));
    }
    else {
        $conflict = true;

        $pos2 = strpos($result4, 'Automatic merge failed');
        $file_extension = substr($result4, $pos + 18, $pos2 - $pos - 19);
        $filename = panel()->kirby()->roots()->index() . '/' . $file_extension;

        $result4 = '';
        $i = 0;
        $lines = file($filename);
        foreach ($lines as $line) {
            $pos = strpos($line, '<<<<<<< HEAD');
            if ($pos === false) {
                $i = $i + 1;
                continue;
            }
            else {
                $result4 = $result4 . $lines[$i] . $lines[$i + 1] . $lines[$i + 2] . $lines[$i + 3] . $lines[$i + 4];
                break;
            }
        }
    }
    $data = array(
        'conflict' => $conflict,
        'message1' => panel()->site()->message1(),
        'message2' => panel()->site()->message2(),
        'message3' => panel()->site()->message3(),
        'message4' => $result4
    );
    return tpl::load(__DIR__ . DS . 'gittemplate.php', $data);
  }
);
?>
