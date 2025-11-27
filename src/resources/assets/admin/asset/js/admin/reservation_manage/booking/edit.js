$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/reservation-manage/booking/${id}`;
    // click event
    $(document).on('click', '#bookingEditBtn', function () {
        Helper.editSubmitForm(url, '#bookingEditForm', 'admin/reservation-manage/booking');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#bookingEditForm', 'admin/reservation-manage/booking');
        }
    });
});