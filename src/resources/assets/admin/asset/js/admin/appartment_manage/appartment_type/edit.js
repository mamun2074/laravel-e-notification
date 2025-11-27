$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/appartment-manage/appartment-type/${id}`;
    // click event
    $(document).on('click', '#appartmentTypeEditBtn', function () {
        Helper.editSubmitForm(url, '#appartmentTypeEditForm', 'admin/appartment-manage/appartment-type');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#appartmentTypeEditForm', 'admin/appartment-manage/appartment-type');
        }
    });
});