$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/reservation-manage/customer/${id}`;
    // click event
    $(document).on('click', '#customerEditBtn', function () {
        Helper.editSubmitForm(url, '#customerEditForm', 'admin/reservation-manage/customer');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#customerEditForm', 'admin/reservation-manage/customer');
        }
    });
});