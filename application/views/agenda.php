<html>
	<head>

	</head>


	<body>


		<a href="<?php echo base_url()?>agenda/"> Inserir Agenda </a><br/></br/>
		<?php
		

			foreach ($query as $k) {
				
				echo($k->nome."<br/>");
				echo($k->descricao."<br/>");
				echo($k->saldo."<br/>");
				echo($k->quantidade."<br/>");
				echo($k->crm."<br/>");
				echo($k->data_emissao."<br/>");
				echo($k->telefone."<br/>");
				echo("id clinica".$k->clinica_id."<br/>");
				echo("nome clinica:"." ".$k->nome."<br/>");
				echo("telefone clinica:"." ".$k->telefone."<br/>");
				echo("endereco clinica:"." ".$k->endereco."<br/>");
				echo($k->end_numero."<br/>");
				echo("solicitar".$k->medico_id."<br/>");
			
		?>			
				<a href="<?php echo base_url() . "instituicao/solicitarConsulta/".$k->id ?>"> Solicitar Consulta </a>
				<a href="<?php echo base_url() . "agenda/editarAgenda/".$k->id ?>"> editar </a>
				<a href="<?php echo base_url() . "agenda/deletarAgenda/".$k->id ?>"> excluir </a>
				
				<?php
				echo("<br/>");
			}	

		?>

	</body>
</html>