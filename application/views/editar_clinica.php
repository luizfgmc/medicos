<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <form method="post" action="<?php echo base_url() ?>clinica/editarClinicaSalvar/<?= $query[0]->id ?>" id="formClinica">
                <div class="halfSize">
                    <h2>Editar Clinica</h2>
					<?php
                    if ($this->session->userdata('erroEmail')) {
                        echo $this->session->userdata('erroEmail');
                        $this->session->unset_userdata('erroEmail');
                    }
                    ?>
                    <div class="container_item_form">
                        <label>Nome</label>
                        <input type="text" class="default_text_input required" name="nomeClinica" value="<?= $query[0]->nome; ?>" size=45 maxlength=45 />
                    </div>
                    <div class="container_item_form">
                        <label>Telefone</label>
                        <input type="text" class="default_text_input required" name="telefoneClinica" value=" <?= mascara_string("##-####-####",$query[0]->telefone); ?>" size=12 maxlength=12 OnKeyPress="formatar('##-####-####', this)" />
                    </div>
                    <div class="container_item_form">
                        <label>Cep:</label>
                        <input type="text" class="default_text_input required" name="cepClinica" value="<?=mascara_string("##.###-###",$query[0]->cep); ?>" size=10 maxlength=10 OnKeyPress="formatar('##.###.###', this)"/>
                    </div>
                    <div class="container_item_form">
                        <label>Endereço</label>
                        <input type="text" class="default_text_input required" name="enderecoClinica" value="<?= $query[0]->endereco; ?>" size=60 maxlength=60 />
                    </div>
                    <div class="container_item_form">
                        <label>Numero</label>
                        <input type="text" class="default_text_input required" name="numeroClinica" value="<?= $query[0]->end_numero; ?>" size=06 maxlength=06 />
                    </div>                  

                    <div class="container_item_form">
                        <label>Complemento</label>
                        <input type="text" name="complementoClinica" value="<?= $query[0]->end_complemento; ?>" size=45 maxlength=45 />
                    </div>
                    <div class="container_item_form">
                        <label>Bairro</label>
                        <input type="text" class="default_text_input required" name="bairroClinica" value="<?= $query[0]->bairro; ?>" size=45 maxlength=45 />
                    </div>
                    <div class="container_item_form">
                        <label>Cidade</label>
                        <input type="text" class="default_text_input required" name="cidadeClinica" value="<?= $query[0]->cidade; ?>" size=45 maxlength=45 />
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
$(document).on('submit', '#formClinica', function(e) {
    verifica_campos('#formClinica', e);
});
</script>