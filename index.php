<?php

	require_once("controllers/principal_controller.php");
	require_once("controllers/routes_controller.php");

	require_once("controllers/product_controller.php");
	require_once("controllers/bill_controller.php");

	require_once("models/bill_model.php");
	require_once("models/product_model.php");

	$principal = new PrincipalController();
	$principal -> Principal();