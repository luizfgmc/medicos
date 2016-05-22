<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/paciente/paciente.css" />
<section class="mainContent">
    <section class="formCadastroPacientes">


        <form method="post" id="formPaciente" action="<?php echo base_url() ?>paciente/inserePaciente/">
            <section class="cadastro_paciente">
                <div class="containerCenter fullSiteSize">
                    <div class="halfSize">

                        <div class="container_form_paciente">
                            <h2>Cadastro de Paciente</h2>
                            <div class="form_cadastro_paciente">
                                <div class="container_item_form">
                                    <label>Nome</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="nomePaciente"  class="default_text_input required" size=45 maxlength=45 />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Telefone</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="telefonePaciente"  class="default_text_input required" size=12 maxlength=12 OnKeyPress="formatar('##.####.####', this)" />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Cpf</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="cpfPaciente"  class="default_text_input required"  size=14 maxlength=14 OnKeyPress="formatar('###.###.###.##', this)" />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Cep:</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="cepPaciente" class="default_text_input required" id="cep" size=09 maxlength=09 OnKeyPress="formatar('#####.###', this)"/>
                                    </div>
                                </div>

                                <div class="container_item_form">
                                    <label>Endereço</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="enderecoPaciente" class="default_text_input required" id="logradouro" size=60 maxlength=60 />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Estado</label>
                                    <div class="campoCadastroPaciente">
                                        <select name="ufPaciente">
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
                                    <label>Numero</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="numeroPaciente" class="default_text_input required" />
                                    </div>
                                </div>					

                                <div class="container_item_form">
                                    <label>Complemento</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="complementoPaciente" class="default_text_input" />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Bairro</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="bairroPaciente" class="default_text_input required" id="bairro" />
                                    </div>
                                </div>
                                <div class="container_item_form">
                                    <label>Cidade</label>
                                    <div class="campoCadastroPaciente">
                                        <input type="text" name="cidadePaciente" class="default_text_input required" id="cidade"  />
                                    </div>
                                </div>

                                <div class="container_submit">
                                    <input type="submit" class="input_submit" value="Inserir"/>
                            <a href="<?php echo base_url() ?>" class="input_cancel">Cancelar</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>

    </section>

</section>

<script>
    $(document).on('submit', '#formPaciente', function(e) {
        verifica_campos('#formPaciente', e);
    });
</script>