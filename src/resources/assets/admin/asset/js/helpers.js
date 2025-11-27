"use strict";

function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

var Helper = {
    log: (item) => {
        if (window.appDebug == true) {
            typeof item == "undefined" ? "" : console.log(item);
        }
    },
    isEmpty: (value) => {
        return (value == null || value.length === 0);
    },
    trans: (key, replace = {}) => {
        var translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);
        for (var placeholder in replace) {
            translation = translation.replace(`:${placeholder}`, replace[placeholder]);
        }
        return translation;
    },
    isShow: (key) => {
        if (window.permission_enable) {
            return window.permissions.indexOf(key) != -1;
        } else {
            return true;
        }
    },
    siteUrl: (extra) => {
        extra = typeof extra == "undefined" ? "" : extra;
        return window.url + extra;
    },
    getStorageUrl: (path) => {
        return Helper.siteUrl('storage/' + path);
    },
    datatableButtons: (colomns = [], name = 'list') => {
        var exportOptions = {
            columns: colomns
        };
        var filename = `${name}_${moment().format('YYYYMMDD_hmmss')}`;
        var expot = [
            {
                extend: 'copy',
                text: "Copy",
                exportOptions,
                filename
            },
            {
                extend: 'csv',
                text: "CSV",
                exportOptions,
                filename
            },
            {
                extend: 'excel',
                text: "Excel",
                exportOptions,
                filename
            },
            {
                extend: 'pdf',
                text: "PDF",
                exportOptions,
                filename
            },
            {
                extend: 'print',
                text: "Print",
                exportOptions,
                filename
            }
        ];

        return expot;
    },
    uiBlock: () => {
        $(".page-loader-wrapper").fadeIn();
    },
    uiUnBlock: () => {
        $(".page-loader-wrapper").fadeOut();
    },
    swalConfig: () => {
        var title = Helper.trans('root.message.are_you_sure');
        var text = Helper.trans('root.message.you_wont_be_able_to_revert_this');
        var confirmButtonText = Helper.trans('root.message.yes_delete_it');
        var cancelButtonText = Helper.trans('root.message.cancel');
        return {
            title,
            text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText,
            cancelButtonText
        }
    },
    ajaxRequest: (type = 'GET', url, payload = false, redirect = false) => {
        if (redirect == false) {
            Helper.uiBlock();
        }
        return new Promise((resolve, reject) => {
            if (typeof type == 'undefined') {
                toastr["error"]('Please set post type');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            }
            if (typeof url == 'undefined') {
                toastr["error"]('Please set url');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            }
            let axiosOption = {
                method: type,
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            if (type == 'POST') {
                if (payload != false) {
                    axiosOption.data = payload;
                }
            }
            axios(axiosOption).then(resData => {
                if (redirect) {
                    location.reload();
                }
                Helper.uiUnBlock();
                resolve(resData);
            }).catch((error) => {
                toastr["error"]('Network error');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            });
        });
    },
    addSubmitForm: (url, formId, redirectUrl = false) => {
        Helper.uiBlock();
        return new Promise((resolve, reject) => {
            if (typeof url == 'undefined') {
                toastr["error"]('Please give url');
                Helper.uiUnBlock();
                reject();
            }
            if (typeof formId == 'undefined') {
                toastr["error"]('Please give form id');
                Helper.uiUnBlock();
                reject();
            }
            // disable the submit button
            $(document).find(formId + ' .submitBtn').addClass('disabled');
            // label error set empty
            $(document).find(formId).find('label.error').empty();
            // remove error class
            $(document).find(formId).find('div.form-line').removeClass('error');
            let axiosOption = {
                method: 'POST',
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            let formData = new FormData($(document).find(formId)[0]);
            formData.append("_method", "POST");
            axiosOption.data = formData;
            axios(axiosOption).then(resData => {
                if (resData == 'fail') {
                    toastr["error"]('NO network connection ');
                    Helper.uiUnBlock();
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                }
                else {
                    // reset form value
                    $(document).find(formId)[0].reset();
                    toastr["success"](Helper.trans('root.message.successfully_created'));
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                    Helper.uiUnBlock();
                    if (redirectUrl != false) {
                        setTimeout(function () {
                            window.location.replace(Helper.siteUrl(redirectUrl));
                        }, 1000);
                    }
                    resolve('Success');
                }
            }).catch(failData => {
                Helper.uiUnBlock();
                Helper.setError(failData, formId);
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
                reject('Validation Error');
            });
        });
    },
    addFrontEndSubmitForm: (url, formId, redirectUrl = false) => {
        Helper.uiBlock();
        return new Promise((resolve, reject) => {
            if (typeof url == 'undefined') {
                toastr["error"]('Please give url');
                Helper.uiUnBlock();
                reject();
            }
            if (typeof formId == 'undefined') {
                toastr["error"]('Please give form id');
                Helper.uiUnBlock();
                reject();
            }
            // disable the submit button
            $(document).find(formId + ' .submitBtn').addClass('disabled');
            // label error set empty
            $(document).find(formId).find('label.error').empty();
            // remove error class
            $(document).find(formId).find('div.form-line').removeClass('error');
            let axiosOption = {
                method: 'POST',
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            let formData = new FormData($(document).find(formId)[0]);
            formData.append("_method", "POST");
            axiosOption.data = formData;
            axios(axiosOption).then(resData => {
                if (resData == 'fail') {
                    toastr["error"]('NO network connection ');
                    Helper.uiUnBlock();
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                }
                else {
                    // reset form value
                    $(document).find(formId)[0].reset();
                    toastr["success"](Helper.trans('root.message.successfully_created'));
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                    Helper.uiUnBlock();
                    if (redirectUrl != false) {
                        setTimeout(function () {
                            window.location.replace(Helper.siteUrl(redirectUrl));
                        }, 1000);
                    }
                    resolve(resData);
                }
            }).catch(failData => {
                Helper.uiUnBlock();
                Helper.setError(failData, formId);
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
                reject('Validation Error');
            });
        });
    },
    editSubmitForm: (url, formId, redirectUrl = false, isReset = true) => {
        Helper.uiBlock();
        return new Promise((resolve, reject) => {
            if (typeof url == 'undefined') {
                toastr["error"]('Please give url');
                Helper.uiUnBlock();
                reject();
            }
            if (typeof formId == 'undefined') {
                toastr["error"]('Please give form id');
                Helper.uiUnBlock();
                reject();
            }
            // disable the submit button
            $(document).find(formId + ' .submitBtn').addClass('disabled');
            // label error set empty
            $(document).find(formId).find('label.error').empty();
            // remove error class
            $(document).find(formId).find('div.form-line').removeClass('error');
            let axiosOption = {
                method: 'POST',
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            let formData = new FormData($(document).find(formId)[0]);
            formData.append("_method", "PUT");
            axiosOption.data = formData;
            axios(axiosOption).then(resData => {
                Helper.uiUnBlock();
                if (resData == 'fail') {
                    toastr["error"]('NO network connection ');
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                }
                else {
                    // reset form value
                    if (isReset) {
                        $(document).find(formId)[0].reset();
                    }

                    toastr["success"](Helper.trans('root.message.successfully_updated'));
                    $(document).find(formId + ' .submitBtn').removeClass('disabled');
                    if (redirectUrl != false) {
                        setTimeout(function () {
                            window.location.replace(Helper.siteUrl(redirectUrl));
                        }, 500);
                    }
                    resolve(Jreturn);
                }
            }).catch(failData => {
                Helper.uiUnBlock();
                Helper.setError(failData, formId);
                $(document).find(formId + ' .submitBtn').removeClass('disabled');
                reject('Validation error');
            });
        });
    },
    delete: (url, dataTableID = false) => {
        axios.delete(Helper.siteUrl(url))
            .then(resData => {
                toastr["success"](Helper.trans('root.message.successfully_deleted'));
                if (dataTableID != false) {
                    $(dataTableID).DataTable().ajax.reload();
                }
            }).catch(failData => {
                if (failData.response.data.message.search('SQLSTATE\\[23000\\]') != -1) {
                    toastr["error"](Helper.trans('root.message.foreign_key_constant_error'));
                }
                else if (failData.response.data.message.search('No query results') != -1) {
                    toastr["error"](Helper.trans('root.message.no_query_results'));
                } else {
                    toastr["error"]('Something went wrong !!');
                }
            });
    },
    updateStatus: (url, dataTableID = false, message = false) => {
        return new Promise((resolve, reject) => {
            if (typeof url == 'undefined') {
                toastr["error"]('Please give url');
                reject();
            }
            let axiosOption = {
                method: 'POST',
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            axios(axiosOption).then(resData => {
                if (resData == 'fail') {
                    toastr["error"]('NO network connection ');
                }
                else {
                    if (message == false) {
                        toastr["success"](Helper.trans('root.message.successfully_status_updated'));
                    } else {
                        toastr["success"](message);
                    }

                    if (dataTableID != false) {
                        $(dataTableID).DataTable().ajax.reload();
                    }
                    resolve('Success');
                }
            }).catch(failData => {
                if (dataTableID != false) {
                    $(dataTableID).DataTable().ajax.reload();
                }
                toastr["error"]('Network Error ');
                Helper.uiUnBlock();
                reject('Validation Error');
            });
        });
    },
    update: (url, dataTableID = false) => {
        return new Promise((resolve, reject) => {
            if (typeof url == 'undefined') {
                toastr["error"]('Please give url');
                reject();
            }
            let axiosOption = {
                method: 'POST',
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            axios(axiosOption).then(resData => {
                if (resData == 'fail') {
                    toastr["error"]('NO network connection ');
                }
                else {
                    toastr["success"](Helper.trans('root.message.successfully_updated'));
                    if (dataTableID != false) {
                        $(dataTableID).DataTable().ajax.reload();
                    }
                    resolve('Success');
                }
            }).catch(failData => {
                if (dataTableID != false) {
                    $(dataTableID).DataTable().ajax.reload();
                }
                if (failData.response.status = 403) {
                    toastr["error"](Helper.trans('root.message.permission_denied'));
                } else {
                    toastr["error"]('Network error ');
                }
                Helper.uiUnBlock();
                reject('Validation Error');
            });
        });
    },
    setError: (failData, formId) => {
        $.each(failData.response.data.errors, function (inputName, errors) {
            try {
                let arrayInd = null;
                if (inputName.indexOf('.') > -1) {
                    nameArray = inputName.split('.');
                    inputName = '';
                    $.each(nameArray, function (index) {
                        if ($.isNumeric(nameArray[index]) && (typeof nameArray[index + 1] == 'undefined'))
                            return false;
                        if (index > 0) {
                            inputName += '[';
                        }
                        inputName += nameArray[index];
                        if (index > 0) {
                            inputName += ']';
                        }
                    });
                    arrayInd = nameArray[(nameArray.length - 1)];
                }
                var inputSelector = $(document).find(formId + ' [name^="' + inputName + '"]');
                if (inputSelector.length > 1) {
                    let newInputName = inputName + '[' + arrayInd + ']';
                    let newInputSelector = $(document).find(formId + ' [name^="' + newInputName + '"]');
                    if (typeof newInputSelector != 'undefined' && newInputSelector != null && newInputSelector.length != 0) {
                        inputSelector = newInputSelector;
                    }
                    else {
                        inputSelector = $(inputSelector)[arrayInd];
                    }
                }
                $(inputSelector).closest('.form-group').find('div.form-line').addClass('error');
                if (typeof errors == "object") {
                    $(inputSelector).closest('.form-group').find('label.error').empty();
                    $.each(errors, function (indE, valE) {
                        if (arrayInd != null) {
                            valE = valE.split(('.' + arrayInd)).join('');
                            valE = valE.split('_').join(' ');
                        }
                        $(inputSelector).closest('.form-group').find('label.error').append(valE + "<br>");
                    });
                }
                else {
                    $(inputSelector).closest('.form-group').find('label.error').html(valE);
                }
                $(inputSelector).closest('.form-group').find('label.error').removeClass('dis-none');
            }
            catch {
                toastr["error"](Helper.trans('root.message.validation_error_message'));
            }
        });
        toastr["error"](Helper.trans('root.message.validation_error_message'));
    },
    ajaxRequest: (type = 'GET', url, redirect = false) => {
        if (redirect == false) {
            Helper.uiBlock();
        }
        return new Promise((resolve, reject) => {
            if (typeof type == 'undefined') {
                toastr["error"]('Please set post type');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            }
            if (typeof url == 'undefined') {
                toastr["error"]('Please set url');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            }
            let axiosOption = {
                method: type,
                url: Helper.siteUrl(url),
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            axios(axiosOption).then(resData => {
                if (redirect) {
                    location.reload();
                }
                Helper.uiUnBlock();
                resolve(resData);
            }).catch((error) => {
                toastr["error"]('Network error');
                if (redirect == false) {
                    Helper.uiUnBlock();
                }
                reject();
            });
        });
    },
    configChart: (type, labels, datasets) => {
        const allConfig = {
            type,
            data: {
                labels,
                datasets
            },
            options: {
                responsive: true,
                lineTension: 1,
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true,
                                padding: 25
                            }
                        }
                    ]
                }
            }
        }
        return allConfig;
    },
    getDaysInMonth: (year, month) => {
        const days = [];
        const date = new Date(year, month - 1, 1); // Month is 0-indexed
        while (date.getMonth() === month - 1) {
            days.push(date.getDate());
            date.setDate(date.getDate() + 1);
        }
        return days;
    }
};

