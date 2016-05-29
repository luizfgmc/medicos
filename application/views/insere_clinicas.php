<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <form method="post" action="<?php echo base_url() ?>clinica/insereClinica/" id="formClinica">
                <div class="halfSize">
                    <h2>Cadastrar Clinica</h2>
                    <div class="container_item_form">
                        <label>Nome</label>
                        <input type="text" class="default_text_input required" name="nomeClinica" size=45 maxlength=45/>            
                    </div>
                    <div class="container_item_form">
                        <label>Telefone</label>
                        <input type="text" class="default_text_input required" name="telefoneClinica" size=12 maxlength=12 OnKeyPress="formatar('##-####-####', this)"/>
                    </div>
                    <div class="container_item_form">
                        <label>Cep:</label>
                        <input type="text" class="default_text_input required" name="cepClinica" id="cep" size=08 maxlength=10 OnKeyPress="formatar('##.###-###', this)"/>
                    </div>
                    <div class="container_item_form">
                        <label>Endereço</label>
                        <input type="text" class="default_text_input required" name="enderecoClinica" id="logradouro" size=60 maxlength=60/>
                    </div>
                    <div class="container_item_form">
                        <label>Numero</label>
                        <input type="text" class="default_text_input required" name="numeroClinica" id = "numero" size=06 maxlength=06/>
                    </div>                  
                    <div class="container_item_form">
                        <label>Complemento</label>
                        <input type="text"  name="complementoClinica" id="complemento" size=15 maxlength=15/>
                    </div>
                    <div class="container_item_form">
                        <label>Bairro</label>
                        <input type="text" class="default_text_input required" name="bairroClinica" id="bairro" size=45 maxlength=45/>
                    </div>
                    <div class="container_item_form">
                        <label>Cidade</label>
                        <input type="text" class="default_text_input required" name="cidadeClinica" id="cidade" size=45 maxlength=45 />
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
                    <div class="container_submit">
                        <input type="submit" class="input_submit" value="Inserir"/>
                        <button type="button" class="input_cancel">Cancelar</button>
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