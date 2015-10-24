<html>
	<?php
		
		var_dump($query);
		$id = $query[0]->id;

	?>

	<form action="<?php echo base_url()?>medico/aprovarSolicitacaoSalvar" method="post">

		<label> data da consulta: </label>
		<input type="text" id="data_agendamento" name="data_agendamento"/>
		<label> hora da consulta: </label>
		<input type="text"  id="hora_agendamento" name="hora_agendamento"/>

		<input type="hidden" name ="id" value="<?=$id; ?>"/>

		<input type="submit" value="aprovar"/>
	</form>

</html>