
$(document).ready(function(){
		
	$("#mainNav").clone().prependTo($("body")).attr("id","mobileNav").addClass("visible-xs-block visible-sm-block").removeClass("hidden-xs hidden-sm");
	
	$("#icoMobileNav").click(function(){
		$(".ccm-page, #mobileNav").toggleClass("slideOver");	
	});	
    
    //if the search block is present in the header, then add the search icon
    if($("#searchShell").has(".ccm-search-block-form")){
        $("#siteHeader nav>ul").append("<i class='fa fa-search btnSearchIcon hidden-xs'></i>");
    }
    
    $(".btnSearchIcon").click(function(){
        $(".ccm-page").toggleClass("slideDown");    
    });
			 
	
	
	
	
});//doc.ready