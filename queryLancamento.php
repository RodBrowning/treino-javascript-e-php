<?php
	require 'conexao.php';
	
	function getSeller($mysqli){
		$output = '';

		$query = "select * from vendedores";
		$result = mysqli_query($mysqli, $query);

		while ($row = mysqli_fetch_array($result)) {
			$output .= '<option value="'.$row["id"].'">'.$row["nome"].'</option>';
		}
		return $output;

	}	

	function getProduct($mysqli){
		$output = '';

		$query = "select * from produtos";
		$result = mysqli_query($mysqli, $query);

		while ($row = mysqli_fetch_array($result)) {
			$output .= '<option value="'.$row["id"].'">'.$row["nome"].'</option>';
		}
		return $output;

	}	


?>