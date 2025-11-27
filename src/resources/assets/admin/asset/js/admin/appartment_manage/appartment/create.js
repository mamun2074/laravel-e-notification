$(document).ready(function () {
    // click event
    $(document).on('click', '#appartmentAddBtn', function () {
        Helper.addSubmitForm('admin/appartment-manage/appartment', '#appartmentAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/appartment-manage/appartment', '#appartmentAddForm');
        }
    });
});
