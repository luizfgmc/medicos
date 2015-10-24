<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <?php echo validation_errors(); ?>
            <section class="formCadastroInstituicoes">

                <form method="post" action="<?php echo base_url() ?>instituicao/insereInsituicao/">
                    <div class="halfSize">
                        <div class="container_form_medico">
                            <h2>Cadastrar Instituição</h2>
                            <div class="form_cadastro_medico">
                                <div class="itemFormCadastroClinicas">
                                    <label>Nome</label>
                                    <div class="container_item_form">
                                        <input type="text" name="nomeInstituicao" />
                                    </div>
                                </div>
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Cnpj</label>
                                    <div class="container_item_form">
                                        <input type="text" name="cnpjInstituicao" />
                                    </div>
                                </div>
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Responsavel</label>
                                    <div class="container_item_form">
                                        <input type="text" name="responsavelInstituicao" />
                                    </div>
                                </div>

                                <div class="itemFormCadastroInstituicoes">
                                    <label>Endereço</label>
                                    <div class="container_item_form">
                                        <input type="text" name="enderecoInstituicao" />
                                    </div>
                                </div>

                                <div class="itemFormCadastroInstituicoes">
                                    <label>Numero</label>
                                    <div class="container_item_form">
                                        <input type="text" name="end_numeroInstituicao" />
                                    </div>
                                </div>


                                <div class="itemFormCadastroInstituicoes">
                                    <label>Estado</label>
                                    <div class="container_item_form">
                                        <select name="ufInstituicao">
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
                            <div class="form_cadastro_medico">
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Numero</label>
                                    <div class="container_item_form">
                                        <input type="text" name="numeroInstituicao" />
                                    </div>
                                </div>					

                                <div class="itemFormCadastroInstituicoes">
                                    <label>Complemento</label>
                                    <div class="container_item_form">
                                        <input type="text" name="complementoInstituicao" />
                                    </div>
                                </div>
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Bairro</label>
                                    <div class="container_item_form">
                                        <input type="text" name="bairroInstituicao" />
                                    </div>
                                </div>
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Cidade</label>
                                    <div class="container_item_form">
                                        <input type="text" name="cidadeInstituicao" />
                                    </div>
                                </div>
                                <div class="itemFormCadastroInstituicoes">
                                    <label>Cep:</label>
                                    <div class="container_item_form">
                                        <input type="text" name="cepInstituicao" />
                                    </div>
                                </div>

                                <div class="itemFormCadastroInstituicoes">
                                    <label>Status:</label>
                                    <div class="container_item_form">
                                        <input type="text" name="statusInstituicao" />
                                    </div>
                                </div>

                                <div class="itemFormCadastroInstituicoes">
                                    <label>Telefone:</label>
                                    <div class="container_item_form">
                                        <input type="text" name="telefoneInstituicao" />
                                    </div>
                                </div>
                            </div>
                        <div class="container_submit">
                            <input type="submit" class="input_submit" />
                            <button type="button" class="input_cancel">Cancelar</button>
                        </div>	
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </section>
</section>
