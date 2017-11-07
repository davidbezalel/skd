jQuery(document).ready(function () {
    $('#register').submit(function (event) {
        event.preventDefault();
        $('#error').hide();
        $('#success').hide();
        var data = $(this).serialize();
        $.ajax({
            url: '/register',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.code == 201) {
                    $('#success').empty().append(data.message).show();
                } else {
                    $('#error').empty().append(data.message).show();
                }
            }
        });
    });
});