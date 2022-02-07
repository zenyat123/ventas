

	<h2 class = "text-primary">Facturas</h2>

	<hr>

	<table class = "table table-bordered">

		<thead>

			<tr>

				<th>Factura</th>
				<th>Fecha</th>
				<th>Identificación</th>
				<th>Nombres</th>
				<th>Dirección</th>
				<th>Subtotal</th>
				<th>Iva</th>
				<th>Descuento</th>
				<th>Total</th>
				<th></th>

			</tr>

		</thead>

		<tbody>

			<?php

				$bills = BillController::ConsultBillController();

				foreach($bills as $key => $value)
				{

					echo "<tr>

						<td>" . $value["id"] . "</td>
					    <td>" . $value["bill_date"] . "</td>
						<td>" . $value["id_user"] . "</td>
					    <td>" . $value["names"] . "</td>
					    <td>" . $value["address"] . "</td>
					    <td> $ " . number_format($value["subtotal"], 0, ",", ".") . "</td>
					    <td> $ " . number_format($value["tax"], 0, ",", ".") . "</td>
					    <td> $ " . number_format($value["discount"], 0, ",", ".") . "</td>
					    <td> $ " . number_format($value["total"], 0, ",", ".") . "</td>
					    <td>

					    	<button class = 'btn btn-default buttonConsultBill' idBill = '".$value["id"]."' title = 'Consultar' data-toggle = 'modal' data-target = '#modalBill'>

					    		<i class = 'glyphicon glyphicon-modal-window text-primary'></i>

					    	</button>

					    </td>

					</tr>";

				}

			?>

		</tbody>

	</table>

	<div class = "modal fade" id = "modalBill" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-title text-primary">Factura</h4>

				</div>

				<div class = "modal-body">

				 	<table class = "table">

						<thead>

							<tr>

								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Descuento</th>
								<th>Subtotal</th>

							</tr>

						</thead>

						<tbody>

							

						</tbody>

				 	</table>

				</div>

				<div class = "modal-footer">

					<button type = "button" class = "btn btn-primary pull-right" data-dismiss = "modal">Aceptar</button>

				</div>

			</div>

		</div>

	</div>

