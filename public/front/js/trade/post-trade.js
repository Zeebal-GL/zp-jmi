$(document).ready(function () {
    $('#payment_method_id').change(function () {
        mval = $('#payment_method_id option:selected').text();
        tdtype = $('#trade_type_id').val();

        if (mval.toLowerCase() == 'cash' || mval=='现金') {
            $('#payment_method_name').val(mval.toLowerCase());
            $('.payment_window_cls').hide();
            $('.payment_detail_cls').hide();
        } else {
            $('.payment_window_cls').show();
            if (tdtype == 'S') {
                $('.payment_detail_cls').show();
            }
        }
        if (tdtype == 'S' && mval.toLowerCase() != 'cash' && mval!='现金') {
            $('.payment_detail_cls').show();
        } else {
            $('.payment_detail_cls').hide();
        }

    });

    $('#trade_type_id').change(function () {
        mval = $('#payment_method_id option:selected').text();
        mval2 = $('#payment_method_id').val();
        tdtype = $('#trade_type_id').val();
        if (mval2.toLowerCase() != '') {
            if (tdtype == 'S' && mval.toLowerCase() != 'cash' && mval!='现金') {
                $('.payment_detail_cls').show();
            } else {
                $('.payment_detail_cls').hide();
            }
        }
    });

    //select 2
    $(".select2_multiple").select2({
        maximumSelectionLength: '',
        //placeholder: "Select Category",
        allowClear: true
    });
});

function countChar(val) {
    var len = val.value.length;
    if (len >= 500) {
        val.value = val.value.substring(0, 500);
    } else {
        $('#charNum').text(500 - len);
    }
}