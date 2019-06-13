<?php
	$xtpe3 = new XTemplate("views/student/list.html");
	$condition = ' 1=1 ';

	if(isset($_POST['txtPost']) && isset($_POST['btnSearch'])){
		$ls = $_POST['txtPost'];
		if(strlen($ls)>0){
			if($db->delete('tblstudent', " id IN({$ls}) ") == 1){
			//	$f->redir('?m=student&a=list');
			}
		}

		$kw = $_POST['txtKeyword'];
		if(strlen($kw)){
			$condition .= " AND (fullname LIKE '%{$kw}%' OR email LIKE  '%{$kw}%' OR phone LIKE  '%{$kw}%' ) ";
		}
		$xtpe3->assign('kw',$kw);
	}

	$rs = $db->fetchAll('tblstudent',$condition);
	$L=2; 
	$T=count($rs);
	$page=(isset($_GET['page']))?$_GET['page']:1;
	$offset = ($page-1)*$L;
	$url = 'm=student&a=list';
	$condition .= "LIMIT {$offset},{$L}";
	$rs = $db->fetchAll('tblstudent',$condition);

	$pagers = $f->paging($url,$T,$L,'pager');
	if(count($rs)>0){
		$i = 1;
		foreach($rs as $r){
			$r['Nbr'] = $i;
			$r['gender']= ($r['gender']==1)?'Male':'Femail';
			$xtpe3->insert_loop("LIST.LAP",array('LAP'=>$r));
			$i++;
		}
	}

	$xtpe3->assign('pagers',$pagers);	
	$xtpe3->parse('LIST');
	$content = $xtpe3->text('LIST');