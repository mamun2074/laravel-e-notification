$(document).ready(function () {
    // click event
    $(document).on('click', '#newsAddBtn', function () {
        Helper.addSubmitForm('admin/general-settings/news', '#newsAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/general-settings/news', '#newsAddForm');
        }
    });
});
