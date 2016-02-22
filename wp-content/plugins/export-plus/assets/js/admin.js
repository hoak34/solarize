jQuery(document).ready(function($){
	$('#page-filters select').prepend('<option value="*">All</option>');
	console.log($('#page-filters select'));
	var form = $('#export-filters');
	form.find('input:checkbox').change(function() {
		if( 'all' != $(this).val() ) {
			var checked = $(this).attr('checked');
			if('checked' != checked) {
				$('.selectall').removeAttr('checked');
			}
			switch ( $(this).val() ) {
				case 'post':
					if('checked' != checked) {
						$('#post-filters').slideUp( 'fast' );
					} else {
						$('#post-filters').slideDown( 'fast' );
					}
				break;
				case 'page':
					if('checked' != checked) {
						$('#page-filters').slideUp( 'fast' );
					} else {
						$('#page-filters').slideDown( 'fast' );
					}
				break;
			}
		}
	});
		$('.selectall' ).click(function() {
			var checked = this.checked;
	    form.find('input:checkbox').each(function() {
	    	$(this).attr('checked',checked);
			$(this).change();
 		});
	});
});