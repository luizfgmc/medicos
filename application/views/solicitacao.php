<html>
	

	<form action="<?php echo base_url()?>instituicao/solicitarConsultaSalvar" method="post">

		<label> solicitante: </label>
		<input type="text" id="solicitante" name="solicitante"/>

		<label> descricao: </label>
		<input type="text"  id="descricao" name="descricao"/>

		<select name="paciente" id="paciente">
			<?php

				foreach ($query['pacientes'] as $k) {
					foreach ($k as $y) {
					?>
					
					<option value="<?=$y->id?>"><?=$y->nome_paciente?> </option>
				<?php
					}
				}	


			?>

		</select>

		<input type="hidden" name ="id_agenda" value="<?=$query['idAgenda']?>"/>

		<input type="submit" value="Solicitar"/>
	</form>

</html>