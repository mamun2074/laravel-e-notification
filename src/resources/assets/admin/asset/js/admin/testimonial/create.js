$(document).ready(function () {
    // click event
    $(document).on('click', '#testimonialAddBtn', function () {
        Helper.addSubmitForm('admin/general-settings/testimonial', '#testimonialAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/general-settings/testimonial', '#testimonialAddForm');
        }
    });
});
