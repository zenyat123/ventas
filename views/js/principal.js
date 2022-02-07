

var principal = $('#principal').val();

var buttonAdd = $('.buttonAdd');

$(window).on('load', function(){

	var idBill = $('#idBill').val();

	if(idBill == ''){

		if(localStorage.getItem('form') != null){

			var inputs = JSON.parse(localStorage.getItem('form'));

			$('#idBill').val(inputs[0]['idBill']);
			$('#billDate').val(inputs[0]['billDate']);
			$('#idUser').val(inputs[0]['idUser']);
			$('#names').val(inputs[0]['names']);
			$('#address').val(inputs[0]['address']);

		}

	}

});

$(buttonAdd).click(function(){

	var idBill = $('#idBill').val();
	var billDate = $('#billDate').val();
	var idUser = $('#idUser').val();
	var names = $('#names').val();
	var address = $('#address').val();

	if(idBill != ''){

		var form = [];

		form.push({

			'idBill': idBill,
			'billDate': billDate,
			'idUser': idUser,
			'names': names,
			'address': address

		});

		localStorage.setItem('form', JSON.stringify(form));

	}

});

for(i = 0; i < buttonAdd.length; i++){

	$('#buttonAdd'+i).click(function(){

		var idProduct = $(this).attr('idProduct');
		var index = $(this).attr('id').substr(9);
		var product = $(this).attr('product');
		var price = $(this).attr('price');
		var quantity = $('#quantity'+index).val();
		var discount = 0;

		if(quantity > 5){

			discount = 5;

		}

		if(localStorage.getItem('products') == null){

			var products = [];

		}else{

			var products = JSON.parse(localStorage.getItem('products'));

			for(i = 0; i < products.length; i++){

				if(products[i]['idProduct'] == idProduct){

					return;

				}

			}

		}

		products.push({

			'idProduct': idProduct,
			'product': product,
			'price': price,
			'quantity': quantity,
			'discount': discount

		});

		localStorage.setItem('products', JSON.stringify(products));

	});

}

if(localStorage.getItem('products') != null){

	var shoppingCart = JSON.parse(localStorage.getItem('products'));

	shoppingCart.forEach(each);

	function each(item){

		$('.products').append('<div class = "row mt-2">' +

			'<span class = "idProduct" idProduct = "' + item.idProduct + '"></span>' +

			'<strong>Producto:</strong> ' + item.product + ' ' +

			'<strong>Precio:</strong> $ <span class = "price">' + item.price + '</span> ' +

			'<strong>Cantidad:</strong> <span class = "quantity">' + item.quantity + '</span> ' +

			'<strong>Descuento:</strong> <span class = "discount">' + item.discount + '</span>% ' +

			'<strong>Subtotal:</strong> $ <span class = "subtotal">' + (item.price * item.quantity - ((item.price * item.quantity) * item.discount / 100)) + '</span>' +

		'</div>');

	}

}

var subtotal = $('.subtotal');

var arraySumSubTotals = [];

for(i = 0; i < subtotal.length; i++){

	var subtotals = $(subtotal[i]).html();

	arraySumSubTotals.push(parseInt(subtotals));

}

function SumSubTotals(total, number){

	return total + number;

}

var sumTotal = arraySumSubTotals.reduce(SumSubTotals, 0);

var tax = (sumTotal * 19) / 100;

if(sumTotal > 500000){

	discount = (sumTotal * 10) / 100;

}else{

	var discount = 0;

}

var total = (sumTotal - discount) + tax;

$('#subtotal').html('$ ' + sumTotal);

$('#tax').html('$ ' + tax);

$('#discount').html('$ ' + discount);

$('#total').html('$ ' + total);

