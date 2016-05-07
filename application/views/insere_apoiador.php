<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/paciente/paciente.css" />
<section class="mainContent">
    <section class="formCadastroPacientes">
        <form method="post" id="formPaciente" action="<?php echo base_url() ?>apoiador/insereApoiador/">
            <section class="cadastro_paciente">
                <div class="containerCenter fullSiteSize">
                    <div class="halfSize">

                        <div class="container_form_paciente">
                            <h2>Cadastro de Apoiador</h2>
                            <div class="form_cadastro_paciente">
                                <div class="container_item_form">
                                    <label>Nome</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="nomeApoiador"  class="default_text_input required" size=45 maxlength=45 />
                                    </div>
                                </div>
                                <br/>
								<div class="container_item_form">
									<label>Email: </label>
									<input type="text" class="default_text_input required"  name="emailApoiador" size=60 maxlength=60 tabIndex ="10" />
								</div>		
								<div class="container_item_form">
									<label>Confirmar Email: </label>
									<input type="text" class="default_text_input required"  name="emailConfirmeApoiador" size=60 maxlength=60 tabIndex ="10" />
								</div>
								
								<div class="container_item_form">
									<label>Senha: </label>
									<input type="password" class="default_text_input required" name="senhaApoiador" size=12 maxlength=12 tabIndex ="12" />
								</div>
								<div class="container_item_form">
									<label>Confirmar Senha: </label>
									<input type="password" class="default_text_input required" name="senhaConfirmeApoiador" size=12 maxlength=12 tabIndex ="12" />
								</div>
								
								<br/>
                                <div class="container_submit">
									<input type="submit" class="input_submit" tabIndex ="14" value="Cadastrar"/>
									   <a href="<?php echo base_url() ?>instituicao/" class="input_cancel">Cancelar</a>
								</div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>

    </section>

</section>

<script>
    $(document).on('submit', '#formPaciente', function(e) {
        verifica_campos('#formPaciente', e);
    });
</script>