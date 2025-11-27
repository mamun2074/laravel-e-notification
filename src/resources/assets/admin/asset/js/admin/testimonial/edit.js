$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/general-settings/testimonial/${id}`;
    // click event
    $(document).on('click', '#testimonialEditBtn', function () {
        Helper.editSubmitForm(url, '#testimonialEditForm', 'admin/general-settings/testimonial');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#testimonialEditForm', 'admin/general-settings/testimonial');
        }
    });
});