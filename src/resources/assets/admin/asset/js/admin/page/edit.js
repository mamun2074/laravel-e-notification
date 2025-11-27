$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/page-manage/page/${id}`;
    // click event
    $(document).on('click', '#pageEditBtn', function () {
        var content = tinymce.get('tinymce').getContent();
        $('#tinymce').val(content);
        Helper.editSubmitForm(url, '#pageEditForm', 'admin/page-manage/page');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#pageEditForm', 'admin/page-manage/page');
        }
    });
});