$(".calendar-day").click(function() {
	var day = $(this).attr("data-dayofmonth");
	$(".schedule-panel").hide();
	$(".schedule-panel." + day).show();
});