$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/appartment-manage/appartment-gallery-type/${id}`;
    // click event
    $(document).on('click', '#appartmentGalleryTypeEditBtn', function () {
        Helper.editSubmitForm(url, '#appartmentGalleryTypeEditForm', 'admin/appartment-manage/appartment-gallery-type');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#appartmentGalleryTypeEditForm', 'admin/appartment-manage/appartment-gallery-type');
        }
    });
});