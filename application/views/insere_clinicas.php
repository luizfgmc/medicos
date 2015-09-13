<html>
    <head></head>
    <body>
        <section class="formCadastroMedicos">
            <form method="post" action="<?php echo base_url() ?>clinica/insereClinica/">
                <div class="itemFormCadastroClinicas">
                    <label>Nome</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="nomeClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Telefone</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="telefoneClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Endereço/label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="enderecoClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Estado</label>
                    <div class="campoCadastroClinica">
                        <select name="ufClinica">
                            <option >Selecione</option>
                            <?php 
                                foreach($estados as $estado):
                            ?>
                            <option value="<?=$estado->uf ?>"><?=$estado->uf ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>	
                <div class="itemFormCadastroClinicas">
                    <label>Numero</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="numeroClinica" />
                    </div>
                </div>					
        	
                <div class="itemFormCadastroClinicas">
                    <label>Complemento</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="complementoClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Bairro</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="bairroClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Cidade</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="cidadeClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Cep:</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="cepClinica" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <div class="campoCadastroClinica">
                        <input type="submit"  value="confirmar" />
                    </div>
                </div>	
            </form>
        </section>
    </body>
</html>