<?php

	require_once("../controllers/bill_controller.php");
	require_once("../models/bill_model.php");

	class AjaxSales
	{

		public $id_bill;
		public $bill_date;
		public $id_user;
		public $names;
		public $address;
		public $subtotal;
		public $tax;
		public $discount;
		public $total;

		public $products;
		public $prices;
		public $quantities;
		public $discount_products;
		public $subtotals;

		public function AjaxRegisterSales()
		{

			$data = array("id_bill" => $this -> id_bill,
						  "bill_date" => $this -> bill_date,
						  "id_user" => $this -> id_user,
						  "names" => $this -> names,
						  "address" => $this -> address,
						  "subtotal" => $this -> subtotal,
						  "tax" => $this -> tax,
						  "discount" => $this -> discount,
						  "total" => $this -> total);

			$request = BillController::RegisterBillController($data);

			$products = explode(",", $this -> products);
			$prices = explode(",", $this -> prices);
			$quantities = explode(",", $this -> quantities);
			$discount_products = explode(",", $this -> discount_products);
			$subtotals = explode(",", $this -> subtotals);

			for($i = 0; $i < count($products); $i++)
			{

				$data = array("id_bill" => $this -> id_bill,
						      "id_product" => $products[$i],
						      "price" => $prices[$i],
						      "quantity" => $quantities[$i],
						      "discount" => $discount_products[$i],
						      "subtotal" => $subtotals[$i]);

				$request = BillController::RegisterSalesController($data);

			}

		}
		
	}

	if(isset($_POST["idUser"]))
	{

		$register = new AjaxSales();
		$register -> id_bill = $_POST["idBill"];
		$register -> bill_date = $_POST["billDate"];
		$register -> id_user = $_POST["idUser"];
		$register -> names = $_POST["names"];
		$register -> address = $_POST["address"];
		$register -> subtotal = $_POST["subtotal"];
		$register -> tax = $_POST["tax"];
		$register -> discount = $_POST["discount"];
		$register -> total = $_POST["total"];
		$register -> products = $_POST["products"];
		$register -> prices = $_POST["prices"];
		$register -> quantities = $_POST["quantities"];
		$register -> discount_products = $_POST["discountProducts"];
		$register -> subtotals = $_POST["subtotals"];
		$register -> AjaxRegisterSales();

	}