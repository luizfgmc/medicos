<html>
    <head></head>
    <body>
        <section class="formCadastroPacientes">
            <form method="post" action="<?php echo base_url() ?>paciente/inserePaciente/">
                <div class="itemFormCadastroPacientes">
                    <label>Nome</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="nomePaciente" />
                    </div>
                </div>
               <div class="itemFormCadastroPacientes">
                    <label>Telefone</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="telefonePaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cpf</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cpfPaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Endereço</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="enderecoPaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Estado</label>
                    <div class="campoCadastroPaciente">
                        <select name="ufPaciente">
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
                <div class="itemFormCadastroPacientes">
                    <label>Numero</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="numeroPaciente" />
                    </div>
                </div>					
        	
                <div class="itemFormCadastroPacientes">
                    <label>Complemento</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="complementoPaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Bairro</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="bairroPaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cidade</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cidadePaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <label>Cep:</label>
                    <div class="campoCadastroPaciente">
                        <input type="text" name="cepPaciente" />
                    </div>
                </div>
                <div class="itemFormCadastroPacientes">
                    <div class="campoCadastroPaciente">
                        <input type="submit"  value="confirmar" />
                    </div>
                </div>	
            </form>
        </section>
    </body>
</html>