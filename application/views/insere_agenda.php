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
                        <p>
                            Clínica <br />
                            <strong class="number">
                                01
                            </strong>	
                        </p>
                    </div>
                    <div class="infoClinica">
                        <p>
                            <strong>Clínica / Consultorio:</strong> Particular <br />
                            Endereço: Rua Juíz de fora , 683 - Barro Preto
                        </p>
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

                    <div class="containerItemsDias">
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Segunda-Feira</label>
                        </div>	
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Terça-Feira</label>
                        </div>
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Quarta-Feira</label>
                        </div>		
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Quinta-Feira</label>
                        </div>		
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Sexta-Feira</label>
                        </div>
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Sábado</label>
                        </div>	
                        <div class="itemFormHorario">
                            <input type="radio" name="dia_agenda" />
                            <label>Domingo</label>
                        </div>
                    </div>		

                    <div class="containerQuantidadeHorario">
                        <div class="container_item_form">

                            <div class="container_tiny_item">
                                <label>Quantidade: </label>
                                <input type="text" />
                            </div>	
                            <div class="container_tiny_item">
                                <label>Saldo: </label>
                                <input type="text" />
                            </div>	
                            <div class="container_tiny_item">
                                <label>Hora Início: </label>
                                <select>
                                    <option>Selecione</option>
                                </select>
                            </div>	
                            <div class="container_tiny_item">
                                <label>Hora Fim: </label>
                                <select>
                                    <option>Selecione</option>
                                </select>
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

            </div>	
        </div>
    </section>
</section>
