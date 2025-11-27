$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/general-settings/team/${id}`;
    // click event
    $(document).on('click', '#teamEditBtn', function () {
        Helper.editSubmitForm(url, '#teamEditForm', 'admin/general-settings/team');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#teamEditForm', 'admin/general-settings/team');
        }
    });
});