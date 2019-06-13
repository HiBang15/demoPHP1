<?php
    include('../../libs/ZTemplate.class.php');
    
    $info = new XTemplate('views/e1/info.html');
    $name = $_POST['txtFullName'];
    $add = $_POST['txtAddress'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $gender = $_POST['rdGender'];
    $temp = array('name' => $name, 'add' => $add, 'phone' => $phone, 'email' => $email, 'gender' => $gender);
    $info -> assign('info', $temp);
    $info -> parse('result');
    $info -> out('result');