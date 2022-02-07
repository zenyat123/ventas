<?php

	require_once("../controllers/product_controller.php");
	require_once("../models/product_model.php");

	require_once("../controllers/bill_controller.php");
	require_once("../models/bill_model.php");

	class AjaxBills
	{

		public $id_product;
		public $id_product_update;
		public $product;
		public $price;
		public $id_bill;
		public $id_product_delete;

		public function AjaxConsultProduct()
		{

			$field = "id";
			$value = $this -> id_product;

			$request = ProductController::ConsultProductController($field, $value);

			echo json_encode($request);

		}

		public function AjaxUpdateProduct()
		{

			$data = array("id_product" => $this -> id_product_update,
						  "product" => $this -> product,
						  "price" => $this -> price);

			$request = ProductController::UpdateProductController($data);

			echo $request;

		}

		public function AjaxDeleteProduct()
		{

			$field = "id";
			$value = $this -> id_product_delete;

			$request = ProductController::DeleteProductController($field, $value);

			echo $request;

		}

		public function AjaxConsultBills()
		{

			$field = "id_bill";
			$value = $this -> id_bill;

			$request = BillController::ConsultBillsController($field, $value);

			echo json_encode($request);

		}

	}

	if(isset($_POST["idProduct"]))
	{

		$update = new AjaxBills();
		$update -> id_product = $_POST["idProduct"];
		$update -> AjaxConsultProduct();

	}

	if(isset($_POST["idProductUpdate"]))
	{

		$update = new AjaxBills();
		$update -> id_product_update = $_POST["idProductUpdate"];
		$update -> product = $_POST["product"];
		$update -> price = $_POST["price"];
		$update -> AjaxUpdateProduct();

	}

	if(isset($_POST["idProductDelete"]))
	{

		$delete = new AjaxBills();
		$delete -> id_product_delete = $_POST["idProductDelete"];
		$delete -> AjaxDeleteProduct();

	}

	if(isset($_POST["idBill"]))
	{

		$consult = new AjaxBills();
		$consult -> id_bill = $_POST["idBill"];
		$consult -> AjaxConsultBills();

	}