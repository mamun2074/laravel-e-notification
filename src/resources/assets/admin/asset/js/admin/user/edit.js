$(document).ready(function () {
    var id = $('#id').val();
    var user_url = `admin/user-manage/user/${id}`;
    // click event
    $(document).on('click', '#editUserBtn', function () {
        Helper.editSubmitForm(user_url, '#userEditForm', 'admin/user-manage/user');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        if (window.location.href.indexOf(user_url) != -1) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                Helper.editSubmitForm(user_url, '#userEditForm', 'admin/user-manage/user');
            }
        }

    });

    var user_id = $('#user_id').val();
    var user_profile_url = `admin/user-manage/user/profile/${user_id}`;
    // click event
    $(document).on('click', '#updateProfileBtn', function () {
        Helper.editSubmitForm(user_profile_url, '#profileUpdateForm', user_profile_url);
    });
    var user_password_changed_url = `admin/user-manage/user/password-change/${user_id}`;
    // click event
    $(document).on('click', '#updateUserPasswordBtn', function () {
        Helper.editSubmitForm(user_password_changed_url, '#updateUserPasswordForm', user_profile_url);
    });
});