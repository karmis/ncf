$(function() {




	
	
	//===== Left navigation styling =====//
	
	$('.subNav li a.this').parent('li').addClass('activeli');



	


	
	
	//===== User nav dropdown =====//		
	
	$('a.leftUserDrop').click(function () {
		$('.leftUser').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("leftUserDrop"))
		$(".leftUser").slideUp(200);
	});
	
	




	



	

	
	//===== Notification boxes =====//
	
	$(".nNote").click(function() {
		$(this).fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(200, function() { //slide up
				$(this).remove(); //then remove from the DOM
			});
		});
	});	
	

	
	
	



	
	

	




	
	
	//===== Top panel search field =====//
	
	$('.userNav a.search').click(function () {
		$('.topSearch').fadeToggle(150);
	});
	
	
	//===== 2 responsive buttons (320px - 480px) =====//
	
	$('.iTop').click(function () {
		$('#sidebar').slideToggle(100);
	});
	
	$('.iButton').click(function () {
		$('.altMenu').slideToggle(100);
	});

	
	//===== Animated dropdown for the right links group on breadcrumbs line =====//
	
	$('.breadLinks ul li').click(function () {
		$(this).children("ul").slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("has"))
		$('.breadLinks ul li').children("ul").slideUp(150);
	});
	
	
	//===== Easy tabs =====//
	
	$('#tab-container').easytabs({
		animationSpeed: 300,
		collapsible: false,
		tabActiveClass: "clicked"
	});
		
	
	//===== Tabs =====//
		
	$.fn.contentTabs = function(){ 
	
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("activeTab").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	
		$("ul.tabs li").click(function() {
			$(this).parent().parent().find("ul.tabs li").removeClass("activeTab"); //Remove any "active" class
			$(this).addClass("activeTab"); //Add "active" class to selected tab
			$(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).show(); //Fade in the active content
			return false;
		});
	
	};
	$("div[class^='widget']").contentTabs(); //Run function on any div with class name of "Content Tabs"


	


});

	
