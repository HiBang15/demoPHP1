<?php
	class Model{
		protected $db ;
		public function __construct($dsn,$usr,$pwd){
			try{
				$this->db = new PDO($dsn,$usr,$pwd);
			}catch(PDOException $e){
				echo "Not connect to database!".$e->getMessage();
				die;
			}
		}
		public function execSQL($sql){
			$dbh = $this->db->prepare($sql);
			$dbh->execute();
			return $dbh;
		}
		public function fetchOne($sql){
			$dbh = $this->execSQL($sql);
			$rs = $dbh->fetch(PDO::FETCH_ASSOC);
			//var_dump($rs);
			return $rs;
		}
		function fetchAll($tbl,$where){
			$sql = "SELECT * FROM $tbl Where {$where}";
			$dbh = $this->execSQL($sql);

			$rs  = $dbh->fetchAll(PDO::FETCH_ASSOC);
			//echo print_r($rs,true);
			//var_dump($rs);
			return $rs;
		}
		public function insert($tblName,$ar){
			$f = 0;
			$aListKeys 		= array_keys($ar);
			$aListValues 	= array_values($ar);
			$listField 		= implode(',',$aListKeys);
			$listValue		= implode(',',$aListValues);
			$sql = "INSERT INTO {$tblName}({$listField})
			VALUES({$listValue})";
			if($this->execSQL($sql)){
				$f = 1;
			}
			return $f;
		}

		public function checkExitst($tbl,$where){
			$f = 'NO';
			$sql = "SELECT COUNT(1) as TOTAL
					FROM {$tbl} WHERE {$where}";
			$rs = $this->fetchOne($sql);
			if(intval($rs['TOTAL'])>0){
				$f  = 'YES';
			}
			return $f;
		}

		public function delete($tbl,$where){
			$f=0;
			$sql = "DELETE FROM {$tbl} WHERE  {$where}";
			if($this->execSQL($sql)){
				$f=1;
			}

			return $f;
		}

		public function editId($tbl,$up,$id){
			$f=0; 
			$sql = "UPDATE {$tbl} SET {$up} WHERE Id = {$id}";
			if($this->execSQL($sql)){
				$f=1;
			}
			return $f;
		}


		// public function getData($tbl){
			
		// 	if($this->result){
		// 		$data = mysql_fetch_array($this->result);
		// 	}else{
		// 		$data=0;
		// 	}
		// 	return $data;
		// }

		// public function getAllData($tbl){
			
		// 	$sql = "SELECT * FROM  $tbl";
		// 	$this->execSQL($sql);
		// 	if ($this->num_rows()==0){
		// 		$data=0;
		// 	}else{
		// 		while($datas = $this->getData($tbl)){
		// 			$data[] = $datas;
		// 		}
				
		// 	}
		// 	return $data;
		// }
		// public function num_rows(){
		// 	if($this->result){
		// 		$num= mysqli_num_rows($this->result);
		// 	}else{
		// 		$num=0;
		// 	}
		// 	return $num;
		// }
	}