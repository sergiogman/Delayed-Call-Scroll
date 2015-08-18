jQuery(function($){
	'use strict';

	// -------------------------------------------------------------
	//   Basic Navigation
	// -------------------------------------------------------------
	(function () {

		var options = {
			horizontal: 1,
			itemNav: 'basic',
			smart: 1,
			activateOn: 'click',
			mouseDragging: 1,
			touchDragging: 1,
			releaseSwing: 1,
			startAt: 3,
			scrollBar: '#scrollbar',
			scrollBy: 1,
			activatePageOn: 'click',
			speed: 300,
			elasticBounds: 1,
			easing: 'easeOutExpo',
			dragHandle: 1,
			dynamicHandle: 1,
			clickBar: 1
		};

        var frame = new Sly('#basic', options);
        var $items = $('#items');

/*
		// To Start button
		$wrap.find('.toStart').on('click', function () {
			var item = $(this).data('item');
			// Animate a particular item to the start of the frame.
			// If no item is provided, the whole content will be animated.
			$frame.sly('toStart', item);
		});

		// To Center button
		$wrap.find('.toCenter').on('click', function () {
			var item = $(this).data('item');
			// Animate a particular item to the center of the frame.
			// If no item is provided, the whole content will be animated.
			$frame.sly('toCenter', item);
		});

		// To End button
		$wrap.find('.toEnd').on('click', function () {
			var item = $(this).data('item');
			// Animate a particular item to the end of the frame.
			// If no item is provided, the whole content will be animated.
			$frame.sly('toEnd', item);
		});

		// Add item
		$wrap.find('.add').on('click', function () {
			$frame.sly('add', '<li>' + $slidee.children().length + '</li>');
		});

		// Remove item
		$wrap.find('.remove').on('click', function () {
			$frame.sly('remove', -1);
		});
*/        
        
        function last_msg_funtion(){
            var ID = $(".message_box:last").attr("value");
            $('div#last_msg_loader').html('<img src="{base_url}images/bigLoader.gif">');
    
            $.ajax({
        		url: base_url+'more',
                type: 'POST',
                data: 'last_msg_id='+ID,
                success: function(data){
                    if (data != ""){
                        return $items.append(data);
                        //$(".message_box:last").after(data);
                    }
                    $('div#last_msg_loader').empty();
                }
        	});
        };  
        
        // Add more items when close to the end
    	frame.on('load change', function () {
    		if (this.pos.dest > this.pos.end - 200) {
    			last_msg_funtion();
    			this.reload();
    		}
    	});
        
        // Initiate Sly
    	frame.init();
    
    	// Reload on resize
    	$(window).on('resize', function () {
    		frame.reload();
    	});
        
        

	}());
});