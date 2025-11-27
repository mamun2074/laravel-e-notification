$(document).ready(function () {
    // click event
    $(document).on('click', '#addUserBtn', function () {
        Helper.addSubmitForm('admin/user-manage/user', '#userForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/user-manage/user', '#userForm');
        }
    });
});
