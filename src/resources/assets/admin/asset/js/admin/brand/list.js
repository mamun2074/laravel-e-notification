
"use strict";

if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$(document).ready(function () {
    var brandDataTable = $('#brandDataTable').DataTable({

        dom: '<"row rtl-filter dis-flex over-flow-auto"<"col-lg-4 col-sm-12"l><"col-lg-4 col-sm-12"B><"col-lg-4 col-sm-12"f>><"row dis-flex over-flow-auto"<"col-12 col-sm-12"tr>><"row dis-flex"<"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
        lengthMenu: [
            [10, 30, 50, 100, -1],
            [10, 30, 50, 100, Helper.trans('root.datatable_common.all')]
        ],
        buttons: Helper.datatableButtons([0, 1, 2, 5], 'country'),
        createdRow: function (row, data, dataIndex) {
            $(row).attr('data-id', data.id);
        },
        columns: [{
            title: Helper.trans('root.datatable_common.serial_no'),
            data: 'id',
            class: "no-sort text-center",
            width: '15px',
            render: function (data, row, type, col) {
                var pageInfo = brandDataTable.page.info();
                return (col.row + 1) + pageInfo.start;
            }
        },
        {
            title: Helper.trans('root.general_settings_brand.name'),
            name: 'name',
            data: 'name'
        },
        {
            title: Helper.trans('root.general_settings_brand.image_path'),
            name: 'image_path',
            data: 'image_path',
            width: '300px',
            render: (data) => (data) ? `<img width="50px" src="${Helper.getStorageUrl(data)}" alt="">` : ''
        },
        {
            title: Helper.trans('root.datatable_common.status'),
            name: 'status',
            data: 'status',
            width: '40px',
            class: 'text-center',
            render: function (data, type, row, col) {
                var checked_label = (data == 1) ? `checked` : ``;
                var status_switch = `<div class="switch ">
                                        <label>
                                            <input data-val="${row.id}" class="custome-switch" type="checkbox" ${checked_label}>
                                            <span class=" lever switch-col-light-blue"></span>
                                        </label>
                                    </div>`;
                return status_switch;
            }
        },
        {
            title: Helper.trans('root.datatable_common.order'),
            name: 'order',
            data: 'order',
            width: '40px',
            class: 'text-center'
        },
        {
            title: Helper.trans('root.datatable_common.option'),
            data: 'id',
            width: '150px',
            class: 'text-center width-5-per',
            render: function (data, type, row, col) {
                var url_edit = `admin/general-settings/brand/${data}/edit`;
                var url = `admin/general-settings/brand/${data}`;
                let returnData = ``;
                if (Helper.isShow('drivers.edit')) {
                    returnData = `<a class="btn btn-xs btn-info waves-effect m-r-5" 
                                        href="${Helper.siteUrl(url_edit)}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="material-icons">mode_edit</i>
                                    </a>`;
                }
                if (Helper.isShow('drivers.destroy')) {
                    returnData += `<a data-val="${data}" class="btn btn-xs btn-danger waves-effect m-r-5 brandDelete"
                                    href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="material-icons">delete_forever</i>
                                    </a>`;
                }

                return returnData;
            }
        },
        ],
        ajax: {
            url: Helper.siteUrl("admin/general-settings/brand"),
        },
        language: {
            paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←'
            },
            infoEmpty: `${Helper.trans('root.datatable_common.info_showing')} 0 ${Helper.trans('root.datatable_common.info_to')} 0 ${Helper.trans('root.datatable_common.info_of')} 0 ${Helper.trans('root.datatable_common.info_entries')}`,
            info: `${Helper.trans('root.datatable_common.info_showing')} _START_ ${Helper.trans('root.datatable_common.info_to')} _END_ ${Helper.trans('root.datatable_common.info_of')} _TOTAL_ ${Helper.trans('root.datatable_common.info_entries')}`,
            sSearch: Helper.trans('root.datatable_common.search'),
            sLengthMenu: `${Helper.trans('root.datatable_common.show')}_MENU_${Helper.trans('root.datatable_common.entries')}`,
            zeroRecords: Helper.trans('root.datatable_common.no_matching_recoreds_found'),
            processing: Helper.trans('root.datatable_common.processing'),
            infoFiltered: `(${Helper.trans('root.datatable_common.filtered_from')} _MAX_ ${Helper.trans('root.datatable_common.total_entries')})`,
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: [0, 2, 3, 4, 5]
        }],
        responsive: true,
        autoWidth: false,
        serverSide: true,
        processing: true,
    });

    $(document).on('click', '.brandDelete', function () {
        var el = $(this);
        let config = Object.assign(Helper.swalConfig());
        Swal.fire(config).then(function (result) {
            if (result.value === true) {
                Helper.delete('admin/general-settings/brand/' + el.attr('data-val'), '#brandDataTable');
            }
        });
    });

    $(document).on('click', '.custome-switch', function () {
        var el = $(this);
        Helper.updateStatus('admin/general-settings/brand/update-status/' + el.attr('data-val'));
    });

    // $("#brandDataTable tbody").sortable({
    //     items: "tr",
    //     cursor: 'move',
    //     opacity: 0.6,
    //     update: function() {
    //         sendOrderToServer('#brandDataTable', 'admin/slider-sortable', brandDataTable.page
    //             .info().page);
    //     }
    // });

});























