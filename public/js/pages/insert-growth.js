$(document).ready(function () {

    $('#btnSubmit').on('click', function () {

        submitForm();
    })
});

function submitForm() {

    let formData = new FormData();

    formData.append('weight', $('#productWeight').val());
    formData.append('height', $('#productHeight').val());
    formData.append('photos', $('#productPhotos').val());

    let url = $('#insertGrowthForm').data('action');

    console.log(url);

    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        processData: false,

    }).done(function (data, textStatus, jqXHR) {

        console.log(data);

    }).fail(function (jqXHR, textStatus, errorThrown) {

        console.log(jqXHR, textStatus, errorThrown);
    });
}
