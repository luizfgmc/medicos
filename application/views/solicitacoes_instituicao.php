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
                        <span class="saldo">Status</span>
                    </div>
                    <div class="containerItensSolicitacao">
                        <?php
                        foreach ($query as $k) {
                            ?>		
                            <div class="itemSolicitacao">
                                <?php
                                //echo($k->solicitante . "<br/>");
                                echo '<span class="nomePaciente">' . ($k->nome_paciente) . '</span>';
                                echo '<span class="horarioSugerido">' . date('d/m/Y', strtotime($k->data_emissao)) . '</br>';
                                echo date('d/m/Y', strtotime($k->data_agendamento)) . '</br>';
                                $x = ($k->retorno == 'R') ? '[Retorno]': '';
								echo($k->hora_agendamento) . '</br>' . $x . '</span>';
                                
                                //echo($k->data_emissao . "<br/>");
                                //echo($k->descricao . "<br/>");
                                //echo($k->status . "<br/>");
                                //echo($k->id);
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

                                ?>
                                     
                                </span>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

