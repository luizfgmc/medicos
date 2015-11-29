	<form id="login_medico"  method="post" action="<?php echo base_url(); ?>acesso/logarMedico2">
		<div class="containerFormLogin">
			
			<label> Qual o dia de hoje? </label> </br>
			<?php
				foreach ($dias as $dia):
				?>
					<input type="radio" name="dia" value=<?php echo($dia * $hora) ?>> <?php echo($dia) ?>
				<?php
				endforeach;
			?>
			</br></br>
			<input type="submit" value="Logar" class="input_submit" id="enviar"/>
		</div>
	</form>