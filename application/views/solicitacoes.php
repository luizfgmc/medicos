<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Solicitações pedentes </h2>
                    <div class="infoMedicoLogado">
                       
                    </div>
                    <div class="cabecalhoListaSolicitacoes">
                        <span class="nomePaciente">Paciente</span>
                        <span class="horarioSugerido">Horário Sugerido</span>
                        <span class="saldo">Ações</span>
                    </div>
                    <div class="containerItensSolicitacao">
                        <?php
                        foreach ($query as $k) {
                            ?>		
                            <div class="itemSolicitacao">
                                <?php

                                //if($k->status == 'PE'){
                                //echo($k->solicitante . "<br/>");
                                echo '<span class="nomePaciente">' . ($k->nome_paciente) . '</span>';
                                echo '<span class="horarioSugerido">' . date('d/m/Y', strtotime($k->data_emissao));
                                echo($k->data_agendamento) . '</span>';
                                //echo($k->hora_agendamento)';
                                //echo($k->status . "<br/>");
                                //echo($k->data_emissao . "<br/>");
                                //echo($k->descricao . "<br/>");
                                //echo($k->status . "<br/>");
                                //echo($k->id);
                                ?>
                                <span class="saldo">
                                    
                               <?php if($k->status=='AP')
                                {
                                    echo 'Aprovado';
									
								?>
                                     <a href="<?php echo base_url() . "medico/pacienteCompareceu/" . $k->id ?>"> Compareceu </a>
                                     <a href="<?php echo base_url() . "medico/pacienteNaoCompareceu/" . $k->id ?>"> Não Compareceu </a>
								 <?php
								}
                                elseif($k->status=='RJ')
                                {

                                    echo 'Rejeitado';

                                }
								elseif($k->status=='CO')
                                {

                                    echo 'Atendido';

                                }
								elseif($k->status=='NC')
                                {

                                    echo 'Não Compareceu';

                                }
                                elseif($k->status=='PE')
                                {
                                ?>

                                  
                                     <a href="<?php echo base_url() . "medico/aprovarSolicitacao/" . $k->id ?>"> aprovar </a>
                                     
                                     <a href="<?php echo base_url() . "medico/reprovarSolicitacao/" . $k->id ?>"> reprovar </a>
                                     <?php
                                        }
                                     ?>
                                </span>
                            </div>
                            <?php
                            //}
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

