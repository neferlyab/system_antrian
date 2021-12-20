$(function(){
    setInterval(function(){ $('.ajax_refresh_and_loading').closest('.flexigrid').find('.filtering_form').trigger('submit');},5000);
    //$('table#flex1 tbody tr').addClass("tes");
    /*$('table#flex1 tbody tr').each(function() {
    var customerId = $(this).find("td").eq(5).text(); 
    customerId = customerId.toString().replace(/\s/g, '');
    if(customerId=='Selesai'){
    	$(this).addClass("tes");
    }
    if(customerId=='x'){
    	$(this).css("background-color","blue");
    } 
	});*/
});