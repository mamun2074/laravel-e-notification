$(document).ready(function () {
    // click event
    $(document).on('click', '#languageAddBtn', function () {
        Helper.addSubmitForm('admin/user-manage/language', '#languageAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/user-manage/language', '#languageAddForm');
        }
    });

    // click event
    $(document).on('click', '#languageConfigBtn', function () {
        var language_id = $('#language_id').val();
        Helper.editSubmitForm(`admin/user-manage/language/configure-language/${language_id}`, '#languageConfigForm', `admin/user-manage/language/configure-language/${language_id}`);
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            var language_id = $('#language_id').val();
            Helper.editSubmitForm(`admin/user-manage/language/configure-language/${language_id}`, '#languageConfigForm', `admin/user-manage/language/configure-language/${language_id}`);
        }
    });

});
