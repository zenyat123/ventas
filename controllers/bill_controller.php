<?php

	class BillController
	{

		static public function RegisterBillController($data)
		{

			$table = "bills";

			$request = BillModel::RegisterBillModel($table, $data);

			return $request;

		}

		static public function ConsultBillController()
		{

			$table = "bills";

			$request = BillModel::ConsultBillModel($table);

			return $request;

		}

		static public function ConsultBillsController($field, $value)
		{

			$request = BillModel::ConsultBillsModel($field, $value);

			return $request;

		}

		static public function RegisterSalesController($data)
		{

			$table = "sales";

			$request = BillModel::RegisterSalesModel($table, $data);

			return $request;

		}

	}