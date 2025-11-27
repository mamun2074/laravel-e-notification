
"use strict";
if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}
$(document).ready(function () {
    var update_site_setting = `admin/website-settings/general/site-settings-update`;
    // site-settings update
    $(document).on('click', '#updateSiteSettingsBtn', function () {
        Helper.editSubmitForm(update_site_setting, '#updateSiteSettingForm', false, false);
    });
    var update_contact_info = `admin/website-settings/general/contact-infos-update`;
    // contact-infos update
    $(document).on('click', '#updateContactInfoBtn', function () {
        Helper.editSubmitForm(update_contact_info, '#contactInfoForm', false, false);
    });
    var update_opening_hours = `admin/website-settings/general/openings-hours`;
    // openings-hours update
    $(document).on('click', '#updateOpeningInfoBtn', function () {
        Helper.editSubmitForm(update_opening_hours, '#openingInfoForm', false, false);
    });
    var update_social_link = `admin/website-settings/general/social-links-update`;
    // social-links update
    $(document).on('click', '#updateSocialSettingBtn', function () {
        Helper.editSubmitForm(update_social_link, '#socialSettingForm', false, false);
    });

    let new_item = `<div class="col-md-12 items">
                        <div class="form-group form-float">
                            <label class="form-label">${Helper.trans('root.admin_web_general.opening_info')}
                                <span class="text-danger">*</span></label>
                            <div class="form-line">
                                <input placeholder="Opening infos" autocomplete="off" value=""
                                    name="opening_infos[]" type="text" class="form-control">
                            </div>
                            <label class="error dis-none"></label>
                        </div>
                    </div>`;
    $(document).on('click', '#add', function () {
        $('#itemPrepend').before(new_item);
    });

    $(document).on('click', '#minus', function () {
        $('.items').last().remove();
    });

    // banner 1 update
    var update_banner1_setting = `admin/website-settings/general/banner1-setting-update`;
    $(document).on('click', '#updateBanner1SettingBtn', function () {
        Helper.editSubmitForm(update_banner1_setting, '#banner1SettingForm', false, false);
    });
    // seo update
    var update_seo_setting = `admin/website-settings/general/seo-setting-update`;
    $(document).on('click', '#updateSEOSettingBtn', function () {
        Helper.editSubmitForm(update_seo_setting, '#seoSettingForm', false, false);
    });

    // system_setting update
    var update_system_setting = `admin/website-settings/general/system-setting-update`;
    $(document).on('click', '#updateSystemBtn', function () {
        Helper.editSubmitForm(update_system_setting, '#systemForm', 'admin/website-settings/general', false);
    });




});