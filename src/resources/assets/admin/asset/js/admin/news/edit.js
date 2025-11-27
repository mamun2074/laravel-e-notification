$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/general-settings/news/${id}`;
    // click event
    $(document).on('click', '#newsEditBtn', function () {
        Helper.editSubmitForm(url, '#newsEditForm', 'admin/general-settings/news');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#newsEditForm', 'admin/general-settings/news');
        }
    });
});