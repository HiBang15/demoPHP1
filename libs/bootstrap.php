<?php
	session_start();
	error_reporting(E_ALL);
	include("Validate.class.php");
	include("XTemplate.class.php");
	include("Model.class.php");
	include("app.class.php");

	$valid = new Validate;
	$baseUrl = "http://".$_SERVER['HTTP_HOST']."/rePro/";
	$dsn="mysql:host=localhost;port=3306;dbname=c1811l";
	$usr = 'c1811l';
	$pwd = '123456';
	$db = new Model($dsn,$usr,$pwd);
	$f = new app;
	$salt = sha1('15112000');