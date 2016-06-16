<?php
return array(
  'title' => 'Git Widget',
  'html'  => function() {
    // any data for the template
    $pull_message = panel()->site()->pull_message();

    $target1 = 'Auto-merging ';
    $lastPos = 0;
    $start_positions = array();
    while (($lastPos = strpos($pull_message, $target1, $lastPos)) !== false) {
        $start_positions[] = $lastPos;
        $lastPos = $lastPos + strlen($target1);
    }

    $target2 = 'CONFLICT (';
    $lastPos = 0;
    $end_positions = array();
    while (($lastPos = strpos($pull_message, $target2, $lastPos)) !== false) {
        $end_positions[] = $lastPos;
        $lastPos = $lastPos + strlen($target2);
    }

    $conflict_status = false;
    $filenames = array();
    $conflicts = array();

    if (count($start_positions) == 0 || count($end_positions) == 0) {
        site()->update(array(
            'pull_message' => '',
            'push_message' => ''
        ));
    }
    else {
        $conflict_status = true;

        $i = 0;
        foreach($start_positions as $start) {
            $file_extension = substr($pull_message, $start_positions[$i] + 13, $end_positions[$i] - $start_positions[$i] - 14);
            $filenames[] = panel()->kirby()->roots()->index() . '/' . $file_extension;
            $i = $i + 1;
        }

        foreach($filenames as $filename) {
            $i = 0;
            $conflict_message = '';
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
                        $conflict_message .= $lines[$i];
                        $i = $i + 1;
                        $pos2 = strpos($lines[$i], '>>>>>>>');
                    }
                    $conflict_message .= $lines[$i];
                    continue;
                }
            }
            array_push($conflicts, $conflict_message);
        }
    }
    $data = array(
        'conflict_status' => $conflict_status,
        'filenames' => $filenames,
        'conflicts' => $conflicts,
        'push_message' => panel()->site()->push_message()
    );
    return tpl::load(__DIR__ . DS . 'gittemplate.php', $data);
  }
);
?>
