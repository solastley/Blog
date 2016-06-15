<!-- JavaScript for widget (does not have normal header) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var message = $('#conflict-message').html();
        var new_message = message.split("\n").join("<br />");
        $('#conflict-message').html(new_message);

        $('#submit-btn').click(function(){
            $('#hidden-conflict').val(message);
            $('#hidden-filename').val('<?=$filename?>');
        });
    });
</script>

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
        display: none;
    }
    #submit-btn {
        margin-top: 12px;
        padding: 4px 8px;
    }
</style>

<?php if ($conflict): ?>
    <h2 class="bad-merge">Merge conflict found:</h2>
    <form action="<?= page('gitwidget')->url() ?>" method="post" id="conflict-form">
        <div id="conflict-message"><?= $pull_message ?></div>
        <textarea name="conflict" id="hidden-conflict"></textarea>
        <input name="filename" id="hidden-filename" />
        <input type="submit" name="submit" id="submit-btn" value="Click here to fix"/>
    </form>
<?php else: ?>
    <h2 class="good-merge">No merge conflicts found.</h2>
<?php endif; ?>
