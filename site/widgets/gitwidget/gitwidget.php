<?php
return array(
  'title' => 'Git Widget',
  'html'  => function() {
    // any data for the template
    $var = panel()->site()->message();
    $data = array(
        'message1' => panel()->site()->message1(),
        'message2' => panel()->site()->message2(),
        'message3' => panel()->site()->message3(),
        'message4' => panel()->site()->message4()
    );
    return tpl::load(__DIR__ . DS . 'gittemplate.php', $data);
  }
);
?>
