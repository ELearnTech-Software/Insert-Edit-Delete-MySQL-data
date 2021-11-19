var i = $('table#invoiceTable tr').length;
$(".addmore").on('click', function() {
    addNewRow();
});
$(document).on('keypress', ".addNewRow", function(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    if (keyCode == 9) addNewRow();
});
var addNewRow = function(id) {
    html = '<tr>';
    html += '<td><input class="case" type="checkbox"/></td>';

    html += '<td><input type="text" autofocus data-type="prodcode" name="data[' + i + '][product_id]" id="itemNo_' + i + '" class="form-control autocomplete_code trn_code" autocomplete="off"></td>';

    html += '<td><input type="text" autofocus data-type="productName" name="data[' + i + '][product_name]" id="itemName_' + i + '" class="form-control autocomplete_txt itemName" autocomplete="off"></td>';

    html += '<td><input type="text" data-type="naration" name="data[' + i + '][naration]" id="unit_' + i + '" class="form-control naration" autocomplete="off"></td>';

    html += '<td><input type="float"  style="text-align:right;" name="data[' + i + '][total]" id="total_' + i + '" class="form-control total amount_entered" value="0.00" autocomplete="off" onKeyPress="return IsNumeric(event);" onChange="changesNo();" ondrop="return false;"  onpaste="return false;"></td>';
    html += '</tr>';
    if (typeof id !== "undefined") {
        $('#tr_' + id).after(html);
    } else {
        $('table#invoiceTable').append(html);
    }
    console.log(id);

    $('#itemNo_' + i).focus();

    i++;
}
//to check all checkboxes
$(document).on('change', '#check_all', function() {
    $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$("#delete").on('click', function() {
    $('.case:checkbox:checked').parents("tr").remove();
    $('#check_all').prop("checked", false);
    calculateTotal();
});

//autocomplete script
$(document).on('change keyup blur', '.changesNo', function() {

    id_arr = $(this).attr('id');
    id = id_arr.split("_");
    quantity = $('#total_' + id[1]).val();


    if (quantity != '') $('#total_' + id[1]).val((parseFloat(price.replace(/,/g, ''))).toFixed(2));
    //calculateTotal();
});


$(document).on('change keyup blur', '#tax', function() {
    calculateTotal();
});

//total price calculation 
function calculateTotal() {

    $('.totalLinePrice').each(function() {
        if ($(this).val() != '') subTotal += parseFloat($(this).val().replace(/,/g, ''));

    });
    calculateAmountDue();
}

$(document).on('change keyup blur', '#amountPaid', function() {
    calculateAmountDue();
});

//due amount calculation
function calculateAmountDue() {

}



//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8, 46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log(keyCode);
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function() {
    $('#invoiceDate').datepicker({});
});


$(document).ready(function() {
    if (typeof errorFlag !== 'undefined') {
        $('.message_div').delay(5000).slideUp();
    }
});