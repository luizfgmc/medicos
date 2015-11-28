<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">

            <form action="<?php echo base_url() ?>instituicao/solicitarConsultaSalvar" method="post">
                <div class="halfSize">
                    <h2>Solicitação</h2>
                    <div class="container_item_form">
                        <label> Solicitante: </label>
                        <input type="text" id="solicitante" name="solicitante"/>
                    </div>
                    <div class="container_item_form">
                        <label> Descricao: </label>
                        <input type="text"  id="descricao" name="descricao"/>
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
                    <input type="hidden" name ="id_agenda" value="<?= $query['idAgenda'] ?>"/>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" value="Solicitar"/>
                        <button type="button" class="input_cancel">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

