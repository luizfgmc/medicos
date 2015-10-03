<html>
    <head></head>
    <body>



        <section class="formCadastroMedicos">
            <form method="post" action="<?php echo base_url() ?>clinica/editarClinicaSalvar/<?=$query[0]->id?>">
                <div class="itemFormCadastroClinicas">
                    <label>Nome</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="nomeClinica" value="<?=$query[0]->nome;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Telefone</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="telefoneClinica" value=" <?=$query[0]->telefone;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Endereço/label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="enderecoClinica" value="<?=$query[0]->endereco;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Estado</label>
                    <div class="campoCadastroClinica">
                        <select name="ufClinica">
                            <option ><?=$query[0]->uf;?></option>
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
                        <input type="text" name="numeroClinica" value="<?=$query[0]->end_numero;?>" />
                    </div>
                </div>                  
            
                <div class="itemFormCadastroClinicas">
                    <label>Complemento</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="complementoClinica" value="<?=$query[0]->end_complemento;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Bairro</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="bairroClinica" value="<?=$query[0]->bairro;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Cidade</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="cidadeClinica" value="<?=$query[0]->cidade;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroClinicas">
                    <label>Cep:</label>
                    <div class="campoCadastroClinica">
                        <input type="text" name="cepClinica" value="<?=$query[0]->cep;?>" />
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