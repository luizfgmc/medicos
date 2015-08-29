<html>
	<head></head>
	<body>
		<section class="listdeMedicos">
			<?php
			foreach($listaDeMedicos as $medico):
			?>
				<div class="itemListaMedicos">
					<div>
						<span><?= $medico->nome; ?></span>
						<span><a href="<?php base_url().'/medico/editarMedico/'.$medico->id_medico; ?>">Editar Medico</a></span>
						<span><a href="<?php base_url().'/medico/excluirMedico/'.$medico->id_medico; ?>">Excluir Medico</a></span>
					</div>
				</div>
			<?php
			endforeach;
			?>
		</section>
	</body>
</html>