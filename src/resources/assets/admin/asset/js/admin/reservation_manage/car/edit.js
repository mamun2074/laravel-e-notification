$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/reservation-manage/car/${id}`;
    // click event
    $(document).on('click', '#carEditBtn', function () {
        Helper.editSubmitForm(url, '#carEditForm', 'admin/reservation-manage/car');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#carEditForm', 'admin/reservation-manage/car');
        }
    });
});