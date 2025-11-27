$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/reservation-manage/offer/${id}`;
    // click event
    $(document).on('click', '#offerEditBtn', function () {
        Helper.editSubmitForm(url, '#offerEditForm', 'admin/reservation-manage/offer');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#offerEditForm', 'admin/reservation-manage/offer');
        }
    });
});