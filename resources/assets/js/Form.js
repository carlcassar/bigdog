$(function () {

    $('.update-type').hide();
    $(".update-type :input").prop('required', false);

    $('.receive-updates').change(function (e) {

        if ($(e.currentTarget).text() === ' Yes') {
            $(".update-type :input").prop('required', true);

            $('.update-type').show();
        } else {
            $(".update-type :input").prop('required', false);

            $('.update-type').hide();
        }
    });

    $("#data-capture-form").submit(function (e) {

        e.preventDefault();

        let formData = new FormData($(this)[0]);

        $.ajax({
            url: "/",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#ajax-messages').empty();
            },
            success: function (message) {
                let success = $('<div class="alert alert-success"></div>');

                success.append(message);

                $('#ajax-messages').append(success);

                $("#data-capture-form").hide();
            },
            error: function (data) {
                let errors = $('<div class="alert alert-danger"></div>');

                $.each(data.responseJSON.errors, function(name, message) {
                   errors.append(message);
                });

                $('#ajax-messages').append(errors);
            }
        });
    });

});
