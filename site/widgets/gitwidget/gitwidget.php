<?php
return array(
  'title' => 'Git Widget',
  'html'  => function() {
    // any data for the template
    $var = panel()->site()->message();
    $data = array('site' => $var);
    return tpl::load(__DIR__ . DS . 'gittemplate.php', $data);
  }
);
?>