$('#buttonRegisterBill').click(function(){

	var idBill = $('#idBill').val();
	var billDate = $('#billDate').val();
	var idUser = $('#idUser').val();
	var names = $('#names').val();
	var address = $('#address').val();

	var registers = $('.products .row');
	var idProduct = $('.products .idProduct');
	var price = $('.products .price');
	var quantity = $('.products .quantity');
	var discountProduct = $('.products .discount');
	var subtotal = $('.products .subtotal');

	var idProductsArray = [];
	var pricesArray = [];
	var quantitiesArray = [];
	var discountProductsArray = [];
	var subtotalsArray = [];

	for(i = 0; i < registers.length; i++){

		idProductsArray[i] = $(idProduct[i]).attr('idProduct');
		pricesArray[i] = $(price[i]).html();
		quantitiesArray[i] = $(quantity[i]).html();
		discountProductsArray[i] = $(discountProduct[i]).html();
		subtotalsArray[i] = $(subtotal[i]).html();

	}

	var data = new FormData();

	data.append('idBill', idBill);
	data.append('billDate', billDate);
	data.append('idUser', idUser);
	data.append('names', names);
	data.append('address', address);
	data.append('subtotal', sumTotal);
	data.append('tax', tax);
	data.append('discount', discount);
	data.append('total', total);

	data.append('products', idProductsArray);
	data.append('prices', pricesArray);
	data.append('quantities', quantitiesArray);
	data.append('discountProducts', discountProductsArray);
	data.append('subtotals', subtotalsArray);

	$.ajax({

		url: principal + '/ajax/sales_ajax.php',
		method: 'post',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(){

			localStorage.removeItem('products');
			localStorage.removeItem('form');

			window.location = 'bills';

		}

	});

});

$('.buttonConsultBill').click(function(){

	var idBill = $(this).attr('idBill');

	var data = new FormData();

	data.append('idBill', idBill);

	$.ajax({

		url: principal + '/ajax/bills_ajax.php',
		method: 'post',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(response){

			response.forEach(responses);

			function responses(item){

				$('#modalBill .modal-body table tbody').append('<tr>' +

					'<td>' + item['product'] + '</td>' +
					'<td> $ ' + item['price'] + '</td>' +
					'<td>' + item['quantity'] + '</td>' +
					'<td>' + item['discount'] + '%</td>' +
					'<td> $ ' + item['subtotal'] + '</td>' +

				'</tr>');
				
			}

		}

	});

});

$('.buttonUpdatingProduct').click(function(){

	var idProduct = $(this).attr('idProduct');

	var data = new FormData();

	data.append('idProduct', idProduct);

	$.ajax({

		url: principal + '/ajax/bills_ajax.php',
		method: 'post',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(response){

			$('#modalUpdateProduct #updateProduct').val(response['product']);
			$('#modalUpdateProduct #updatePrice').val(response['price']);

			$('#buttonUpdateProduct').click(function(){

				var idProduct = response['id'];
				var product = $('#modalUpdateProduct #updateProduct').val();
				var price = $('#modalUpdateProduct #updatePrice').val();

				var data = new FormData();

				data.append('idProductUpdate', idProduct);
				data.append('product', product);
				data.append('price', price);

				$.ajax({

					url: principal + '/ajax/bills_ajax.php',
					method: 'post',
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					success: function(response){

						if(response == 'Actualizado'){

							window.location = 'products';

						}
						
					}

				});

			});

		}

	});

});

$('.buttonDeletingProduct').click(function(){

	var idProduct = $(this).attr('idProduct');
	var product = $(this).attr('product');

	$('#modalDeleteProduct .modal-body').append('¿confirma la eliminación del producto ' + product + '?');

	$('#buttonDeleteProduct').click(function(){

		var data = new FormData();

		data.append('idProductDelete', idProduct);

		$.ajax({

			url: principal + '/ajax/bills_ajax.php',
			method: 'post',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response){

				if(response == 'eliminado'){

					window.location = 'products';

				}

			}

		});

	});

});

$('#modalBill, #modalDeleteProduct').on('hide.bs.modal', function(){

	$('#modalBill .modal-body table tbody, #modalDeleteProduct .modal-body').empty();

});

