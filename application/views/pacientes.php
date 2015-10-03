<html>
	<head>

	</head>


	<body>


		<a href="<?php echo base_url()?>paciente/"> Inserir Paciente </a><br/></br/>
		<?php
		

			foreach ($query as $k) {
				
				echo($k->nome."<br/>");
				echo($k->cpf."<br/>");
				echo($k->endereco."<br/>");
				echo($k->end_numero."<br/>");
				echo($k->complemento."<br/>");
				echo($k->bairro."<br/>");
				echo($k->cidade."<br/>");
				echo($k->uf."<br/>");
				echo($k->cep."<br/>");
				echo($k->telefone."<br/>");
				?>
				
				<a href="<?php echo base_url() . "paciente/editarPaciente/".$k->id ?>"> editar </a>
				<a href="<?php echo base_url() . "paciente/deletarPaciente/".$k->id ?>"> excluir </a>
				
				<?php
				echo("<br/>");
			}	



		?>

	</body>
</html>