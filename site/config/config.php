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
