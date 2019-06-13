<?php 
	$xtple1 = new XTemplate("views/e1/e1.html");

	$do_save=1;
	if($_POST){
		$fullName =$_POST['txtFullName'];
		$address  = $_POST['txtAddress'];
		$email    = $_POST['txtEmail'];
		$phone    = $_POST['txtPhone'];
		$gender   = $_POST['rdGender'];

		if($valid->isString($fullName) == 'NO'){
				$do_save=0;
				$mess_fullname = 'Your Full Name is invalid!';
				$xtple1->assign('mess_fullname', $mess_fullname);
			}
		$xtple1->assign('fullName', $fullName);

		if($valid->isAddress($address) == 'NO'){
			$do_save=0;
			$mess_address = 'Your Address is invalid!';
			$xtple1->assign('mess_address', $mess_address);
		}
	$xtple1->assign('address', $address);

		if($valid->isEmail($email)  == 'NO'){
			$do_save = 0;
			$mess_email = 'Your Email is invalid!';
			$xtple1->assign('mess_email', $mess_email);
		}
	$xtple1->assign('email',$email);

		if($valid->isPhone($phone) == 'NO'){
			$do_save = 0;
			$mess_phone = 'Your Phone is invalid!';
			$xtple1->assign('mess_phone',$mess_phone);
		}
	$xtple1->assign('phone',$phone);

		if($gender==''){
			$do_save= 0;
			$mess_gender = 'Please you to choose your gender!';
			$xtple1 ->assign('mess_gender',$mess_gender);
		}
	$xtple1->assign('gender',$gender);
	}

	$xtple1->parse('E1');
	$content = $xtple1->text('E1');