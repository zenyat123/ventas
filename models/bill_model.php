<?php

	require_once("connection.php");

	class BillModel
	{

		static public function RegisterBillModel($table, $data)
		{

			$sql = "insert into $table (id, bill_date, id_user, names, address, subtotal, tax, discount, total) values (:id, :bill_date, :id_user, :names, :address, :subtotal, :tax, :discount, :total)";

			$register = Connection::Connect()->prepare($sql);

			$register -> bindParam(":id", $data["id_bill"]);
			$register -> bindParam(":bill_date", $data["bill_date"]);
			$register -> bindParam(":id_user", $data["id_user"]);
			$register -> bindParam(":names", $data["names"]);
			$register -> bindParam(":address", $data["address"]);
			$register -> bindParam(":subtotal", $data["subtotal"]);
			$register -> bindParam(":tax", $data["tax"]);
			$register -> bindParam(":discount", $data["discount"]);
			$register -> bindParam(":total", $data["total"]);

			if($register -> execute())
			{

				return "Registrada";

			}
			else
			{

				return $register -> errorInfo();

			}

			$register -> close();

			$register = null;
			
		}

		static public function ConsultBillModel($table)
		{

			$consult = Connection::Connect()->prepare("select * from $table");

			$consult -> execute();

			return $consult -> fetchAll();

			$consult -> close();

			$consult = null;

		}

		static public function ConsultBillsModel($field, $value)
		{

			$sql = "select products.product, sales.price, sales.quantity, sales.discount, sales.subtotal from products inner join sales on products.id = sales.id_product and sales.$field = :value";

			$consult = Connection::Connect()->prepare($sql);

			$consult -> bindParam(":value", $value);

			$consult -> execute();

			return $consult -> fetchAll();

			$consult -> close();

			$consult = null;

		}

		static public function RegisterSalesModel($table, $data)
		{

			$sql = "insert into $table (id_bill, id_product, price, quantity, discount, subtotal) values (:id_bill, :id_product, :price, :quantity, :discount, :subtotal)";

			$register = Connection::Connect()->prepare($sql);

			$register -> bindParam(":id_bill", $data["id_bill"]);
			$register -> bindParam(":id_product", $data["id_product"]);
			$register -> bindParam(":price", $data["price"]);
			$register -> bindParam(":quantity", $data["quantity"]);
			$register -> bindParam(":discount", $data["discount"]);
			$register -> bindParam(":subtotal", $data["subtotal"]);

			if($register -> execute())
			{

				return "Registrada";

			}
			else
			{

				return $register -> errorInfo();

			}

			$register -> close();

			$register = null;

		}

	}