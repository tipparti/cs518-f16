$(document).ready(function(){
	//References
	var pages = $("#menu li");
	var loading = $("#loading");
	var content = $("#content");
	
	//show loading bar
	function showLoading(){
		loading
			.css({visibility:"visible"})
			.css({opacity:"1"})
			.css({display:"block"})
		;
	}
	//hide loading bar
	function hideLoading(){
		loading.fadeOut('normal');
	};
	
	function showNewContent() {
        content.fadeIn('normal',hideLoading);
		//content.animate({width:'toggle'});
    }  
	//Manage click events
	pages.click(function(){
		var pageNum = this.id;
		var targetUrl = "content_tr.php?page=" + pageNum + "&" + $("#myForm").serialize();
		console.log(targetUrl);
		$.post(targetUrl, function(data){
			console.log("Success");
			$("#contentBody").append(data);
			$("#qry_results").trigger("update");
		});
	});
	
	//default - 1st page
	/*
	$("#1").css({'color' : 'yellow'});
	var targetUrl = "content.php?page=1&" + $("#myForm").serialize() + " #content";
	showLoading();
	content.load(targetUrl, hideLoading);
	*/
});