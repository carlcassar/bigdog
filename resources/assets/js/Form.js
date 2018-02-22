$(function () {

    $('.update-type').hide();

    $('.receive-updates').change(() => {
        if ($('input[name="receive_updates"]:checked').val() === 'yes') {
            $(".update-type :input").prop('required', true);
            $('.update-type').show();
        } else {
            $(".update-type :input").prop('required', false);
            $('.update-type').hide();
        }
    });

    $("#data-capture-form").submit(e => {

        e.preventDefault();

        let $ajaxMessages = $('#ajax-messages');

        $.ajax({
            url: "/",
            type: 'POST',
            data: new FormData($(this)[0]),
            contentType: false,
            processData: false,
            beforeSend: () => $ajaxMessages.empty(),
            success: message => {
                $ajaxMessages.append($('<div class="alert alert-success"></div>').append(message));

                $(this)[0].reset();
            },
            error: data => {
                let errors = $('<div class="alert alert-danger"></div>');

                $.each(data.responseJSON.errors, function (name, message) {
                    errors.append(`<p>${message}</p>`);
                });

                $('#ajax-messages').append(errors);
            },
            complete: () => $('html, body').animate({scrollTop: 0}, 'slow')
        });
    });
});
