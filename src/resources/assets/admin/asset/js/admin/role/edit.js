$(document).ready(function () {
    var id = $('#id').val();
    var url = `admin/user-manage/role/${id}`;
    // click event
    $(document).on('click', '#roleEditBtn', function () {
        Helper.editSubmitForm(url, '#roleEditForm', 'admin/user-manage/role');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.editSubmitForm(url, '#roleEditForm', 'admin/user-manage/role');
        }
    });
    $('.tree').simpleTreePicker({
        "tree": treeData,
        "selected": oldData,
        "name": "permission_menu"
    });
});