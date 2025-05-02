<?php

    //8 karakter kód
    function CodeGen(){
		
		$char = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		
		$code = "";
		
		for($i=0;$i<8;$i++){
			
			$code .= $char[rand(0, count($char)-1)];
		}
	
		return $code;
	}

    //kód ellenőrzés
    function Coder(){
		
		$conn = new mysqli("localhost", "root", "", "ambruserik_");
		
		$code = CodeGen();
		
		while(mysqli_num_rows($conn->query("SELECT * FROM codes WHERE code='$code'")) == 1){
			
			$code = CodeGen();
		}
		
		return $code;
	}

	//Jelszó teszt
	function isStrong($jelszo){

		if (strlen($jelszo) < 6) {
			return false;
		}
	
		$isUpper = false;
		for ($i = 0; $i < strlen($jelszo); $i++) {
			if (ctype_upper($jelszo[$i])) {
				$isUpper = true;
				break;
			}
		}
		if (!$isUpper) {
			return false;
		}
	
		$isLower = false;
		for ($i = 0; $i < strlen($jelszo); $i++) {
			if (ctype_lower($jelszo[$i])) {
				$isLower = true;
				break;
			}
		}
		if (!$isLower) {
			return false;
		}
	
		$isNumber = false;
		for ($i = 0; $i < strlen($jelszo); $i++) {
			if (is_numeric($jelszo[$i])) {
				$isNumber = true;
				break;
			}
		}
		if (!$isNumber) {
			return false;
		}
	
		return true;
	}

	// Pontszámoló
	function calcScore($won, $lost, $BO) {

		$winPts = 30;
		$lossPts = -10;
		$bo3WinBonus = 10;
		$bo5WinBonus = 20;
		
		$pts = $won * $winPts;
		
		if ($won > 0) {
			$pts += $lost * $lossPts;
		}
	
		if ($lost == 0 && $BO > 1) {
			$pts += $bo3WinBonus;
		}
	
		if ($BO == 5 && $won == 3 && $lost == 0) {
			$pts += $bo5WinBonus;
		}

		$score = max(0, $pts);
	
		return $score;
	}

?>