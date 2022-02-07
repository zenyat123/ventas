<?php

	require_once("connection.php");

	class ProductModel
	{

		static public function RegisterProductModel($table, $data)
		{

			$register = Connection::Connect()->prepare("insert into $table (product, price) values (:product, :price)");

			$register -> bindParam(":product", $data["product"]);
			$register -> bindParam(":price", $data["price"]);

			if($register -> execute())
			{

				return "Registrado";

			}
			else
			{

				return $register -> errorInfo();

			}

			$register -> close();

			$register = null;

		}

		static public function ConsultProductModel($table, $field, $value)
		{

			if($field == "")
			{

				$consult = Connection::Connect()->prepare("select * from $table");

				$consult -> execute();

				return $consult -> fetchAll();

			}
			else
			{

				$consult = Connection::Connect()->prepare("select * from $table where $field = :value");

				$consult -> bindParam(":value", $value);

				$consult -> execute();

				return $consult -> fetch();

			}

			$consult -> close();

			$consult = null;

		}

		static public function UpdateProductModel($table, $data)
		{

			$update = Connection::Connect()->prepare("update $table set product = :product, price = :price where id = :id");

			$update -> bindParam(":id", $data["id_product"]);
			$update -> bindParam(":product", $data["product"]);
			$update -> bindParam(":price", $data["price"]);

			if($update -> execute())
			{

				return "Actualizado";

			}
			else
			{

				return $update -> errorInfo();

			}

			$update -> close();

			$update = null;

		}

		static public function DeleteProductModel($table, $field, $value)
		{

			$delete = Connection::Connect()->prepare("delete from $table where $field = :value");

			$delete -> bindParam(":value", $value);

			if($delete -> execute())
			{

				return "eliminado";

			}
			else
			{

				return $delete -> errorInfo();

			}

			$delete -> close();

			$delete = null;

		}

	}