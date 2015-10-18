<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<section class="mainContent">



        <section class="cadastro_medico">
            <div class="containerCenter fullSiteSize">
                <form method="post" action="<?php echo base_url() ?>clinica/insereClinica/">
                    <div class="halfSize">
                        <h2>Cadastrar Clinica</h2>
                        <div class="container_item_form">
                            <label>Nome</label>
                            <input type="text" name="nomeClinica" />            
                        </div>
                        <div class="container_item_form">
                            <label>Telefone</label>
                            <input type="text" name="telefoneClinica" />
                        </div>
                        <div class="container_item_form">
                            <label>Endereço</label>
                            <input type="text" name="enderecoClinica" />
                        </div>
                        <div class="container_item_form">
                            <label>Estado</label>
                            <select name="ufClinica">
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
                        <div class="container_item_form">
                            <label>Numero</label>
                            <input type="text" name="numeroClinica" />
                        </div>					

                        <div class="container_item_form">
                            <label>Complemento</label>
                            <input type="text" name="complementoClinica" />
                        </div>
                        <div class="container_item_form">
                            <label>Bairro</label>
                            <input type="text" name="bairroClinica" />
                        </div>
                        <div class="container_item_form">
                            <label>Cidade</label>
                            <input type="text" name="cidadeClinica" />
                        </div>
                        <div class="container_item_form">
                            <label>Cep:</label>
                            <input type="text" name="cepClinica" />
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