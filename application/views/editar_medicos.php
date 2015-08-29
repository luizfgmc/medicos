<html>
    <head></head>
    <body>
        <section class="formCadastroMedicos">
            <form method="post" action="<?php echo base_url() ?>medico/salvaEditaMedica/">
                <input type="hidden" name="idMedico" value="<?=$infoMedico->id;?>" />
                <div class="itemFormCadastroMedicos">
                    <label>Nome</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="nomeMedico" value="<?=$infoMedico->nome;?>" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>CPF</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="cpfMedico" value="<?=$infoMedico->cpf;?>"/>
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Número CRM</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="numeroCRM" value="<?=$infoMedico->crm;?>"/>
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Estado CRM</label>
                    <div class="campoCadastroMedico">
                        <select name="crmUF">
                            <option >Selecione</option>
                            <?php 
                                foreach($estados as $estado):
                            ?>
                            <option <?php if($estado->uf==$infoMedico->crm_uf){echo "selected";} ?> value="<?=$estado->uf ?>"><?=$estado->uf ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>	
                <div class="itemFormCadastroMedicos">
                    <label>Telefone</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="telefoneMedico" value="<?=$infoMedico->telefone;?>" />
                    </div>
                </div>					
                <div class="itemFormCadastroMedicos">
                    <label>Especialidade</label>
                    <div class="campoCadastroMedico">
                        <select name="especialidadeMedico">
                            <option >Selecione</option>
                            <?php 
                                foreach($especialidades as $especialidade):
                            ?>
                            <option <?php if($especialidade->id==$infoMedico->especialidade_id){echo "selected";} ?> value="<?=$especialidade->id ?>"><?=$especialidade->descricao ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>	
                <div class="itemFormCadastroMedicos">
                    <div class="campoCadastroMedico">
                        <input type="submit"  value="confirmar" />
                    </div>
                </div>	
            </form>
        </section>
    </body>
</html>