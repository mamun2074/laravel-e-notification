$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/reservation-manage/car/offer/${id}`;
    // click event
    $(document).on('click', '#carAddEditBtn', function () {
        Helper.editSubmitForm(url, '#carOfferAddEditForm', 'admin/reservation-manage/car');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#carOfferAddEditForm', 'admin/reservation-manage/car');
        }
    });
});