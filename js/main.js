/*price range*/
var s = $('#sl2').slider();
	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	


var current_cat = 0;
var count = 12;
/*scroll to top*/
function send_sort() {
	$.ajax({
		type: 'post',
		url: '/ajax.php',
		data: "do=sort&range="+ s.data('slider').getValue().toString()+"&cat_id="+current_cat.toString()+"&count="+count
	}).done(function(data) {
		$('#product_items').html(data);
	}).fail(function() {
		console.log('fail');
	});
}

function update_cart_item(id, value) {

}

function delete_cart_item(id) {
	$.ajax({
		type: 'post',
		url: '/ajax.php',
		data: "do=cart&type=del&id="+id
	}).done(function(data) {
		$('#cart_products').html(data);
	}).fail(function() {
		console.log('fail');
	});
}


$(document).ready(function(){

	
	$('.panel-title a').click(function (e) {
		current_cat = $(this).attr('id');
		count = 12;
		send_sort();
	});

	$('.cart_quantity_up').click(function (e) {
		var id = $(this).parent().parent().parent().attr('id');
		var value = $(this).next().val();
		value++;
		update_cart_item(id,value);
	});

	$('.cart_quantity_down').click(function (e) {
		var id = $(this).parent().parent().parent().attr('id');
		var value = $(this).next().val();
		value--;
		update_cart_item(id,value);
	});

	$('.cart_quantity_delete').click(function (e) {
		var id = $(this).parent().parent().parent().attr('id');
	});

	$('.cart_quantity_input').focusout(function (e) {
		var id = $(this).parent().parent().parent().attr('id');
		var value = $(this).val();
		update_cart_item(id,value);
	});

	$('#more-items').click(function (e) {
		count += 12;
		send_sort();
	});


	$('#sl2').on('slideStop',function () {
		send_sort();
		count = 12;
	});



	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	$(function() {
		$('#login-send').submit(function(e) {
			e.preventDefault();
			var $form = $(this);
			$.ajax({
				type: 'post',
				url: '/ajax.php',
				data: $form.serialize()
			}).done(function(data) {
				if(data=="1") {
					window.location = "/";
				}
				else {
					alert("Ошибка авторизации");
					console.log(data);
				}
			}).fail(function() {
				console.log('fail');
			});
		});

		$('#signup-send').submit(function(e) {
			e.preventDefault();
			var $form = $(this);
			$.ajax({
				type: 'post',
				url: '/ajax.php',
				data: $form.serialize()
			}).done(function(data) {
				if(data=="1") {
					alert("Вы успешно зарегестрировались!");
					window.location = "/pages/login.html";
				}
				else {
					alert(data);
				}
			}).fail(function() {
				console.log('fail');
			});
		});
	});
});
