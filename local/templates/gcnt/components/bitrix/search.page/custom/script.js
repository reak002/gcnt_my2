'use strict';
$(document).ready(function () {
    $('body').on('click', '.input_wrapper .clear', function () {
        $('[name="q"]').val('');
    })
});