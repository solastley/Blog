<?php
function git_update() {
    $index_dir = kirby()->roots()->index();
    chdir($index_dir);
    
    shell_exec("git config user.email 'solastley@gmail.com'");
    shell_exec("git config user.name 'Solomon Astley'");
    shell_exec("git config push.default simple");
    shell_exec("git add -A");
    shell_exec("git commit -m 'automatic commit from updated panel'");

    $pull_message = shell_exec("git pull");
    error_log($pull_message);

    exec("git push", $out, $status);

    site()->update(array(
        'pull_message' => $pull_message,
        'push_status' => $status
    ));
}
?>
