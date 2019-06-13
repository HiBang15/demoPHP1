<?php
	class Validate{


		public function isString($str){
			$f='NO';
			$preg = '/^[A-Za-z \.\-\_\']+$/';
			if(preg_match($preg,$str)){
				$f='YES';
			}
			return $f;
		}

		public function isAddress($str){
			$f ='NO';
			$preg='/^[A-Za-z0-9 \.\-\_\'\,]+$/';

			if(preg_match($preg, $str)){
				$f='YES';
			}
			return $f;
		}

		public function isEmail($str){
			$f='NO';
			$preg='/^[a-zA-Z][a-zA-Z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/';
			if(preg_match($preg,$str)){
				$f='YES';
			}
			return $f;
		}

		public function isPhone($int){
			$f='NO';
			$preg='/^(09|01[2|3|4|5|6|7|8])+([0-9]{8,12})$/';
			if(preg_match($preg,$int)){
				$f='YES';
			}
			return $f;
		}
		// public function isGender($sel){
		// 	$f='NO';
		// 	if(isset($sel)){
		// 		$f='YES';
		// 	}
		// 	return $f;
		// }
	}