<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<section class="mainContent">
    <div class="containerCenter fullSiteSize">
        <form method="post" action="<?php echo base_url() ?>medico/salvaEditaMedica/">
            <section class="cadastro_medico">
                <div class="container_form_medico">
                    <h2>Editar Médico</h2>
                    <div class="form_cadastro_medico">
                        <input type="hidden" name="idMedico" value="<?= $infoMedico->id; ?>" />
                        <div class="container_item_form">
                            <label>Nome</label>

                            <input type="text" name="nomeMedico" value="<?= $infoMedico->nome; ?>"  class="default_text_input" />

                        </div>
                        <div class="container_item_form">
                            <label>CPF</label>

                            <input type="text" name="cpfMedico" value="<?= $infoMedico->cpf; ?>"  class="default_text_input" />

                        </div>
                        <div class="container_item_form">
                            <label>Número CRM</label>

                            <input type="text" name="numeroCRM" value="<?= $infoMedico->crm; ?>"  class="default_text_input" />

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

                            <input type="text" name="telefoneMedico" value="<?= $infoMedico->telefone; ?>"  class="default_text_input"  />

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
                            <button type="button" class="input_cancel">Cancelar</button>
                        </div>	
            </section>

        </form>
    </div>
</section>
