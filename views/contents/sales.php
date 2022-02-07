

	<h2 class = "text-primary">Ventas</h2>

	<hr>

	<div class = "row">

		<div class = "col-md-3">

			<div class = "form-group">

				<input type = "text" class = "form-control" id = "idBill" placeholder = "Factura">

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<input type = "date" class = "form-control" id = "billDate" placeholder = "Fecha">

			</div>

		</div>

	</div>

	<div class = "row">

		<div class = "col-md-3">

			<div class = "form-group">

 				<input type = "text" class = "form-control" id = "idUser" placeholder = "N° de Documento">

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<input type = "text" class = "form-control" id = "names" placeholder = "Nombres">

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<input type = "text" class = "form-control" id = "address" placeholder = "Dirección">

			</div>

		</div>

	</div>

	<h2 class = "text-primary">Productos</h2>

	<hr>

	<div class = "row">
		
		<?php

			$products = ProductController::ConsultProductController("", "");

			foreach($products as $key => $value)
			{

				echo "<div class = 'col-md-4'>" .

					"<div class = 'row'>

						<div class = 'col-md-12'>" .

							"<h4>" . $value["product"] . "</h4>

						</div>

						<div class = 'col-md-12'>

							<h5><strong>Precio:</strong> $ " . $value["price"] . "</h5>

						</div>

						<div class = 'col-md-8'>

							<div class = 'input-group'>

								<input type = 'number' class = 'form-control' id = 'quantity".$key."' value = '1'>

								<div class = 'input-group-btn'>

									<a href = '' class = 'btn btn-primary buttonAdd' id = 'buttonAdd".$key."' idProduct = '" . $value["id"] . "' product = '" . $value["product"] . "' price = '" . $value["price"] . "'>

										<i class = 'glyphicon glyphicon-plus'></i>

									</a>

								</div>

							</div>

						</div>

					</div>

				</div>";

			}

		?>

	</div>

	<div class = "products">

		

	</div>

	<div class = "space-2"></div>

	<div class = "row">

		<div class = "col-md-3">

			<div class = "form-group">

				<label for = "subtotal">Subtotal:</label>

				<span id = "subtotal"></span>

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<label for = "tax">Iva:</label>

				<span id = "tax"></span>

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<label for = "discount">Descuento:</label>

				<span id = "discount"></span>

			</div>

		</div>

		<div class = "col-md-3">

			<div class = "form-group">

				<label for = "total"><strong>Total:</strong></label>

				<span id = "total"></span>

			</div>

		</div>

		<button type = "submit" class = "btn btn-primary pull-right mt-3 mb-3" id = "buttonRegisterBill">Registrar</button>

	</div>

