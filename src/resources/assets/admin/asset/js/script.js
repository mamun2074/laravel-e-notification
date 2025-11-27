"use strict";
$('.datetimepicker').datetimepicker();

$('.datepicker').datetimepicker({
    timepicker: false,
    format: 'd/m/Y',
    formatDate: 'Y/m/d'
});

$('.timepicker').datetimepicker({
    datepicker: false,
    format: 'H:i',
    step: 1
});
