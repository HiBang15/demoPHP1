<?php
	$xtpa = new XTemplate('views/student/student.html');
	/*$arr['fullname'] = "'Mr.Bean'";
	$arr['email'] = "'MrBean@gmail.com'";
	$arr['phone'] = "'(+84)1243543667'";
	

	$db->insert('tblstudent',$arr);*/
	//echo print_r($db->fetchAll('tblstudent','1=1'),true);

	$do_save=1;
	$do_save1=1;
	if($_POST){
		$fullName =$_POST['txtFullName'];
		$address  = $_POST['txtAddress'];
		$email    = $_POST['txtEmail'];
		$phone    = $_POST['txtPhone'];
		$gender   = $_POST['rdGender'];

		$arr['fullname'] = "'{$fullName}'";
		$arr['address'] = "'{$address}'";
		$arr['email'] = "'{$email}'";
		$arr['phone'] = "'{$phone}'";
		$arr['gender'] = "'{$gender}'";


		if($valid->isString($fullName) == 'NO'){
				$do_save=0;
				$mess_fullname = 'Your Full Name is invalid!';
				$xtpa ->assign('mess_fullname', $mess_fullname);
			}
		$xtpa ->assign('fullName', $fullName);

		if($valid->isAddress($address) == 'NO'){
			$do_save=0;
			$mess_address = 'Your Address is invalid!';
			$xtpa ->assign('mess_address', $mess_address);
		}
		$xtpa ->assign('address', $address);

		if($valid->isEmail($email)  == 'NO'){
			$do_save = 0;
			$mess_email = 'Your Email is invalid!';
			$xtpa ->assign('mess_email', $mess_email);
		}
		$xtpa ->assign('email',$email);

		if($valid->isPhone($phone) == 'NO'){
			$do_save = 0;
			$mess_phone = 'Your Phone is invalid!';
			$xtpa ->assign('mess_phone',$mess_phone);
		}
		$xtpa ->assign('phone',$phone);

		if($gender==''){
			$do_save= 0;
			$mess_gender = 'Please you to choose your gender!';
			$xtpa  ->assign('mess_gender',$mess_gender);
		}
		$xtpa ->assign('gender',$gender);
	

		//existed email!
		if($db->checkExitst('tblstudent',"email='{$email}'") == 'YES'){
			$do_save=-1;
			$xtpa->assign('mess_email','existed email!');
			$xtpa->assign('noti','Data entry failed!');

		}
		//existed email!
		if($db->checkExitst('tblstudent',"phone='{$phone}'") == 'YES'){
			$do_save=-1;
			$xtpa->assign('mess_phone','existed phone!');
			$xtpa->assign('noti','Data entry failed!');

		}

		// //existed address!
		// if($db->checkExitst('tblstudent',"address='{$address}'") == 'YES'){
		// 	$do_save=-1;
		// 	$xtpa->assign('mess_address','existed address!');
		// 	$xtpa->assign('noti','Data entry failed!');

		// }
		//INSERT!!!!!!!!
		if($do_save==1){
			$db->insert('tblstudent',$arr);
			
		}
		$xtpa ->assign('FullName', $fullName);
		$xtpa ->assign('Address', $address);
		$xtpa ->assign('Email',$email);
		$xtpa ->assign('Phone',$phone);
		$xtpa ->assign('Gender',$gender);
	}

	$xtpa->parse('ADD');
	$content=$xtpa->text('ADD');