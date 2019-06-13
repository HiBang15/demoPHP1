<?php
	$xtp1 = new XTemplate("views/student/list.html");
	$xtp2 = new XTemplate("views/student/edit.html");

	$id = $_GET['id'];
	echo $id;
	$rs = $db->fetchAll('tblstudent',"id=$id");
	
	
	$fullname = $rs[0]['fullname'];
	
	$address = $rs[0]['address'];
	$email = $rs[0]['email'];
	$phone = $rs[0]['phone'];
	$gender= $rs[0]['gender'];

	$xtp2 ->assign('fullName', $fullname);
	$xtp2 ->assign('address', $address);
	$xtp2 ->assign('email',$email);
	$xtp2 ->assign('phone',$phone);
	$xtp2 ->assign('gender',$gender);

	$do_save=1;
	if($_POST){
		$fullName_edit =$_POST['txtFullName'];
		$address_edit  = $_POST['txtAddress'];
		$email_edit    = $_POST['txtEmail'];
		$phone_edit   = $_POST['txtPhone'];
		$gender_edit   = $_POST['rdGender'];



		if($valid->isString($fullName_edit) == 'NO'){
				$do_save=0;
				$mess_fullname = 'Your Full Name is invalid!';
				$xtp2 ->assign('mess_fullname', $mess_fullname);
			}
		$xtp2 ->assign('fullName', $fullName_edit);

		if($valid->isAddress($address_edit) == 'NO'){
			$do_save=0;
			$mess_address = 'Your Address is invalid!';
			$xtp2 ->assign('mess_address', $mess_address);
		}
		$xtp2 ->assign('address', $address_edit);

		if($valid->isEmail($email_edit)  == 'NO'){
			$do_save = 0;
			$mess_email = 'Your Email is invalid!';
			$xtp2 ->assign('mess_email', $mess_email);
		}
		$xtp2 ->assign('email',$email_edit);

		if($valid->isPhone($phone_edit) == 'NO'){
			$do_save = 0;
			$mess_phone = 'Your Phone is invalid!';
			$xtp2 ->assign('mess_phone',$mess_phone);
		}
		$xtp2 ->assign('phone',$phone_edit);

		if($gender_edit == ''){
			$do_save= 0;
			$mess_gender = 'Please you to choose your gender!';
			$xtp2  ->assign('mess_gender',$mess_gender);
		}
		$xtp2 ->assign('gender',$gender_edit);
	

		


		if($do_save==1){
			$set = "fullname='{$name}',email='{$email_edit}', address='{$address_edit}', phone='{$phone_edit}',gender='{$gender_edit}'";
			$db->editId('tblstudent',$set,$id);
			header("location: ?m=student&a=list");
			
		}
	}
	 $xtp1->parse('LIST');
	 $xtp2->parse('EDIT');
	 $content = $xtp2->text('EDIT');
	//$xtp1->parse('LIST');
	//$content = $xtp1->text('LIST');
