$(document).ready(function () {
    // click event
    $(document).on('click', '#pageAddBtn', function () {
        var content = tinymce.get('tinymce').getContent();
        $('#tinymce').val(content);
        Helper.addSubmitForm('admin/page-manage/page', '#pageAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/page-manage/page', '#pageAddForm');
        }
    });
});
