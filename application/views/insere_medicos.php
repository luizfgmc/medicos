<html>
    <head></head>
    <body>
        <section class="formCadastroMedicos">
            <form method="post" action="<?php echo base_url() ?>medico/insereMedico/">
                <div class="itemFormCadastroMedicos">
                    <label>Nome</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="nomeMedico" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>CPF</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="cpfMedico" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Número CRM</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="numeroCRM" />
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
                            <option value="<?=$estado->id ?>"><?=$estado->uf ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>	
                <div class="itemFormCadastroMedicos">
                    <label>Telefone</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="telefoneMedico" />
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
                            <option value="<?=$especialidade->id ?>"><?=$especialidade->descricao ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>	
                <div class="itemFormCadastroMedicos">
                    <label>E-mail</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="emailMedico" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Confirme seu e-mail</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="emailConfirmeMedico" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Senha</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="senhaMedico" />
                    </div>
                </div>
                <div class="itemFormCadastroMedicos">
                    <label>Confirme sua senha</label>
                    <div class="campoCadastroMedico">
                        <input type="text" name="senhaConfirmeMedico" />
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