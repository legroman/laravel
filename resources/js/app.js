require('./bootstrap');

$(document).ready(function () {
    $('#phone').inputmask('+38(999)-999-99-99');


    $('.legal-entity').on('click', function () {
        if ($(this).is(':checked')){
            $('label.legal-entity').removeClass('btn-outline-secondary').addClass('btn-primary');
            $('label.natural-person').removeClass('btn-primary').addClass('btn-outline-secondary');
            $('#firm-name').attr('name', 'firm_name').prop('required', true);
            $('.identification-code').text("ЄДРПОУ");
            $('.firm-name').css('display', 'flex');
        }
    })

    $('.natural-person').on('click', function () {
        if ($(this).is(':checked')){
            $('label.natural-person').removeClass('btn-outline-secondary').addClass('btn-primary');
            $('label.legal-entity').removeClass('btn-primary').addClass('btn-outline-secondary');
            $('#firm-name').attr('name', '').prop('required', false);
            $('.identification-code').text("ІПН");
            $('.firm-name').css('display', 'none');
        }
    })

    $(document).on('change', '.js-file-upload', function() {
        var $this = $(this);
        var form = $this.parents('form');
        var formData = new FormData();

        formData.append('profile_img', $this[0].files[0]);

        $.ajax({
            type: 'POST',
            data: formData,
            url: form.attr('action'),
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(request) {
                request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            success: function(data) {
                $(data.container).html(data.html);
            }, error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    })
})
