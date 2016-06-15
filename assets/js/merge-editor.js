$(document).ready(function(){
    $('#conflict-edit-form').submit(function(e){
        e.preventDefault();

        var $new_text = $('textarea#new-message').val();
        var $filename = $('input#hidden-filename').val();
        $.ajax({
            url: 'assets/php/merge-conflict.php',
            type: 'POST',
            data: {
                text: $new_text,
                filename: $filename
            },
            success: function(data) {
                console.log(data);
            },
            error: function() {
                console.log("Still not working...");
            }
        });
    });
});
