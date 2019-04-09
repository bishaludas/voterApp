{{-- Date picker --}}
<script type="text/javascript">
	$(".dob-picker").nepaliDatePicker({
	dateFormat: "%M %d, %y",
	closeOnDateSelect: true
	});


	// callback on date select
	$(".dob-picker").on("dateSelect", function (event) {
	    var date = document.querySelector("#nepaliDate").value;
	    var nep_date = calendarFunctions.parseFormattedBsDate("%M %d, %y", date);
	    var nep_date_final = nep_date.bsYear +'/'+ nep_date.bsMonth +'/'+  nep_date.bsDate;
		var eng_date = calendarFunctions.getAdDateByBsDate(nep_date.bsYear, nep_date.bsMonth, nep_date.bsDate);
		var eng_date_final = eng_date.toDateString();

		var data = "<input type='hidden' class='form-control' name='eng_date' value='"+eng_date_final+"'>"+
					"<input type='hidden' class='form-control' name='nep_date' value='"+nep_date_final+"'>";
		$('.voter-form .convertedDate').html(data);
	});

	// Clear Date field
	 $("#clear-bth").on("click", function(event) {
        $(".dob-picker").val('');
        $('.voter-form .convertedDate').html('');
    });
</script>

<style type="text/css">
	.form-control:disabled, .form-control[readonly]{
		background-color: #fff;
	}
</style>