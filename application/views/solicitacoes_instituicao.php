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
                                echo '<span class="nomePaciente">' . ($k->nome_paciente) . '</span>';
                                echo '<span class="horarioSugerido">' . (empty($k->data_agendamento) ? "Pendente" : date('d/m/Y', strtotime($k->data_agendamento))) . '</br>';
                                echo ($k->hora_agendamento). '</span>';
                                ?>
                                <span class="saldo">
                               <?php if($k->status=='AP')
                                {
                                    echo 'Aprovado';
                                    ?>
                                    <a href="<?php echo base_url() . "instituicao/reprovarSolicitacao/" . $k->id ?>"> Reprovar </a>
                                    <a href="<?php echo base_url() . "feedback/inserir_feedback/" . $k->id ?>"> Feedback </a>
                                    <?php
                                }
                                elseif($k->status=='RJ')
                                {
                                    echo 'Rejeitado';
                                }
                                elseif($k->status=='PE')
                                {
                                    echo 'Pendente';
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