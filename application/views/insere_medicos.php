<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
        <a href="<?php echo base_url()?>clinica/listaClinicas"> Clinicas </a>
        <a href="<?php echo base_url()?>instituicao/instituicoes"> Instituicoes </a>
        <?php echo validation_errors(); ?>
		<section class="mainContent">
                    <div class="containerCenter fullSiteSize">
                        <form method="post" action="<?php echo base_url() ?>medico/insereMedico/">
                            <section class="cadastro_medico">
                                <div class="container_form_medico">
                                    <h2>Cadastro Médico</h2>

                                        <div class="form_cadastro_medico">
                                            <div class="container_item_form">
                                               <label>Nome</label>
                                               <div class="campoCadastroMedico">
                                                   <input type="text" name="nomeMedico" class="default_text_input" />
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
                                            <div class="container_item_form">
                                               <label>Telefone</label>
                                               <div class="campoCadastroMedico">
                                                   <input type="text" name="telefoneMedico" class="default_text_input" />
                                               </div>
                                           </div>
                                            <div class="container_item_form">
                                               <label>E-mail</label>
                                               <div class="campoCadastroMedico">
                                                   <input type="text" name="emailMedico" class="default_text_input" />
                                               </div>
                                           </div>
                                        <div class="container_item_form">
                                           <label>Senha</label>
                                           <div class="campoCadastroMedico">
                                               <input type="text" name="senhaMedico" class="default_text_input" />
                                           </div>
                                       </div>
                                       <div class="container_item_form">
                                           <label>Confirme seu e-mail</label>
                                           <div class="campoCadastroMedico">
                                               <input type="text" name="emailConfirmeMedico" />
                                           </div>
                                       </div>     
                                      </div>
                                        <div class="form_cadastro_medico">
                                            <div class="container_item_form">
                                               <label>CPF</label>
                                               <div class="campoCadastroMedico">
                                                   <input type="text" name="cpfMedico" />
                                               </div>
                                           </div>

                                       <div class="container_item_form">
                                           <label>Número CRM</label>
                                           <div class="campoCadastroMedico">
                                               <input type="text" name="numeroCRM" />
                                           </div>
                                       </div>
                                       <div class="container_item_form">
                                           <label>Estado CRM</label>
                                           <div class="campoCadastroMedico">
                                               <select name="crmUF">
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
                                       <div class="container_item_form">
                                           <label>Telefone</label>
                                           <div class="campoCadastroMedico">
                                               <input type="text" name="telefoneMedico" />
                                           </div>
                                       </div>					
                                       <div class="container_item_form">
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
                                        <div class="container_item_form">
                                           <label>Confirme sua senha</label>
                                           <div class="campoCadastroMedico">
                                               <input type="text" name="senhaConfirmeMedico" />
                                           </div>
                                       </div>
                                   </div>
                                        <div class="container_submit">
                                            <input type="submit" class="input_submit">
                                            <button type="button" class="input_cancel">Cancelar</button>
                                        </div>

                                </div>
                            </section>
                        </form> 
                    </div>  
                </section>
         
