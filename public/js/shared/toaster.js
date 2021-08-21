class JqueryBootstrapToaster {

    constructor() {
        this.titles = {success: 'Thành công', info: 'Thông báo', warning: 'Chú ý', danger: 'Lỗi'};
    }

    toast(priority, message) {

        $.toaster({
            priority: priority,
            title: this.titles[priority],
            message: message,
            timeOut: 5000,
        });
    }
}
