(function($){
	
	
    function searchPosts ( data ) {

		//Find all acf fields
		//jQuery('[name^=acf\\[field_5b87f9b3b4df8\\]]').each(function() {
		//console.log(jQuery(this).attr('name'));

		// jQuery(data).val('test');
		// console.log(jQuery(data).val());

		
		// console.log( jQuery(data.get()).val() + "***" );

			var options = {
				url: function(value) {
					return acf.get('ajaxurl') + '?action=acfSearchPosts&value=' + value;
				},
				getValue: "title",
				requestDelay: 500,
				placeholder: "Search for post",
				list: {
					onSelectItemEvent: function() {
						var index = jQuery(data).getSelectedItemData().id;
						console.log(index);
						//jQuery("#index-holder").val(index).trigger("change");
					}
				}
			};
			
			jQuery(data).easyAutocomplete(options);
		//});
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
		//On a new field creation trigger this call
		acf.add_action('new_field/type=searchposts', searchPosts);
	} 
	


})(jQuery3_3_1);
