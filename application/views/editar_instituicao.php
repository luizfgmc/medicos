<html>
    <head></head>
    <body>
        <section class="formCadastroInstituicoes">
            <form method="post" action="<?php echo base_url() ?>instituicao/editarSalvarInstituicao/<?=$query[0]->id?>">
                <div class="itemFormCadastroClinicas">
                    <label>Nome</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="nomeInstituicao" value="<?=$query[0]->nome ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cnpj</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cnpjInstituicao" value="<?=$query[0]->cnpj ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Responsavel</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="responsavelInstituicao" value="<?=$query[0]->responsavel ?>" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Endereço</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="enderecoInstituicao" value="<?=$query[0]->endereco ?>" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Numero</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="end_numeroInstituicao" value="<?=$query[0]->end_numero ?>" />
                    </div>
                </div>
                

                <div class="itemFormCadastroInstituicoes">
                    <label>Estado</label>
                    <div class="campoCadastroInstituicao">
                        <select name="ufInstituicao">
                            <option><?=$query[0]->uf ?></option>
                           
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
                <div class="itemFormCadastroInstituicoes">
                    <label>Numero</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="numeroInstituicao" value="<?=$query[0]->end_numero ?>" />
                    </div>
                </div>					
        	
                <div class="itemFormCadastroInstituicoes">
                    <label>Complemento</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="complementoInstituicao" value="<?=$query[0]->complemento ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Bairro</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="bairroInstituicao" value="<?=$query[0]->bairro ?>"  />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cidade</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cidadeInstituicao" value="<?=$query[0]->cidade ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cep:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cepInstituicao" value="<?=$query[0]->cep ?>" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Status:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="statusInstituicao"  value="<?=$query[0]->status ?>"/>
                    </div>
                </div>

                <div class="itemFormCadastroInstituicoes">
                    <label>Telefone:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="telefoneInstituicao" value="<?=$query[0]->telefone ?>" />
                    </div>
                </div>

                <div class="itemFormCadastroInstituicoes">
                    <div class="campoCadastroInstituicao">
                        <input type="submit"  value="confirmar" />
                    </div>
                </div>	
            </form>
        </section>
    </body>
</html>