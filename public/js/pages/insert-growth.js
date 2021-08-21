$(document).ready(function () {

    $('#btnSubmit').on('click', function (e) {

        submitForm();
    })
});

function submitForm() {

    let formData = new FormData();

    formData.append('weight', $('#productWeight').val() ?? 0);
    formData.append('height', $('#productHeight').val());
    formData.append('step', $('#productStep').val() ?? '');

    $.each($('#productPhotos')[0].files, function (i, file) {
        formData.append('photos[]', file);
    });

    let url = $('#insertGrowthForm').data('action');

    let toaster = new JqueryBootstrapToaster();

    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        processData: false,
        contentType: false
    })
        .done(function (data, textStatus, jqXHR) {

        })
        .then(function (data) {

            clearForm();

            toaster.toast('success', 'Dữ liệu đã được cập nhật');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 422) {

                toaster.toast('warning', jqXHR.responseJSON.message);

            } else {

                toaster.toast('danger', 'Hệ thống đã xảy ra lỗi');
            }
        });
}

function clearForm() {

    $('#insertGrowthForm').trigger("reset");

    $('#insertGrowthModal').modal('hide');

    $('.gallery').empty();
}
