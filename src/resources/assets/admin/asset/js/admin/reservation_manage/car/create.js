$(document).ready(function () {
    // click event
    $(document).on('click', '#carAddBtn', function () {
        Helper.addSubmitForm('admin/reservation-manage/car', '#carAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/reservation-manage/car', '#carAddForm');
        }
    });
});
