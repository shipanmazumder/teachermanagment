/*----------------------------
				base url
------------------------------ */
var base_url = $('.base_url').attr('id');
(function ($) {
	"use strict";


	/*----------------------------
		mCustomScrollbar active
	------------------------------ */
	$(".main_menu").mCustomScrollbar({
		axis: "y",
		updateOnContentResize: true,
	});
	/*----------------------------
		loader
		------------------------------ */
	$(window).on('load', function () {
        /*----------------------------
            loader active
        ------------------------------ */
		//$(".loader").fadeOut();
	});

	/*----------------------------
		menu active
	------------------------------ */
	$('.menu_toggle').on('click', function () {
		$('.main_menu_item:nth-child(1) i').addClass('icon_rotate0');
		$('.menu_toggle i').removeClass('icon_rotate');
		$(this).find('i').toggleClass('icon_rotate');
	});

	/*----------------------------
		main_menu active
	------------------------------ */
	$('.res_menu_toggle').on('click', function () {
		$('.main_menu').toggleClass('main_menu_hidden');
		$('.res_menu_toggle').toggleClass('res_menu_toggle_cpos');
		$('.res_menu_toggle .icofont').toggleClass('icofont-navigation-menu icofont-close');
		$('.menu_off_area').toggleClass('menu_off_area_show');
		$('body').toggleClass('oflow-hidden');
	});
	$('.menu_off_area').on('click', function () {
		$('.main_menu').toggleClass('main_menu_hidden');
		$('.res_menu_toggle').toggleClass('res_menu_toggle_cpos');
		$('.res_menu_toggle .icofont').toggleClass('icofont-close icofont-navigation-menu');
		$('.menu_off_area').removeClass('menu_off_area_show');
		$('body').removeClass('oflow-hidden');
	});
	/*----------------------------
			dataTable active
		------------------------------ */
	$('#students_table').DataTable({
		responsive: true
	});
	$("#students_table").parent().addClass('oFlow-x_scroll');
	/*----------------------------
				checkbox required
	----------------------------- */
	   var requiredCheckboxes = $(':checkbox[required]');
	   requiredCheckboxes.change(function ()
	   {
			if (requiredCheckboxes.is(':checked')) 
			{
				requiredCheckboxes.removeAttr('required');
			} 
			else 
			{
				requiredCheckboxes.attr('required', 'required');
			}
	   });
	/*-----------------------
		ajax search student for attendance
	------------------------*/
	$('#batch_id_search').click(function (e) {
			e.preventDefault();
			var url = base_url + "attendance/search-student";
			$.ajax({
				type: "POST",
				url: url,
				data: $('#student_attendance_search_form').serialize(),
				success: function (data) {
					$('#search_data').html(data);
					$('#students_table').DataTable({
						responsive: true
					});
					$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
				}
			});
	});
	/*-----------------------
		ajax search student attendance
	------------------------*/
	$('#attendance__search').click(function (e) {
		e.preventDefault();
		var url = base_url + "attendance/view-student-attendance";
		$.ajax({
			type: "POST",
			url: url,
			data: $('#student_attendance_search').serialize(),
			success: function (data) {
				$('#search_data').html(data);
				$('#students_table').DataTable({
					responsive: true
				});
				$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
			}
		});
	});
	/*-----------------------
		ajax search student for payment
	------------------------*/
	$('#payment_batch_id_search').click(function (e) {
		e.preventDefault();
		var batch_id = $('#pay_batch_id').val();
		var pay_month = $('#pay_month').val();
		var url ="Payment/view_student_for_payment";
		if(batch_id!='' && pay_month!='')
		{
			$.ajax({
				type: "POST",
				url: url,
				data: $('#student_payment_form').serialize(),
				success: function (data) {
					$('#search_data').html(data);
					$('#students_table').DataTable({
						responsive: true
					});
					$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
				}
			});
		}
		else
		{
			$('#search_data_error').fadeIn().addClass('show_search_data_success');
			$('#search_data_error').fadeOut(1000).removeClass('show_search_data_success');
		}
	});

	/*-----------------------
	ajax search student for view payment
	------------------------*/
	$('#payment__search').click(function (e) {
		e.preventDefault();
		var url ="Payment/view_student_payment";
		$.ajax({
			type: "POST",
			url: url,
			data: $('#student_payment_search').serialize(),
			success: function (data) {
				$('#search_data').html(data);
				$('#students_table').DataTable({
					responsive: true
				});
				$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
			}
		});
	});
	/*-----------------------
	ajax search student for view payment
	------------------------*/
	$('#total_payment__search').click(function (e) {
		e.preventDefault();
		var url ="Payment/view_total_student_payment";
		$.ajax({
			type: "POST",
			url: url,
			data: $('#student_total_payment_search').serialize(),
			success: function (data) {
				$('#search_data').html(data);
			}
		});
	});
	
})(jQuery);

