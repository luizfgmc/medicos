<!--
<section class="formCadastroAgendas">
    <form method="post" action="<?php echo base_url() ?>Agenda/insereAgenda/">

        <div class="itemFormCadastroAgendas">
            <label>Quantidade De Consultas</label>
            <div class="campoCadastroAgenda">
                <input type="text" name="quantidadeAgenda" />
            </div>
        </div>

       

        <div class="itemFormCadastroAgendas">
            <div class="campoCadastroAgenda">
                <input type="submit"  value="confirmar" />
            </div>
        </div>	
    </form>
</section>

-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/disponibilidade_agenda/disponibildiade_agenda.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />


<section class="mainContent">

    <section class="disponibilidadeAgenda">
        <div class="containerCenter fullSiteSize">

            <div class="halfSize">
                <h2>Disponibilidade / Agendas </h2>
                <section class="headerClinica">
                    <div class="numberClinica">
                      
                    </div>
                    <div class="infoClinica">

                    </div>
                    <div class="iconsClinica">
                        <div class="iconPlus">
                            +
                        </div>
                        <div class="iconPlus">
                            >
                        </div>
                        <div class="iconPlus">
                            -
                        </div>
                    </div>

                </section>
                <section class="horariosOferecidos">
                    <p class="titleHorarioOfeceridos">Horários oferecidos:</p>

                <form action="<?php echo base_url();?>agenda/insereAgenda" method="post">
                           
                        <label>Clinica</label>
                        <div class="campoCadastroAgenda">
                            <select name="clinicas">
                                <option >Selecione</option>
                                    <?php
                                    foreach ($clinica as $c):
                                        ?>
                                            <option value="<?= $c->id ?>"><?= $c->nome ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                            </select>
                        </div> 

                        <div class="containerItemsDias">
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Segunda-Feira" />
                                <label>Segunda-Feira</label>
                            </div>	
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Terça-Feira" />
                                <label>Terça-Feira</label>
                            </div>
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Quarta-Feira" />
                                <label>Quarta-Feira</label>
                            </div>		
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Quinta-Feira" />
                                <label>Quinta-Feira</label>
                            </div>		
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Sexta-Feira" />
                                <label>Sexta-Feira</label>
                            </div>
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Sábado" />
                                <label>Sábado</label>
                            </div>	
                            <div class="itemFormHorario">
                                <input type="radio" name="dia_agenda" value="Domingo" />
                                <label>Domingo</label>
                            </div>
                        </div>		

                        <div class="containerQuantidadeHorario">
                            <div class="container_item_form">

                                <div class="container_tiny_item">
                                    <label>Quantidade: </label>
                                    <input type="text" name="quantidadeAgenda" />
                                </div>	
                                <div class="container_tiny_item">
                                    <label>Saldo: </label>
                                    <input type="text" name="saldoAgenda" />
                                </div>	
                                																			
                            </div>
                        </div>	
                        <div class="form_horarios">
                            <div class="itemFormHorario">
                                <div class="container_submit">
                                    <input type="submit" class="input_submit" />
                                    <button type="button" class="input_cancel">Cancelar</button>
                                </div>

                            </div>	
                      </div>
                 </form>       

            </div>	
        </div>
    </section>
</section>
