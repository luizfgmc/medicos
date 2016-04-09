<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Solicitações pedentes </h2>
                    <div class="infoMedicoLogado">
                       <?php
                       if ($this->session->userdata('mensagemSolicitacao')) {
                           echo '<div class="erroSolicitacao">Horário já foi reservado</div>';
                           $this->session->unset_userdata('mensagemSolicitacao');
                       }
                       ?>
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
                                echo '<span class="nomePaciente">' . ($k->nome_paciente) . '</span>';
                                echo '<span class="horarioSugerido">' . date('d/m/Y', strtotime($k->data_agendamento));
                                echo ' '.($k->hora_agendamento) . '</span>';
                                ?>
                                <span class="saldo">
                                    

                               <?php if($k->status=='AP')
                                {
                                    echo 'Aprovado';
                                }
                                elseif($k->status=='RJ')
                                {

                                    echo 'Rejeitado';

                                }
                                    if(($k->status!='AP')&&($k->status!='RJ'))
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

