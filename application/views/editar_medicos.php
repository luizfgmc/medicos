<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <h2>Editar Médico</h2>
           <div>    
                <label> Obter codigo para disponiblizar agendas </label><br/>
                <input type="text" name="hash" id="hash" value="<?= $infoMedico->chave_consulta; ?>" />
                <input type="button" name="gerar_hash" id="gerar_hash" onclick="gerar_hash();" value="Obter Codigo"></button>
           </div>
            <form method="post" action="<?php echo base_url() ?>medico/salvaEditaMedica/" id="formEditaMedico">
                <div class="halfSize">
                    <div class="container_form_medico">
                      <div class="form_cadastro_medico">
                          <div class="container_item_form ">
                              <label> Ranking: <?php echo number_format($rankingMedico->ranking, 2, ',', ' ') ; ?> </label>
                          </div>

                            <input type="hidden" name="idMedico" value="<?= $infoMedico->id; ?>" />
                            <div class="container_item_form">
                                <label>Nome</label>

                                <input type="text" name="nomeMedico" value="<?= $infoMedico->nome_medico; ?>"  class="default_text_input required"  size=45 maxlength=45/>

                            </div>
                            <div class="container_item_form">
                                <label>Número CRM</label>

                                <input type="text" name="numeroCRM" value="<?= $infoMedico->crm; ?>" class="default_text_input required" size=10 maxlength=10/>

                            </div>
                            <div class="container_item_form">
                                <label>Estado CRM</label>

                                <select name="crmUF">
                                    <option >Selecione</option>
                                    <?php
                                    foreach ($estados as $estado):
                                        ?>
                                        <option <?php
                                        if ($estado->uf == $infoMedico->crm_uf) {
                                            echo "selected";
                                        }
                                        ?> value="<?= $estado->uf ?>"><?= $estado->uf ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                </select>

                            </div>	
                            <div class="container_item_form">
                                <label>Telefone</label>
                                <input type="text" name="telefoneMedico" value="<?= mascara_string("##-####-####",$infoMedico->telefone); ?>"  class="default_text_input required" size=12 maxlength=12  OnKeyPress="formatar('##-####-####', this)" />
                            </div>					
                            <div class="container_item_form">
                                <label>Especialidade</label>

                                <select name="especialidadeMedico">
                                    <option >Selecione</option>
                                    <?php
                                    foreach ($especialidades as $especialidade):
                                        ?>
                                        <option <?php
                                        if ($especialidade->id == $infoMedico->especialidade_id) {
                                            echo "selected";
                                        }
                                        ?> value="<?= $especialidade->id ?>"><?= $especialidade->descricao ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                </select>

                            </div>	


                        </div>

                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" />
                        <a href="<?php echo base_url() ?>medico/solicitacoes/" class="input_cancel">Cancelar</a>
                    </div>	

                </div>
            </form>
        </div>
    </section>
</section>
<script>
    $(document).on('submit', '#formEditaMedico', function(e) {
        verifica_campos('#formEditaMedico', e);
    });
</script>