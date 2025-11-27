$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/appartment-manage/appartment-facility/${id}`;
    // click event
    $(document).on('click', '#appartmentFacilityEditBtn', function () {
        Helper.editSubmitForm(url, '#appartmentFacilityEditForm', 'admin/appartment-manage/appartment-facility');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#appartmentFacilityEditForm', 'admin/appartment-manage/appartment-facility');
        }
    });
});