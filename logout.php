<?php

	include("libs/bootstrap.php");
	$_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME']='';
	session_destroy($_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME']);
	if(strlen($_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME']) == 0){
		$f->redir($baseUrl."login.php");
	}