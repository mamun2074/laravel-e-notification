
"use strict";
if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}
$(document).ready(function () {
    // click event
    $(document).on('click', '.theme-area', function () {
        var el = $(this);
        Helper.updateStatus('admin/website-settings/theme/update-status/' + el.attr('data-val'), false, Helper.trans('root.admin_web_theme.theme_active')).then(() => {
            $('.theme-area').removeClass('active-theme');
            el.addClass('active-theme');
        });
    });
    $(document).on('click', '.header-area', function () {
        var el = $(this);
        Helper.updateStatus('admin/website-settings/header/update-status/' + el.attr('data-val'), false, Helper.trans('root.admin_web_theme.header_active')).then(() => {
            $('.header-area').removeClass('active-header');
            el.addClass('active-header');
        });
    });
    $(document).on('click', '.footer-area', function () {
        var el = $(this);
        Helper.updateStatus('admin/website-settings/footer/update-status/' + el.attr('data-val'), false, Helper.trans('root.admin_web_theme.footer_active')).then(() => {
            $('.footer-area').removeClass('active-footer');
            el.addClass('active-footer');
        });
    });
});