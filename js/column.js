$(function () {
	var tdcount = $(".sample2 tr td").length;
	if(tdcount == 2){
		var columnwidth = $(".sample2").width() - 60;
		var newwidth = columnwidth/tdcount;
		$(".sortcolumn").css("max-width",newwidth);
		$(".sortcolumn").css("width",newwidth);
		$(".tablewidthmax").css("max-width",newwidth);
		$(".tablewidthmax").css("width",newwidth);
	}	
	if(tdcount == 3){
		var columnwidth = $(".sample2").width() - 90;
		var newwidth = columnwidth/tdcount;
		$(".sortcolumn").css("max-width",newwidth);
		$(".sortcolumn").css("width",newwidth);
		$(".tablewidthmax").css("max-width",newwidth);
		$(".tablewidthmax").css("width",newwidth);
	}	
	if(tdcount == 4){
		var columnwidth = $(".sample2").width() - 120;
		var newwidth = columnwidth/tdcount;
		$(".sortcolumn").css("max-width",newwidth);
		$(".sortcolumn").css("width",newwidth);
		$(".tablewidthmax").css("max-width",newwidth);
		$(".tablewidthmax").css("width",newwidth);
	}	
	if(tdcount == 5){
		var columnwidth = $(".sample2").width() - 150;
		var newwidth = columnwidth/tdcount;
		$(".sortcolumn").css("max-width",newwidth);
		$(".sortcolumn").css("width",newwidth);
		$(".tablewidthmax").css("max-width",newwidth);
		$(".tablewidthmax").css("width",newwidth);
	}
});