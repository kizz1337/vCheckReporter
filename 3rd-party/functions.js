var isHistoryAvailable = true;
if (typeof history.pushState === 'undefined') {
	var isHistoryAvailable = false;
}

$(document).ready(function(){
	init();
	LoadReport();

	// Changement de date = refech links
	$("#datepickerfild").change(function(){
		$(location).attr('href',"./?date="+$("#datepickerfild").val()+"");
	});

});


function init() {
	ActivateMenuLinks();
	InitialysemCustomScrollbar();
	InitialyseDatePicker();
}

function InitialyseDatePicker() {
	$('#search-btn').unbind();
	$('#search-btn').click(function(event){
		$("#datepickerfild").datepicker("show");
	});

	$("#datepickerfild").datepicker({
		firstDay: 1,
		minDate: new Date(2015, 2, 9),
		maxDate: "+0d",
		hideIfNoPrevNext: false,
		dateFormat: "dd-mm-yy",
	});
}

function InitialysemCustomScrollbar() {
	$("#report").mCustomScrollbar({
		axis:"y",
		theme:"minimal-dark",
	});	
}

// reports
function ActivateMenuLinks(){
	$('.AjaxLink').unbind();
	$('.AjaxLink').click(function(event){
	$( "*" ).removeClass("active");
	$(this).parent().addClass("active");
	AjaxUrl = '?date='+$("#datepickerfild").val()+'&vCenter='+$(this).attr('data-vcenter');
	if(isHistoryAvailable == true){
			event.preventDefault();
			LoadUrl('#main',AjaxUrl);
		}
	});
}

function LoadUrl(name,url){
	urlsplit = url.split('&');
	urlsplit2 = urlsplit[1].split('=');
	$(name).fadeOut(500, function(){
		ReportUrl = $("#"+urlsplit2[1]+" a").attr('href');
		$(name).load(ReportUrl,function(data){
			update_url(name,'./'+url);
			$(name).fadeIn(500,init);
		});
	});
}

function LoadReport(){
	// Si le vCenter est defini dans l'url on charge le rapport
	if (getUrlVars().vCenter) {
		$( "*" ).removeClass("active");
		$("#"+getUrlVars().vCenter+"").addClass("active");
		ReportUrl = $("#"+getUrlVars().vCenter+" a").attr('href');
		$('#main').load(ReportUrl,function(data){
			$(name).fadeIn(500,init);
		});
	}
}

function update_url(name,url){
	if(typeof history.pushState == 'function') {
		var stateObj = {};
		history.pushState(stateObj, "vCheck - " + name, url);
	}
}

history.replaceState(true, null, window.location.href);

$(window).bind('popstate', function(event) {
  if (event.originalEvent.state) {
	LoadReport();
  }
});

function getUrlVars(){
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++) {
		hash = hashes[i].split('=');
		vars[hash[0]] = hash[1];
	}
	return vars;
}