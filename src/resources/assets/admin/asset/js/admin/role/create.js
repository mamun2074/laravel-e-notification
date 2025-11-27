$(document).ready(function () {
    // click event
    $(document).on('click', '#addRoleBtn', function () {
        Helper.addSubmitForm('admin/user-manage/role', '#roleForm');
    });
    // enter key press button
    $(document).on('keypress', function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            Helper.addSubmitForm('admin/user-manage/role', '#roleForm');
        }
    });
    $('.tree').simpleTreePicker({
        "tree": treeData,
        "name": "permission_menu"
    });
});
