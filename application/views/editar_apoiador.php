<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/paciente/paciente.css" />
<section class="mainContent">
    <section class="formCadastroPacientes">


        <form method="post" action="<?php echo base_url() ?>apoiador/editarSalvarApoiador/<?=$query[0]->id_apoiador?>">
            <section class="cadastro_paciente">
                <div class="containerCenter fullSiteSize">
                    <div class="halfSize">

                        <div class="container_form_paciente">
                        <h2>Editar Apoiador</h2>
                        <div class="form_cadastro_paciente">

                            <div class="container_item_form">
                                <label>Nome</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="nomeApoiador" value="<?= $query[0]->nome ?>" size=45 maxlength=45 />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Email</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="emailApoiador" value="<?= $query[0]->email ?>" />
                                </div>
                            </div>
							<div class="container_item_form">
                                <label>Verificar Email</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="emailConfirmeApoiador" value="" />
                                </div>
                            </div>
							
							<div class="container_item_form">
									<label>Senha: </label>
									<input type="password" class="default_text_input required" name="senhaApoiador" size=12 maxlength=12 tabIndex ="12" />
								</div>
								<div class="container_item_form">
									<label>Confirmar Senha: </label>
									<input type="password" class="default_text_input required" name="senhaConfirmeApoiador" size=12 maxlength=12 tabIndex ="12" />
								</div>

                            <div class="container_submit">
                                <input type="submit"  value="confirmar" class="input_submit" />
                            <a href="<?php echo base_url() ?>apoiador/listaApoiadores/" class="input_cancel">Cancelar</a>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>

    </section>

</section>