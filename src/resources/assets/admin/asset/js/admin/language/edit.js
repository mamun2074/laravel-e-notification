$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/user-manage/language/${id}`;
    // click event
    $(document).on('click', '#languageEditBtn', function () {
        Helper.editSubmitForm(url, '#languageEditForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#languageEditForm', 'admin/user-manage/language');
        }
    });
});