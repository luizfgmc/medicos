<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/paciente/paciente.css" />
<section class="mainContent">
    <section class="formCadastroPacientes">


        <form method="post" action="<?php echo base_url() ?>paciente/inserePaciente/">
            <section class="cadastro_paciente">
                <div class="containerCenter fullSiteSize">
                    <div class="halfSize">

                        <div class="container_form_paciente">
                        <h2>Editar de Paciente</h2>
                        <div class="form_cadastro_paciente">

                            <div class="container_item_form">
                                <label>Nome</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="nomePaciente" value="<?= $query[0]->nome ?>" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Telefone</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="telefonePaciente" value="<?= $query[0]->telefone ?>" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Cpf</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="cpfPaciente" value="<?= $query[0]->cpf ?>" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Cep:</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="cepPaciente" value="<?= $query[0]->cep ?>" id="cep" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Endereço</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="enderecoPaciente" value="<?= $query[0]->endereco ?>" id="logradouro" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Estado</label>
                                <div class="campoCadastroPaciente">
                                    <select name="ufPaciente">
                                        <option ><?= $query[0]->uf ?></option>
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
                                    <input type="text" name="numeroPaciente" value="<?= $query[0]->end_numero ?>" />
                                </div>
                            </div>					

                            <div class="container_item_form">
                                <label>Complemento</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="complementoPaciente" value="<?= $query[0]->complemento ?>" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Bairro</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="bairroPaciente" value="<?= $query[0]->bairro ?>" id="bairro" />
                                </div>
                            </div>
                            <div class="container_item_form">
                                <label>Cidade</label>
                                <div class="campoCadastroPaciente">
                                    <input type="text" name="cidadePaciente" value="<?= $query[0]->cidade ?>" id="cidade" />
                                </div>
                            </div>

                            <div class="container_submit">
                                <input type="submit"  value="confirmar" class="input_submit" />
                                <button type="button" class="input_cancel">Cancelar</button>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>

    </section>

</section>