<?php
	include("libs/bootstrap.php");
	$xtph = new XTemplate("views/index.html");
	
	if(strlen($_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME'])>0){
		$m = (isset($_GET['m']))?$_GET['m']:'';
		$a = (isset($_GET['a']))?$_GET['a']:'';

		if($m != '' && $a != ''){
			if(file_exists("controlers/{$m}/{$a}.php")){
				include("controlers/{$m}/{$a}.php");
			}else{
				$content = "404 Not Found!";
			}
			$xtph -> assign('content',$content);
		}
	}else{
		$f->redir($baseUrl."login.php");
	}
	
	$xtph->assign('userName','Welcome '.$_SESSION['C1811L_SIGNIN_SUCCESS_FULLNAME']);
	$xtph->assign("baseUrl",$baseUrl);
	$xtph -> parse('LAYOUT');
	$xtph -> out('LAYOUT');