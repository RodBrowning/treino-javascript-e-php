<!DOCTYPE html>

<?php
	require 'conexao.php';
	require 'queryLancamento.php';
?>

<html>
<head>
	<title>Treino banco</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="text-center mt-5">Lançamento de Vendas</h1>
				<form method="post" action='banco.php' class="mt-5">
					<div class="row">
						<div class="col mb-3">
							<label for='vendedorNome'>Vendedor</label>
							<select class="form-control" id="vendedorNome">
								<option value="0">Selecione o Vendedor</option>
								<?php echo getSeller($mysqli); ?>					      
						    </select>						    
					    </div>
					    <div class="col">
					    	<label>Comissão</label>
						    <p><span id="comissao">0</span>%</p>
						</div>
				    </div>
					<div id="item" class="form-control">
						<div class="row">
							<div class="col-md-4">
								<label for='produtoNome'>Produto</label>
								<select class="form-control" id="produtoNome">
									<option value="0">Selecione o Produto</option>
										<?php echo getProduct($mysqli); ?>			     
							    </select>
						    </div>

						    <div class="col">
						    	<label for='valor'>valor</label>
						    	<p>R$ <span id='preco'>0</span></p>
						    </div>
						    <div class="col-md-3">
						    	<label for='valor-comissao'>Valor Comissao</label>
						    	<p>R$ <span id='valorComissao'></span></p>
						    </div>
						    <div class="col">
						    	<label class="col">Add</label>
						    	<button type='button' id="ad_button" class="col btn btn-success btn-sm">Add</button>
						    </div>
						</div>

					</div>
					
				</form>
			</div>
		</div>
	</div>
	




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="public/js/jquery.number.min.js"></script>


	<script type="text/javascript">
		$(function(){
			$('#vendedorNome').change(function(){
				var vendedor_id = $(this).val();
				$.ajax({
					url: "loadComission.php",
					method: 'POST',
					data: {vendedor_id:vendedor_id},
					success: function(data){
						$('#comissao').html(data);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(function(){
			$('#produtoNome').change(function(){
				var product_id = $(this).val();
				$.ajax({
					url: "loadProduct.php",
					method: 'POST',
					data: {product_id:product_id},
					success: function(data){
						$('#preco').html(data);
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){			
			$('#preco').on('DOMSubtreeModified',function(){
				let preco = $('#preco').html();
				let porcentagen = $('#comissao').html();				
				let comissao = (preco * (porcentagen/100))*1;
				let comissaoFinal = $.number(comissao,2);
				console.log(preco);
				console.log(porcentagen);
				console.log(comissaoFinal);
				$('#valorComissao').html(comissaoFinal);
			});
		});		
	</script>
	<script type="text/javascript">
		$(function(){			
			$('#comissao').on('DOMSubtreeModified',function(){
				let preco = $('#preco').html();
				let porcentagen = $('#comissao').html();				
				let comissao = (preco * (porcentagen/100))*1;
				let comissaoFinal = $.number(comissao,2);
				console.log(preco);
				console.log(porcentagen);
				console.log(comissaoFinal);
				$('#valorComissao').html(comissaoFinal);
			});
		});		
	</script>
	
</body>
</html>