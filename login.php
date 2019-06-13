<?php 
	include("libs/bootstrap.php");
	$xtp = new XTemplate("views/login.html");
	
	if($_POST){
		$_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME'] = '';
		$email = $_POST['txtEmail'];
		$pwd   = $_POST['txtPass'];
		//1.validation
		//2.Login

		$pwd1 = sha1($pwd).$salt;
		$sql = "SELECT * FROM tblaccounts WHERE email = '{$email}' AND password = '{$pwd1}'";
		$rs  = $db->fetchOne($sql);
		//Check 
		if($email != $rs['email'] || $pwd1 != $rs['password']){
			$mess = 'Wrong Email or Password!';
			$xtp ->assign('mess', $mess);
		}
		$xtp ->assign('email',$email);
		$xtp ->assign('pass',$pwd);
		
		if(strlen($rs['email'])>0){
			$_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME'] = $rs['fullname'];
		}
		if($_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME'] != ''){
			$f->redir($baseUrl."?m=student&a=list");
		}
	}


	$xtp->parse('LOGIN');
	$xtp->out('LOGIN');