<?php

	class Connection
	{

		static public function Connect()
		{

			$host = "localhost";
			$user = "root";
			$password = "";
			$database = "test";

			$conexion = new PDO("mysql:host=".$host.";dbname=".$database."",$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			return $conexion;

		}

	}