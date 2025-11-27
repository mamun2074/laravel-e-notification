$(document).ready(function () {
    // click event
    $(document).on('click', '#appartmentTypeAddBtn', function () {
        Helper.addSubmitForm('admin/appartment-manage/appartment-type', '#appartmentTypeAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/appartment-manage/appartment-type', '#appartmentTypeAddForm');
        }
    });
});
