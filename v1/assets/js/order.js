var returnUrl = document.querySelector('#personalDetails').dataset.returnUrl;
var currency = document.querySelector('#personalDetails').dataset.currency;

function confirmGuestOrder(event) {
	event.preventDefault();
	var valid = formValidate();
	if (valid) {
		var itemsArray = [];
		var shippingPrice = $('.transfer').text();
		shippingPrice = shippingPrice.replace('$', '');
		var totalAmt = $('#totalOrderSummary').val();
		totalAmt = totalAmt.replace('$', '');
		$('#itemList li').each(function (index) {
			var imagePath = $(this).find('.order-list-img img').attr('src');
			var title = $(this).find('.order-list-details h4').html();
			var quantity = $(this).find('input[name=qty]').val();
			var size = $(this).find('input[name=order_size]').val().split(' ')[0];
			var itemTotalPrice = $(this).find('.order-list-price').text();
			itemTotalPrice = (itemTotalPrice.match(/[0-9.]+/g)) * 1;
			var itemPrice = itemTotalPrice / quantity;
			var arr = title.split('<br>');
			var productName = arr[0];
			itemsArray.push({
				'name': productName,
				'unit_price': itemPrice,
				'quantity': quantity,
				'size': size
			});
		});
		$('#submitOrder').html('Processing...').css('text-align', 'left');
		$('.spinner-icon').show();
		$.ajax({
			contentType: 'application/json',
			url: 'endpoint/ajax/create-order.php',
			type: 'POST',
			data: JSON.stringify({
				items: [itemsArray],
				name: document.getElementById('userNameCashPayment').value,
				message: document.getElementById('messageCashPayment').value,
				tableNum: document.getElementById('tableNum').value,
			}),
			success: function (data) {
				var parsed_data = JSON.parse(data);
				if (parsed_data.status == 'ok') {
					console.log(parsed_data.orders);
					window.location = `thank-you.php?order-table=${parsed_data.tableNum}&name=${parsed_data.username}`;
				} else {
					$('#submitOrder').html('Submit');
					$('.spinner-icon').hide();
					$('#errorMsg').show();
					setTimeout(function() {
						$('#errorMsg').hide();
					}, 3000);
				}

			}

		});
	}

}

function formValidate() {
	
	var name = $('#userNameCashPayment').parsley();
	var message = $('#messageCashPayment').parsley();

	if (!name.isValid() || !message.isValid()) {
		return false;
	}
	return true;

}
