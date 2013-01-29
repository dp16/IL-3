
	jQuery(document).ready(function($) {

		if($('.dp_carousel').length){
			$carouselItems = $('.dp_carousel li');
			$currentItem = $('.dp_carousel li.current');
			$('.dp-carousel-count-total').html(' / ' + $carouselItems.length);
			$('.dp-carousel-count-current').html($carouselItems.index($currentItem) + 1);
		}

		$(document).on('dp-sliding', function(){
			$('.dp-carousel-count-current').html($carouselItems.index($('.dp_carousel li.current')) + 1);
		});

	});

