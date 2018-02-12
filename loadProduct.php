<?php
	require 'conexao.php';

	$output = '';

	if(isset($_POST["product_id"])){
		if($_POST["product_id"] != ''){
			$query = "select * from produtos where id = ".$_POST['product_id']."";
		}else{
			$query = "select * from produtos";
		}
		$result = mysqli_query($mysqli, $query);
		while ($row = mysqli_fetch_array($result)) {
			$output = number_format($row['preco'],2);
		}
		echo $output;
	}



?>