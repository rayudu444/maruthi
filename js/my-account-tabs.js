jQuery(function(){
        jQuery('.detailsDiv').click(function(){
		jQuery('.targetDiv1').hide();
		jQuery('#div'+$(this).attr('target')).show();
		jQuery('.detailsDiv').removeClass('details-div-ul-li-active');
		jQuery('.detailsDiv'+$(this).attr('target')).toggleClass('details-div-ul-li-active');
	});

        jQuery('.ridesDiv').click(function(){
		jQuery('.targetRides').hide();
		jQuery('#div'+$(this).attr('target')).show();
		jQuery('.ridesDiv').removeClass('rides-div-ul-li-active');
		jQuery('.ridesDiv'+$(this).attr('target')).toggleClass('rides-div-ul-li-active');
	});

});
