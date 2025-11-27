$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/appartment-manage/appartment/${id}`;
    // click event
    $(document).on('click', '#appartmentEditBtn', function () {
        Helper.editSubmitForm(url, '#appartmentEditForm', 'admin/appartment-manage/appartment');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#appartmentEditForm', 'admin/appartment-manage/appartment');
        }
    });
});