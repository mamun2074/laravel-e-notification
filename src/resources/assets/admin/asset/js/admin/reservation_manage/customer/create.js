$(document).ready(function () {
    // click event
    $(document).on('click', '#customerAddBtn', function () {
        Helper.addSubmitForm('admin/reservation-manage/customer', '#customerAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/reservation-manage/customer', '#customerAddForm');
        }
    });
});
