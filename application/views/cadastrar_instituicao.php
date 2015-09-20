<html>
    <head></head>
    <body>
        <section class="formCadastroInstituicoes">
            <form method="post" action="<?php echo base_url() ?>instituicao/insereInsituicao/">
                <div class="itemFormCadastroClinicas">
                    <label>Nome</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="nomeInstituicao" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cnpj</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cnpjInstituicao" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Responsavel</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="responsavelInstituicao" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Endereço</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="enderecoInstituicao" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Numero</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="end_numeroInstituicao" />
                    </div>
                </div>
                

                <div class="itemFormCadastroInstituicoes">
                    <label>Estado</label>
                    <div class="campoCadastroInstituicao">
                        <select name="ufInstituicao">
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
                <div class="itemFormCadastroInstituicoes">
                    <label>Numero</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="numeroInstituicao" />
                    </div>
                </div>					
        	
                <div class="itemFormCadastroInstituicoes">
                    <label>Complemento</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="complementoInstituicao" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Bairro</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="bairroInstituicao" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cidade</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cidadeInstituicao" />
                    </div>
                </div>
                <div class="itemFormCadastroInstituicoes">
                    <label>Cep:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="cepInstituicao" />
                    </div>
                </div>

                 <div class="itemFormCadastroInstituicoes">
                    <label>Status:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="statusInstituicao" />
                    </div>
                </div>

                <div class="itemFormCadastroInstituicoes">
                    <label>Telefone:</label>
                    <div class="campoCadastroInstituicao">
                        <input type="text" name="telefoneInstituicao" />
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