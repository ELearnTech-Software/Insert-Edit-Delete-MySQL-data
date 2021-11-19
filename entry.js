var i=$('table#invoiceTable tr').length;
$(".addmore").on('click',function(){
	addNewRow();
});

$(document).on('keypress',".addNewRow",function(e){
	var keyCode=e.which ? e.which : e.keyCode;
	if (keyCode==9) addNewRow();
});

var addNewRow=function(id){
	html ='<tr>';
	html +='<td><input class="case" type="checkbox"/></td>';

	html +='<td><input type="text" autofocus data-type="code" name="data[' + i +'][code_id]" id="codeno_' +i +'" class="form-control autocomplete" autocomplete="off"></td>';

	html +='<td style="font-size:11px;"><input type="text" autofocus data-type="pname" name="data[' +i +'][pname]" id="pname_'+i+'" class="form-control autocomplete" autocomplete="off"></td>';

	html +='<td style="font-size:11px;"><input type="text" autofocus data-type="remark" name="data[' +i +'][remark]" id="remark_'+i+'" class="form-control autocomplete" autocomplete="off"></td>';

	html +='<td><input type="float" style="text-align:right;" autofocus data-type="total" name="data['+i+'][total]" id="total_'+i +'" class="form-control total amount_entered" value="0.00" ondrop="return false;" onpase="return false" autocomplete="off"></td>';

	html +='</tr>';
	if (typeof id!=="undefined")
	{
		$('#tr_'+id).after(html);
	}else{
		$('table#invoiceTable').append(html);
	}
	$('#codeno_'+i).focus;
	i++;
}

$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop('checked',$(this).is(':checked'));
	});


$("#delete").on('click',function(){
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked",false);
});
