<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
        <form method="post" action="<?php echo base_url() ?>cadastroInstituicao/insereInstituicao" id="formMedico">
            <div class="halfSize">
                <div class="container_form_medico">
                    <h2>Cadastro Instituição</h2>
                    <?php
                    if ($this->session->userdata('erroEmail')) {
                        echo $this->session->userdata('erroEmail');
                        $this->session->unset_userdata('erroEmail');
                    }
                    ?>
                    <div class="form_cadastro_medico">

                        <div class="container_item_form">
                            <label>Descrição CNPJ: </label>
                            <input type="text" class="default_text_input required" name="nomeInstituicao" size=45 maxlength=45 tabIndex ="1" />
                        </div>
                        <div class="container_item_form">                            
							<label>Responsavel: </label>
							<input type="text" class="default_text_input required" name="responsavelInstituicao" size=12 maxlength=60 tabIndex ="6" />
                        </div>								
                        <div class="container_item_form">
                            <label>Email: </label>
                            <input type="text" class="default_text_input required"  name="emailInstituicao" size=60 maxlength=60 tabIndex ="10" />
                        </div>		
                        <div class="container_item_form">
                            <label>Senha: </label>
                            <input type="password" class="default_text_input required" name="senhaInstituicao" size=12 maxlength=12 tabIndex ="12" />
                        </div>
						<div class="container_item_form">
                            <label>Endereço: </label>
                            <input type="text" class="default_text_input required" name="enderecoInstituicao" size=12 maxlength=60 tabIndex ="14" />
                        </div>	
						<div class="container_item_form">
                            <div class="container_tiny_item">
                                <label>Numero: </label>
                                <input type="text" class="default_text_input required" name="end_numeroInstituicao" size=12 maxlength=12 tabIndex ="17" />
                            </div>

                            <div class="container_small_item">
                                <label>Complemento: </label>
                                <input type="text" class="default_text_input required" name="complementoInstituicao" size=12 maxlength=60 tabIndex ="18" />
                            </div>
                        </div>			
                    </div>
                    <div class="form_cadastro_medico">
                        <div class="container_item_form">
                            <label>CNPJ: </label>
                            <input type="text" class="default_text_input required" name="cnpjInstituicao" size=11 maxlength=18 tabIndex ="2" OnKeyPress="formatar('##.###.###/####-##', this)" /> 
                        </div>
                        <div class="container_item_form">
                            <div class="container_small_item">
                                <label>Telefone: </label>
                                <input type="text" class="default_small_text_input" name="telefoneInstituicao" size=12 maxlength=12 tabIndex ="8" OnKeyPress="formatar('##-####-####', this)" />
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
                            <input type="text" class="default_text_input required"  name="emailConfirmeInstituicao" size=60 maxlength=60 tabIndex ="11" />
                        </div>		
                        <div class="container_item_form">
                            <label>Confirmar Senha: </label>
                            <input type="password" class="default_text_input required" name="senhaConfirmeInstituicao" size=12 maxlength=12 tabIndex ="13" />
                        </div>
						<div class="container_item_form">
							<div class="container_small_item">
								<label>Bairro: </label>
								<input type="text" class="default_text_input required" name="bairroInstituicao" size=12 maxlength=40 tabIndex ="15" />
							 </div>
							 <div class="container_tiny_item">
								<label>CEP: </label>
								<input type="text" class="default_text_input required" name="cepInstituicao" size=12 maxlength=10 tabIndex ="16" OnKeyPress="formatar('##.###-###', this)" />
							 </div>
						</div>
						<div class="container_item_form">
							<div class="container_small_item">
								<label>Cidade: </label>
								<input type="text" class="default_text_input required" name="cidadeInstituicao" size=12 maxlength=40 tabIndex ="19" />
							 </div>
							 <div class="container_tiny_item">
								<label>Estado</label>
								<select name="ufInstituicao" tabIndex ="20">
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
                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" tabIndex ="20" value="Inserir" />
                           <a href="<?php echo base_url() ?>" class="input_cancel" tabIndex ="21">Cancelar</a>
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