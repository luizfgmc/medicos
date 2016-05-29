<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors();
if(!empty($query['idAgenda']->id) ){
    ?>
    <section class="mainContent">
        <section class="cadastro_medico">
            <div class="containerCenter fullSiteSize">
                <form action="<?php echo base_url() ?>medico/solicitarConsultaSalvar" method="post"
                  id="formSolicitaConsulta">
                  <div class="halfSize">
                    <h2>Solicitação</h2>
                    <div class="container_item_form">
                        <label> Solicitante: </label>
                        <input type="text" class="default_text_input required" id="solicitante" name="solicitante"
                        size=45 maxlength=45/>
                    </div>
                    <div class="container_item_form">
                        <label> Descricao: </label>
                        <input type="text" class="default_text_input required" id="descricao" name="descricao"
                        size=45 maxlength=45/>
                    </div>
                    <div class="container_item_form">
                        <label> data da consulta: </label>
                        <input type="text" class="default_text_input required" id="data_agendamento"
                        name="data_agendamento">
                    </div>
                    <div class="container_item_form">
                        <label> hora da consulta: </label>
                        <input type="text" class="default_text_input required" id="hora_agendamento"
                        name="hora_agendamento">
                    </div>
                    <div class="container_item_form">
                        <select name="paciente" id="paciente">
                            <?php
                            foreach ($query['pacientes'] as $k) {
                                foreach ($k as $y) {
                                    ?>

                                    <option value="<?= $y->id ?>"><?= $y->nome_paciente ?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_agenda" value="<?= $query['idAgenda']->id ?>"/>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" value="Solicitar"/>
                        <a href="<?php echo base_url() ?>instituicao/" class="input_cancel">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</form>
</div>
</section>
</section>
<?php
}
else
{
    ?>
    <div class="marginSolicitacao">
        <div class="erroSolicitacao">
            Você não tem agenda marcada.
        </div>
    </div>
    <?php

}
?>
<script>
    $(document).on('submit', '#formSolicitaConsulta', function(e) {
        verifica_campos('#formSolicitaConsulta', e);
    });
</script>