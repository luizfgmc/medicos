<html>
	<head>

	</head>


	<body>


		<?php
			
		

			foreach ($query as $k) {
				
			?>		
				
				<?php
				echo($k->solicitante."<br/>");
				echo($k->nome_paciente."<br/>");
				echo($k->data_emissao."<br/>");
				echo($k->data_agendamento."<br/>");
				echo($k->hora_agendamento."<br/>");
				echo($k->status."<br/>");
				echo($k->data_emissao."<br/>");
				echo($k->descricao."<br/>");
				echo($k->status."<br/>");
				echo($k->id);
				?>
			 
  
			<a href="<?php echo base_url() . "medico/aprovarSolicitacao/".$k->id ?>"> aprovar </a>
			<a href="<?php echo base_url() . "medico/reprovarSolicitacao/".$k->id ?>"> reprovar </a>

				
			<?php

			}

		?>
				
?>

	</body>
</html>	