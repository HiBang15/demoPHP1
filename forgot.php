<?php
	include("libs/bootstrap.php");
	$xtpf = new XTemplate("views/forgot.html");
	if($_POST){
		$fullname = $_POST['txtFullName'];
		$email    = $_POST['txtEmail'];
		$phone    = $_POST['txtPhone'];

		$sql = 
	}
	$xtpf->parse('FORGOT');
	$xtpf->out('FORGOT');