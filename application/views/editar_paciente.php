<html>
    <head></head>
    <body>
        <section class="formCadastroPacientes">
            <form method="post" action="<?php echo base_url()?>paciente/editarSalvarPaciente/<?=$query[0]->id?>">
                <div class="itemFormCadastroPacientes">
                    <label>Nome</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="nomePaciente" value="<?=$query[0]->nome ?>" />
                    </div>
                </div>
               <div class="itemFormCadastroPacientes">
                    <label>Telefone</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="telefonePaciente" value="<?=$query[0]->telefone ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cpf</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cpfPaciente" value="<?=$query[0]->cpf ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Endereço</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="enderecoPaciente" value="<?=$query[0]->endereco ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Estado</label>
                    <div class="campoCadastroPaciente">
                        <select name="ufPaciente">
                            <option ><?=$query[0]->uf ?></option>
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
                <div class="itemFormCadastroPacientes">
                    <label>Numero</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="numeroPaciente" value="<?=$query[0]->end_numero ?>" />
                    </div>
                </div>					
        	
                <div class="itemFormCadastroPacientes">
                    <label>Complemento</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="complementoPaciente" value="<?=$query[0]->complemento ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Bairro</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="bairroPaciente" value="<?=$query[0]->bairro ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cidade</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cidadePaciente" value="<?=$query[0]->cidade ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cep:</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cepPaciente" value="<?=$query[0]->cep ?>" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <div class="campoCadastroPaciente">
                        <input type="submit"  value="confirmar"/>
                    </div>
                </div>	
            </form>
        </section>
    </body>
</html>