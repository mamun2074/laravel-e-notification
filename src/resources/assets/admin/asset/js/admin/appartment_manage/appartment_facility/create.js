$(document).ready(function () {
    // click event
    $(document).on('click', '#appartmentFacilityAddBtn', function () {
        Helper.addSubmitForm('admin/appartment-manage/appartment-facility', '#appartmentFacilityAddForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/appartment-manage/appartment-facility', '#appartmentFacilityAddForm');
        }
    });
});
