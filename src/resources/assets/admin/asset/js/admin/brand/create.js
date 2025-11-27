$(document).ready(function () {
    // click event
    $(document).on('click', '#brandAddBtn', function () {
        Helper.addSubmitForm('admin/general-settings/brand', '#brandAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/general-settings/brand', '#brandAddForm');
        }
    });
});
