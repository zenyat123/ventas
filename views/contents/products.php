

	<h2 class = "text-primary">Productos</h2>

	<hr>

	<table class = "table table-bordered">

		<thead>

			<tr>

				<th>Id</th>
				<th>Producto</th>
				<th>Precio</th>
				<th width = "160px"></th>

			</tr>

		</thead>

		<tbody>

			<?php

				$products = ProductController::ConsultProductController("", "");

				foreach($products as $key => $value)
				{

					echo "<tr>

						<td>".$value["id"]."</td>
						<td>".$value["product"]."</td>
						<td>$ ".number_format($value["price"], 0, ",", ".")."</td>
						<td>

							<div class = 'btn-group'>

								<button class = 'btn btn-default buttonUpdatingProduct' title = 'Actualizar' idProduct = '".$value["id"]."' data-toggle = 'modal' data-target = '#modalUpdateProduct'>

									<i class = 'glyphicon glyphicon-edit text-primary'></i>

								</button>

								<button class = 'btn btn-default buttonDeletingProduct' title = 'eliminar' idProduct = '".$value["id"]."' product = '".$value["product"]."' data-toggle = 'modal' data-target = '#modalDeleteProduct'>

									<i class = 'glyphicon glyphicon-exclamation-sign text-danger'></i>

								</button>

							</div>

						</td>

					</tr>";

				}

			?>

		</tbody>

	</table>

	<button class = "btn btn-primary pull-right" data-toggle = "modal" data-target = "#modalRegisterProduct">Registrar Producto</button>

	<div class = "modal fade" id = "modalRegisterProduct" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-tittle text-primary">Registrar Producto</h4>

				</div>

				<div class = "modal-body">

					<form method = "post">

						<div class = "form-group">

							<input type = "text" name = "product" class = "form-control" placeholder = "Producto">

						</div>

						<div class = "form-group">

							<input type = "text" name = "price" class = "form-control" placeholder = "Precio">

						</div>

						<button type = "submit" class = "btn btn-primary pull-right">Registrar</button>

						<?php

							$register = ProductController::RegisterProductController();

							if($register == "Registrado")
							{

								echo "<script>

									window.location = 'products';

								</script>";

							}

						?>

					</form>

				</div>

			</div>

		</div>

	</div>

	<div class = "modal fade" id = "modalUpdateProduct" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-title text-primary">Actualizar Producto</h4>

				</div>

				<div class = "modal-body">

					<div class = "form-group">

						<input type = "text" class = "form-control" id = "updateProduct">

					</div>

					<div class = "form-group">

						<input type = "text" class = "form-control" id = "updatePrice">

					</div>

				</div>

				<div class = "modal-footer">

					<button class = "btn btn-primary" id = "buttonUpdateProduct">Actualizar</button>

				</div>

			</div>

		</div>

	</div>

	<div class = "modal fade" id = "modalDeleteProduct" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-title text-danger">eliminar producto</h4>

				</div>

				<div class = "modal-body">

					

				</div>

				<div class = "modal-footer">

					<button class = "btn btn-default" data-dismiss = "modal">Cancelar</button>

					<button class = "btn btn-danger" id = "buttonDeleteProduct">eliminar</button>

				</div>

			</div>

		</div>

	</div>

