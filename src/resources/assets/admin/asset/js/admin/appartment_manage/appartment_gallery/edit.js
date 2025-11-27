$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/appartment-manage/appartment-gallery/${id}`;
    // click event
    $(document).on('click', '#appartmentGalleryEditBtn', function () {
        Helper.editSubmitForm(url, '#appartmentGalleryEditForm', 'admin/appartment-manage/appartment-gallery');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#appartmentGalleryEditForm', 'admin/appartment-manage/appartment-gallery');
        }
    });
});