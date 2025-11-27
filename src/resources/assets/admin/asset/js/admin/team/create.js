$(document).ready(function () {
    // click event
    $(document).on('click', '#teamAddBtn', function () {
        Helper.addSubmitForm('admin/general-settings/team', '#teamAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/general-settings/team', '#teamAddForm');
        }
    });
});
