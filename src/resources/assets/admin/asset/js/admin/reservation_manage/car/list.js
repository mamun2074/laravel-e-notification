"use strict";

if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$(document).ready(function () {
    var carDataTable = $('#carDataTable').DataTable({

        dom: '<"row rtl-filter dis-flex over-flow-auto"<"col-lg-4 col-sm-12"l><"col-lg-4 col-sm-12"B><"col-lg-4 col-sm-12"f>><"row dis-flex over-flow-auto"<"col-12 col-sm-12"tr>><"row dis-flex"<"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
        lengthMenu: [
            [10, 30, 50, 100, -1],
            [10, 30, 50, 100, Helper.trans('root.datatable_common.all')]
        ],
        buttons: Helper.datatableButtons([0, 1, 2, 4, 5, 6, 7], 'Car'),
        createdRow: function (row, data, dataIndex) {
            $(row).attr('data-id', data.id);
        },
        columns: [{
            title: Helper.trans('root.datatable_common.serial_no'),
            data: 'id',
            class: "no-sort text-center",
            width: '15px',
            render: function (data, row, type, col) {
                var pageInfo = carDataTable.page.info();
                return (col.row + 1) + pageInfo.start;
            }
        },
        {
            title: Helper.trans('root.reservation_manage_car.name'),
            name: 'name',
            data: 'name'
        },
        {
            title: Helper.trans('root.reservation_manage_car.model'),
            name: 'model',
            data: 'model'
        },
        {
            title: Helper.trans('root.reservation_manage_car.rate_type'),
            name: 'rate_type',
            data: 'rate_type',
            render: function (data, type, row, col) {
                var rateType = (data == 1) ? `Hourly` : `Daily`;
                return rateType;
            }
        },
        {
            title: Helper.trans('root.reservation_manage_car.rate'),
            name: 'rate',
            data: 'rate'
        },
        {
            title: Helper.trans('root.reservation_manage_car.gratuity'),
            name: 'gratuity',
            data: 'gratuity'
        },
        {
            title: Helper.trans('root.reservation_manage_car.type'),
            name: 'type',
            data: 'type'
        },
        {
            title: Helper.trans('root.datatable_common.status'),
            name: 'status',
            data: 'status',
            width: '40px',
            class: 'text-center',
            render: function (data, type, row, col) {
                let status = '';
                if (data == 1) {
                    status = `<p class="btn btn-xs btn-info waves-effect m-r-5">Active</p>`;
                } else if (data == 2) {
                    status = `<p class="btn btn-xs btn-danger waves-effect m-r-5">InActive</p>`;
                } else {
                    status = `<p class="btn btn-xs btn-success waves-effect m-r-5">Booked</p>`;
                }
                return status;
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
                var url_edit = `admin/reservation-manage/car/${data}/edit`;
                var url_offer = `admin/reservation-manage/car/offer/${data}`;
                var url = `admin/reservation-manage/car/${data}`;
                let returnData = ``;
                if (Helper.isShow('cars.edit')) {
                    returnData = `<a class="btn btn-xs btn-info waves-effect m-r-5" 
                                        href="${Helper.siteUrl(url_edit)}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="material-icons">mode_edit</i>
                                    </a>`;
                }
                if (Helper.isShow('cars.destroy')) {
                    returnData += `<a data-val="${data}" class="btn btn-xs btn-danger waves-effect m-r-5 carDelete"
                                    href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="material-icons">delete_forever</i>
                                    </a>`;
                }

                if (Helper.isShow('cars.offer')) {
                    returnData += `<a class="btn btn-xs btn-success waves-effect m-r-5" 
                                        href="${Helper.siteUrl(url_offer)}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Add Offer">
                                        <i class="material-icons">local_offer</i>
                                    </a>`;
                }

                return returnData;
            }
        },
        ],
        ajax: {
            url: Helper.siteUrl("admin/reservation-manage/car"),
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
            targets: [0, 7, 8, 9]
        }],
        responsive: true,
        autoWidth: false,
        serverSide: true,
        processing: true,
    });

    $(document).on('click', '.carDelete', function () {
        var el = $(this);
        let config = Object.assign(Helper.swalConfig());
        Swal.fire(config).then(function (result) {
            if (result.value === true) {
                Helper.delete('admin/reservation-manage/car/' + el.attr('data-val'), '#carDataTable');
            }
        });
    });

    $(document).on('click', '.custome-switch', function () {
        var el = $(this);
        Helper.updateStatus('admin/reservation-manage/car/update-status/' + el.attr('data-val'));
    });

    // $("#carDataTable tbody").sortable({
    //     items: "tr",
    //     cursor: 'move',
    //     opacity: 0.6,
    //     update: function() {
    //         sendOrderToServer('#carDataTable', 'admin/slider-sortable', carDataTable.page
    //             .info().page);
    //     }
    // });

});
