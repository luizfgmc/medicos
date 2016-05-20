<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/paciente/paciente.css" />
<section class="formCadastroPacientes">
    <form method="post" id="formPaciente" action="<?php echo base_url(); ?>feedback/salva_feedback">
        <section class="cadastro_paciente">
            <div class="containerCenter fullSiteSize">
                <div class="halfSize">

                    <div class="container_form_paciente">
                        <h2>Feedback Consulta</h2>
                        <input type="hidden" value="<?php echo  $id_solicitacao; ?>" name="id_solicitacao" >
                        <div class="form_cadastro_paciente default_text_input required">
                            <label> <b>Ranking</b></label>
                            <div class="container_item_form">
                                <select name="ranking">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="container_textarea_form">
                                <br />
                                <label> <b>Comentário</b></label>
                                <textarea class="container_item_form default_text_input textareaFeedback required" name="observacao"></textarea>
                            </div>
                            <div class="container_submit">
                                <input type="submit" class="input_submit" tabindex="14" value="Salvar">
                                <a href="http://localhost/medicos/instituicao/" class="input_cancel">Cancelar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>

</section>
