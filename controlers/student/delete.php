<?php
	$xtpe3 = new XTemplate("views/student/list.html");
	
	
	//DELETE ATBLE BY ID 
	$id = $_GET['id'];
	$db->delete('tblstudent',"id = {$id}");
	header("location: ?m=student&a=list");
	$xtpe3->parse('LIST');
	$content = $xtpe3->text('LIST');