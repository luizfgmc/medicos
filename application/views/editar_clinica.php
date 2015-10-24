<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<section class="mainContent">



    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <form method="post" action="<?php echo base_url() ?>clinica/editarClinicaSalvar/<?= $query[0]->id ?>">
                <div class="halfSize">
                    <h2>Editar Clinica</h2>
                    <div class="container_item_form">
                        <label>Nome</label>
                            <input type="text" name="nomeClinica" value="<?= $query[0]->nome; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Telefone</label>
                            <input type="text" name="telefoneClinica" value=" <?= $query[0]->telefone; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Endereço</label>
                                <input type="text" name="enderecoClinica" value="<?= $query[0]->endereco; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Estado</label>
                            <select name="ufClinica">
                                <option ><?= $query[0]->uf; ?></option>
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
                        <label>Numero</label>
                            <input type="text" name="numeroClinica" value="<?= $query[0]->end_numero; ?>" />
                    </div>                  

                    <div class="container_item_form">
                        <label>Complemento</label>
                            <input type="text" name="complementoClinica" value="<?= $query[0]->end_complemento; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Bairro</label>
                            <input type="text" name="bairroClinica" value="<?= $query[0]->bairro; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Cidade</label>
                            <input type="text" name="cidadeClinica" value="<?= $query[0]->cidade; ?>" />
                    </div>
                    <div class="container_item_form">
                        <label>Cep:</label>
                            <input type="text" name="cepClinica" value="<?= $query[0]->cep; ?>" />
                    </div>
                    <div class="container_submit">
                        <input type="submit" class="input_submit" />
                        <button type="button" class="input_cancel">Cancelar</button>
                    </div>	
                </div>
            </form>
        </div>

    </section>


</section>