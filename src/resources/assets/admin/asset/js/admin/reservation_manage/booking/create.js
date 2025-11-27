$(document).ready(function () {
    // click event
    $(document).on('click', '#bookingAddBtn', function () {
        Helper.addSubmitForm('admin/reservation-manage/booking', '#bookingAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/reservation-manage/booking', '#bookingAddForm');
        }
    });
});
