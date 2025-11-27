$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/general-settings/brand/${id}`;
    // click event
    $(document).on('click', '#brandEditBtn', function () {
        Helper.editSubmitForm(url, '#brandEditForm', 'admin/general-settings/brand');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#brandEditForm', 'admin/general-settings/brand');
        }
    });
});