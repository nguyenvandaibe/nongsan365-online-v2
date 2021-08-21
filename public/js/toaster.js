$(document).ready(function () {

    let messageValue = $('#message').val();

    let messageType = $('#messageType').val();

    let titles = {success: 'Thành công', info: 'Thông báo', warning: 'Chú ý', danger: 'Lỗi'};

    console.log(messageType);

    if (messageValue) {
        $.toaster({
            priority : messageType,
            title : titles[messageType],
            message : messageValue,
            timeOut: 5000,
        });
    }
})
