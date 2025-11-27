"use strict";

if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$(document).ready(function () {
    var bookingDataTable = $('#bookingDataTable').DataTable({

        dom: '<"row rtl-filter dis-flex over-flow-auto"<"col-lg-4 col-sm-12"l><"col-lg-4 col-sm-12"B><"col-lg-4 col-sm-12"f>><"row dis-flex over-flow-auto"<"col-12 col-sm-12"tr>><"row dis-flex"<"col-12 col-sm-6"i><"col-12 col-sm-6"p>>',
        lengthMenu: [
            [10, 30, 50, 100, -1],
            [10, 30, 50, 100, Helper.trans('root.datatable_common.all')]
        ],
        buttons: Helper.datatableButtons([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 'booking'),
        createdRow: function (row, data, dataIndex) {
            $(row).attr('data-id', data.id);
        },
        columns: [{
            title: Helper.trans('root.datatable_common.serial_no'),
            data: 'id',
            class: "no-sort text-center",
            width: '15px',
            render: function (data, row, type, col) {
                var pageInfo = bookingDataTable.page.info();
                return (col.row + 1) + pageInfo.start;
            }
        },
        {
            title: Helper.trans('root.reservation_manage_booking.from_location'),
            name: 'from_location',
            data: 'from_location'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.to_location'),
            name: 'to_location',
            data: 'to_location'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.total_price'),
            name: 'total_price',
            data: 'total_price'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.payment_method'),
            name: 'payment_method',
            data: 'payment_method',
            render: function (data, type, row, col) {
                var rateType = (data == 1) ? `Cash` : `Paypal`;
                return rateType;
            }
        },
        {
            title: Helper.trans('root.reservation_manage_booking.payment_status'),
            name: 'payment_status',
            data: 'payment_status'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.guest_name'),
            name: 'guest_name',
            data: 'guest_name'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.guest_phone'),
            name: 'guest_phone',
            data: 'guest_phone'
        },
        {
            title: Helper.trans('root.reservation_manage_booking.guest_email'),
            name: 'guest_email',
            data: 'guest_email'
        },
        {
            title: Helper.trans('root.common.status'),
            name: 'status',
            data: 'status',
            render: function (data, type, row, col) {
                let status = '';
                if (data == 1) {
                    status = `<p class="btn btn-xs btn-info waves-effect m-r-5">Pending</p>`;
                } else if (data == 2) {
                    status = `<p class="btn btn-xs btn-success waves-effect m-r-5">Done</p>`;
                } else {
                    status = `<p class="btn btn-xs btn-danger waves-effect m-r-5">Cancel</p>`;
                }
                return status;
            }
        },
        {
            title: Helper.trans('root.datatable_common.option'),
            data: 'id',
            width: '250px',
            class: 'text-center width-5-per mb-2',
            render: function (data, type, row, col) {
                var url_edit = `admin/reservation-manage/booking/${data}/edit`;
                var url_show = `admin/reservation-manage/booking/${data}`;
                var url = `admin/reservation-manage/booking/${data}`;
                let returnData = ``;
                if (Helper.isShow('bookings.edit')) {
                    returnData = `<a class="btn btn-xs btn-info waves-effect m-r-5 mb-5" 
                                        href="${Helper.siteUrl(url_edit)}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="material-icons">mode_edit</i>
                                    </a>`;
                }

                if (Helper.isShow('bookings.show')) {
                    returnData += `<a target="_blank" class="btn btn-xs btn-info waves-effect m-r-5" 
                                        href="${Helper.siteUrl(url_show)}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="show">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>`;
                }
                if (Helper.isShow('bookings.destroy')) {
                    returnData += `<a data-val="${data}" class="btn btn-xs btn-danger waves-effect m-r-5 bookingDelete"
                                    href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="material-icons">delete_forever</i>
                                    </a>`;
                }

                return returnData;
            }
        },
        ],
        ajax: {
            url: Helper.siteUrl("admin/reservation-manage/booking"),
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
            targets: [0, 1, 2, 7, 10]
        }],
        responsive: true,
        autoWidth: false,
        serverSide: true,
        processing: true,
    });

    $(document).on('click', '.bookingDelete', function () {
        var el = $(this);
        let config = Object.assign(Helper.swalConfig());
        Swal.fire(config).then(function (result) {
            if (result.value === true) {
                Helper.delete('admin/reservation-manage/booking/' + el.attr('data-val'), '#bookingDataTable');
            }
        });
    });

    $(document).on('click', '.custome-switch', function () {
        var el = $(this);
        Helper.updateStatus('admin/reservation-manage/booking/update-status/' + el.attr('data-val'));
    });

    // $("#bookingDataTable tbody").sortable({
    //     items: "tr",
    //     cursor: 'move',
    //     opacity: 0.6,
    //     update: function() {
    //         sendOrderToServer('#bookingDataTable', 'admin/slider-sortable', bookingDataTable.page
    //             .info().page);
    //     }
    // });

});
