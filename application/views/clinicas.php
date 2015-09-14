<html>
	<head>

	</head>


	<body>


		<a href="<?php echo base_url()?>clinica/"> Inserir Clinica </a><br/></br/>
		<?php
		

			foreach ($query as $k) {
				
				echo($k->nome."<br/>");
				echo($k->telefone."<br/>");
				echo($k->end_numero."<br/>");
				echo($k->end_complemento."<br/>");
				echo($k->bairro."<br/>");
				echo($k->cidade."<br/>");
				echo($k->uf."<br/>");
				echo($k->cep."<br/>");
				?>
				
				<a href="<?php echo base_url() . "clinica/buscarClinicaPorId/".$k->id ?>"> editar </a>
				<a href="<?php echo base_url() . "clinica/excluirClinica/".$k->id ?>"> excluir </a>
				
				<?php
				echo("<br/>");
			}	



		?>

	</body>
</html>