/*----------------------------
	datePicker active
------------------------------ */
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10) {
	dd = '0' + dd
}
if (mm < 10) {
	mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("max", today);

/**
 * checkbox vaild
 */
var requiredCheckboxes = $('.batch_day');

requiredCheckboxes.change(function () {

	if (requiredCheckboxes.is(':checked')) {
		requiredCheckboxes.removeAttr('required');
	}

	else {
		requiredCheckboxes.attr('required', 'required');
	}
});

/*-----------------------
	ajax attendance update
------------------------*/
function update_data() {
	$('.save_attendance').fadeOut();
	var url = base_url + "attendance/update-attendance-data";
	$.ajax({
		type: "POST",
		url: url,
		data: $('#students_attendance_add').serializeArray(),
		success: function (data) {
			//$('#search_data_success').fadeIn();
			$('#search_data_success').fadeIn().addClass('show_search_data_success');
			$('#search_data_success').delay(1200).fadeOut().removeClass('show_search_data_success');
		}
	});
}
/*-----------------------
ajax delete student payment
------------------------*/
function delete_payment(payment_id, batch_id, pay_month) {
	var payment_id = payment_id;
	var url ="Payment/delete_payment_data";
	if (confirm("Are you sure to delete this?"))
	{
		$.ajax({
			type: "POST",
			url: url,
			data: { 'payment_id': payment_id },
			success: function (data) {
				$('#search_data_success').fadeIn().addClass('show_search_data_success');
				search_payment(batch_id, pay_month)
				$('#search_data_success').delay(1200).fadeOut().removeClass('show_search_data_success');
			}
		});
	}
}
function search_payment(batch_id, pay_month) {
	var url = "Payment/view_student_payment";
	$.ajax({
		type: "POST",
		url: url,
		data: {
			'payment_batch_id': batch_id,
			'pay_month': pay_month
		},
		success: function (data) {
			$('#search_data').html(data);
			$('#students_table').DataTable({
				responsive: true
			});
			$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
		}
	});
}

function save_payment() {
	$('.save_payment').fadeOut();
	var url = base_url + "payment/add-payment-data";
	var batch_id = $('#batch').val();
	var pay_month = $('#pay_month').val();
	$.ajax({
		type: "POST",
		url: url,
		data: $('#students_payment_add').serializeArray(),
		success: function (data) {
			//$('#search_data_success').fadeIn();
			refresh_payment(batch_id,pay_month);
			$('#search_data_success').fadeIn().addClass('show_search_data_success');
			$('#search_data_success').delay(1200).fadeOut().removeClass('show_search_data_success');
		}
	});
}
function refresh_payment(batch_id,pay_month) {
	var url ="Payment/view_student_for_payment";
	$.ajax({
		type: "POST",
		url: url,
		data: {'pay_batch_id':batch_id,'pay_month':pay_month,},
		success: function (data) {
			$('#search_data').html(data);
			$('#students_table').DataTable({
				responsive: true
			});
			$("#students_table").parent().addClass('oFlow-x_scroll reg_std_table');
		}
	});
}