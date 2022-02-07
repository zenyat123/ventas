<?php

	class ProductController
	{

		static public function RegisterProductController()
		{

			if(isset($_POST["product"]))
			{

				$table = "products";

				$data = array("product" => $_POST["product"],
							  "price" => $_POST["price"]);

				$request = ProductModel::RegisterProductModel($table, $data);

				return $request;

			}

		}

		static public function ConsultProductController($field, $value)
		{

			$table = "products";

			$request = ProductModel::ConsultProductModel($table, $field, $value);

			return $request;

		}

		static public function UpdateProductController($data)
		{

			$table = "products";

			$request = ProductModel::UpdateProductModel($table, $data);

			return $request;

		}

		static public function DeleteProductController($field, $value)
		{

			$table = "products";

			$request = ProductModel::DeleteProductModel($table, $field, $value);

			return $request;

		}

	}