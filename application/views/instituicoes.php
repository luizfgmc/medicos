<html>

	<head>


	</head>


	<body>

		
		<a href="<?php echo base_url()?>adm/cadastrarinstituicao">inserir instituicao </a><br/>
		<?php 

				echo("instituicoess:");
				echo("<br/>");
				echo("<br/>");
				
				foreach ($query as $k) {
					
					echo("nome:"." ".$k->nome."<br/>");
					echo("cnpj:"." ".$k->cnpj."<br/>");
					echo("responsavel:"." ".$k->responsavel."<br/>");
					echo("endereco:"." ".$k->endereco."<br/>");
					echo("endereco:"." ".$k->end_numero."<br/>");
					echo("compelemento:"." ".$k->complemento."<br/>");
					echo("bairro:"." ".$k->bairro."<br/>");
					echo("uf:"." ".$k->uf."<br/>");
					echo("cep:"." ".$k->cep."<br/>");
					echo("telefone:"." ".$k->telefone."<br/>");
					echo("status:"." ".$k->status."</br>");
					echo("<br/>");
					?>
					<a href="<?php echo base_url() . "adm/editarInstituicao/" .$k->id ?>">editar</a><br/>
					<a href="<?php echo base_url() . "adm/deletaInstituicao/" .$k->id ?>">excluir</a><br/>
				
				<?php
				}

				


		?>


	</body>




</html>