<?php 
	class app{
		public function redir($url){
			header("Location:{$url}");
		}
		public function paging($url, $t, $l, $css){
			$pi='';
			$totalPage = ceil($t/$l);
			for($i=1; $i<=$totalPage; $i++){
				$pi .= "<a href='?{$url}&page={$i}' class='$css'>{$i}</a>";
			}
			return $pi;
		}
	}