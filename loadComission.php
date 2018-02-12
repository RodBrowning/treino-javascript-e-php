<?php
	require 'conexao.php';

	$output = '';

	if(isset($_POST["vendedor_id"])){
		if($_POST["vendedor_id"] != ''){
			$query = "select * from vendedores where id = ".$_POST['vendedor_id']."";
		}else{
			$query = "select * from vendedores";
		}
		$result = mysqli_query($mysqli, $query);
		while ($row = mysqli_fetch_array($result)) {
			$output = $row['comissao'];
		}
		echo $output;
	}


?>