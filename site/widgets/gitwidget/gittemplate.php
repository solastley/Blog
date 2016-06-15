<!-- PHP script to change variables on form submit -->
<?php
    if (isset($_POST['submit'])) {
        $changes = $_POST['merge'];
        echo $changes;
    }
 ?>

<!-- html for the widget -->
<style>
    h2 {
        padding-bottom: 16px;
    }
    .good-merge {
        color: green;
    }
    .bad-merge {
        color: red;
    }
    form {
        margin-left: auto;
        margin-right: auto;
        width: 95%;
    }
    textarea {
        width: 100%;
        padding: 12px;
    }
</style>

<?php if ($conflict): ?>
    <h2 class="bad-merge">Merge conflict found:</h2>
    <form action="" method="post">
        <textarea name="conflict" rows=20><?= $message4 ?></textarea>
        <input type="submit" name="submit" />
    </form>
<?php else: ?>
    <h2 class="good-merge">No merge conflicts found.</h2>
<?php endif; ?>
