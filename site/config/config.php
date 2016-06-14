<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PERSONAL-4727cdfc3c05f98666bc5b34b8a2835c');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

/* Kirby Hooks to update the git repository automatically */
// $panel = panel();
// $kirby = kirby();
// $site  = site();
// $user  = site()->user();

kirby()->hook('panel.page.create', function($page) {UpdateRepo();});
kirby()->hook('panel.page.update', function($page) {UpdateRepo();});
kirby()->hook('panel.page.delete', function($page) {UpdateRepo();});
kirby()->hook('panel.page.sort', function($page) {UpdateRepo();});
kirby()->hook('panel.page.hide', function($page) {UpdateRepo();});
kirby()->hook('panel.page.move', function($page) {UpdateRepo();});

function UpdateRepo(){

    site()->update(array(
        'message' => 'Git Message'
    ));

    chdir("/home/astley/GitProjects/Blog");
    shell_exec("git config user.email 'solastley@gmail.com'");
    shell_exec("git config user.name 'Solomon Astley'");
    shell_exec("git config push.default simple");
    $result1 = shell_exec("git add -A");
    $result2 = shell_exec("git commit -m 'automatic commit from updated panel'");
    $result3 = shell_exec("git push");

    if ($result1 !== null) {
        error_log($result1 + '\n\n', 0);
    }
    if ($result2 !== null) {
        error_log($result2 + '\n\n', 0);
    }
    if ($result3 !== null) {
        error_log($result3 + '\n\n', 0);
    }
}

?>
