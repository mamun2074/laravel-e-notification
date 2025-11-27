$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/general-settings/country/${id}`;
    // click event
    $(document).on('click', '#countryEditBtn', function () {
        Helper.editSubmitForm(url, '#countryEditForm', 'admin/general-settings/country');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#countryEditForm', 'admin/general-settings/country');
        }
    });
});