<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
        <form method="post" action="<?php echo base_url() ?>medico/insereMedico/" id="formMedico">
            <div class="halfSize">
                <div class="container_form_medico">
                    <h2>Cadastro Médico</h2>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>Nome: </label>
                            <input type="text" class="default_text_input required" name="nomeMedico" size=45 maxlength=45 tabIndex ="1" />
                        </div>
                        <div class="container_item_form">
                            <label>Especialidade: </label>
                            <select name="especialidadeMedico" tabIndex ="3">
                                <option>Selecione</option>
                                <?php
                                foreach ($especialidades as $especialidade):
                                    ?>
                                    <option value="<?= $especialidade->id ?>"><?= $especialidade->descricao ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>	
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Telefone Primário: </label>
                                <input type="tel" class="default_text_input required" name="telefoneMedico" size=12 maxlength=12 tabIndex ="6"  OnKeyPress="formatar('##-####-####', this)" />
                            </div>

                            <div class="container_tiny_item">
                                <label>Tipo: </label>
                                <select tabIndex ="7">
                                    <option>Selecione</option>
                                    <option>Fixo</option>
                                    <option>Celular</option>
                                </select>
                            </div>
                        </div>								
                        <div class="container_item_form">
                            <label>Email: </label>
                            <input type="text" class="default_text_input required"  name="emailMedico" size=60 maxlength=60 tabIndex ="10" />
                        </div>		
                        <div class="container_item_form">
                            <label>Senha: </label>
                            <input type="password" class="default_text_input required" name="senhaMedico" size=12 maxlength=12 tabIndex ="12" />
                        </div>																			
                    </div>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>CPF: </label>
                            <input type="text" class="default_text_input required" name="cpfMedico" size=11 maxlength=14 tabIndex ="2" OnKeyPress="formatar('###.###.###.##', this)" /> 
                        </div>
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Registro CRM: </label>
                                <input type="text" class="default_text_input required" name="numeroCRM" size=10 maxlength=10 tabIndex ="4" />
                            </div>

                            <div class="container_tiny_item">
                                <label>Estado CRM: </label>
                                <select name="crmUF" tabIndex ="5">
                                    <option >Selecione</option>
                                    <?php
                                    foreach ($estados as $estado):
                                        ?>
                                        <option value="<?= $estado->uf ?>"><?= $estado->uf ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Telefone Secundário: </label>
                                <input type="text" class="default_small_text_input" size=12 maxlength=12 tabIndex ="8" OnKeyPress="formatar('##-####-####', this)" />
                            </div>

                            <div class="container_tiny_item">
                                <label>Tipo: </label>
                                <select tabIndex ="9">
                                    <option>Selecione</option>
                                    <option>Fixo</option>
                                    <option>Celular</option>
                                </select>
                            </div>
                        </div>																	
                        <div class="container_item_form">
                            <label>Confirmar Email: </label>
                            <input type="text" class="default_text_input required"  name="emailConfirmeMedico" size=60 maxlength=60 tabIndex ="11" />
                        </div>		
                        <div class="container_item_form">
                            <label>Confirmar Senha: </label>
                            <input type="password" class="default_text_input required" name="senhaConfirmeMedico" size=12 maxlength=12 tabIndex ="13" />
                        </div>																			
                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" tabIndex ="14" />
                        <button type="button" class="input_cancel" tabIndex ="15">Cancelar </button>
                    </div>	

                </div>
            </div>
            </form>
        </div>
    </section>
</section>


</div>  
</section>

        
<script>
    $(document).on('submit', '#formMedico', function(e) {
        verifica_campos('#formMedico', e);
    });
</script>