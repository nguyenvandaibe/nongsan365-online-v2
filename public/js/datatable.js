$(document).ready( function () {
    $('#dataTable').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
            "zeroRecords": "Không tìm thấy bản ghi nào.",
            "info": "Hiển thị trang _PAGE_ trong số _PAGES_.",
            "infoEmpty": "Không có bản ghi",
            "infoFiltered": "(tìm kiếm từ _MAX_ bản ghi)",
            "search": "Tìm kiếm",
            "paginate": {
                "previous": "Trước",
                "next": "Tiếp",
            }
        }
    });
} );
