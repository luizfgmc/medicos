<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<a href="<?php echo base_url() ?>clinica/listaClinicas"> Clinicas </a>
<a href="<?php echo base_url() ?>instituicao/instituicoes"> Instituicoes </a>
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
                            <input type="text" class="default_text_input required" name="nomeMedico" />
                        </div>
                        <div class="container_item_form">
                            <label>Especialidade: </label>
                            <select name="especialidadeMedico">
                                <option >Selecione</option>
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
                                <input type="text" class="default_small_text_input" name="telefoneMedico"  />
                            </div>

                            <div class="container_tiny_item">
                                <label>Tipo: </label>
                                <select>
                                    <option>Selecione</option>
                                </select>
                            </div>
                        </div>								
                        <div class="container_item_form">
                            <label>Email: </label>
                            <input type="text" class="default_text_input required"  name="emailMedico"  />
                        </div>		
                        <div class="container_item_form">
                            <label>Senha: </label>
                            <input type="text" class="default_text_input" name="senhaMedico" />
                        </div>																			
                    </div>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>CPF: </label>
                            <input type="text" class="default_text_input" name="cpfMedico" />
                        </div>
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Registro CRM: </label>
                                <input type="text" class="default_small_text_input" name="numeroCRM" />
                            </div>

                            <div class="container_tiny_item">
                                <label>Estado CRM: </label>
                                <select name="crmUF">
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
                                <input type="text" class="default_small_text_input" />
                            </div>

                            <div class="container_tiny_item">
                                <label>Tipo: </label>
                                <select>
                                    <option>Selecione</option>
                                </select>
                            </div>
                        </div>																	
                        <div class="container_item_form">
                            <label>Confirmar Email: </label>
                            <input type="text" class="default_text_input"  name="emailConfirmeMedico" />
                        </div>		
                        <div class="container_item_form">
                            <label>Confirmar Senha: </label>
                            <input type="text" class="default_text_input" name="senhaConfirmeMedico" />
                        </div>																			
                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" />
                        <button type="button" class="input_cancel">Cancelar</button>
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