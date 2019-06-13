<?php
	$aProduct = array(
		array('sCode'=>'18XSMax','sName'=>'Iphone XSMax'),
		array('sCode'=>'18XS','sName'=>'Iphone XS'),
		array('sCode'=>'18Note9','sName'=>'Samsung Galaxy Note 9'),
		array('sCode'=>'18S10','sName'=>'Samsung Galaxy S 10')
	);
	$r['sName']='';
	$r['sCode'] = '';
	$f = 0;
	$sCode = $_POST('xx');
	foreach($aProduct as $i=>$a){
		if($sCode == $a['sCode']){
			$r = $aProduct[$i];
			$f=1;
		}
	}
	if($f==0){
		$r['sName']='Not Found';
	}
	$jsonProduct = json_encode($r);
	echo $jsonProduct;