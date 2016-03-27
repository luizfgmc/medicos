<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
        <form method="post" action="<?php echo base_url() ?>cadastro/insereProfissional" id="formMedico">
            <div class="halfSize">
                <div class="container_form_medico">
                    <h2>Cadastro de Profissional</h2>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>Nome: </label>
                            <input type="text" class="default_text_input required" name="nome" size=45 maxlength=45 tabIndex ="1" />
                        </div>
                        <div class="container_item_form">
                            <label>Profissão: </label>
                            <select name="profissao" tabIndex ="3">
                                <option>Selecione</option>
                                <?php
                                foreach ($profissoes as $profissao):
                                    ?>
                                    <option value="<?= $profissao->id_profissao ?>"><?= $profissao->nome_profissao ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>  
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Telefone Primário: </label>
                                <input type="tel" class="default_text_input required" name="telefone" size=12 maxlength=12 tabIndex ="6"  OnKeyPress="formatar('##-####-####', this)" />
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
                            <input type="text" class="default_text_input required"  name="email" size=60 maxlength=60 tabIndex ="10" />
                        </div>		
                        <div class="container_item_form">
                            <label>Senha: </label>
                            <input type="password" class="default_text_input required" name="senha" size=12 maxlength=12 tabIndex ="12" />
                        </div>																			
                    </div>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>CPF: </label>
                            <input type="text" class="default_text_input required" name="cpf" size=11 maxlength=14 tabIndex ="2" OnKeyPress="formatar('###.###.###.##', this)" /> 
                        </div>
                        <div class="container_item_form">
                                <label>Estado: </label>
                                <select name="uf" tabIndex ="5">
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
                        <div class="container_item_form">
                            <label>Confirmar Email: </label>
                            <input type="text" class="default_text_input required"  name="emailConfirme" size=60 maxlength=60 tabIndex ="11" />
                        </div>		
                        <div class="container_item_form">
                            <label>Confirmar Senha: </label>
                            <input type="password" class="default_text_input required" name="senhaConfirme" size=12 maxlength=12 tabIndex ="13" />
                        </div>																			
                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" tabIndex ="14" />
                           <a href="<?php echo base_url() ?>" class="input_cancel">Cancelar</a>
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