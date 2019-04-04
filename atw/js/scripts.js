(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		jQuery('header nav ul').slicknav();
		
		jQuery('.wp-block-gallery .blocks-gallery-item a').fancybox({
			openEffect : 'fade'
		});

		jQuery('ul.slider').bxSlider({
			'pager': false,
			'auto': true
		});
	});
	
})(jQuery, this);
