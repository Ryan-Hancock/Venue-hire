// JavaScript Document
$('input#type-submit').on('click', function() {
	var type = $('input#type').val();
	if ($.trim(type) != '') {
		$.post('venue.php', {type: type}, function(data) {
			$("#type-data").html(data);
		});
	}
});

function functionOne(rowid) {  
	 var review;
	 var xmlhttp=new XMLHttpRequest();
    do {
        review=prompt("Please enter your review");
    }
    while(review.length < 4);
    xmlhttp.open("GET","ajaxreview.php?rev="+review+"&venID="+rowid,false);
	xmlhttp.send(null);
}


//$(document).ready(function(){
	//var venueID = 9;
	//$("td.numberday").each(function() {
		//var day = $(this).text();
		//$.post('availability.php',{venueID: venueID, day: day}, function(data) {
		//$(this).html(data);
		//});
		//}
		//while(day.text < 1);
		//	alert(data);
		//alert("hello");
		
		
	
		
	//var days =[]
	//days.push($(this).html());
	//var id = $(this).attr('id');
	//alert(id);
	
		//if (data == 1){
		//	$(this).append("bgcolor='#FF0000'");
		//}
	//});
	
	
	//if ($(this).text() < 6){
	//$(this).after("<p>test</p>");
	//}
	
	//$.each(days, function() {
		//days.append("<p>test</p>");
	
	//});	
	//});
	//for (i=0, j = days; i< j; ++i){
	//	$(this).after("<p>test</p>");
	//}
	//if $(this)  ("6"){
	//$(this).after("<p>test</p>");}
//});	
//i
//f (days < 10) {
	//		alert(days);
	//		$(days).after("<p>test</p>");
	//	}
