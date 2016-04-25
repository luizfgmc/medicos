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
                        $cont = 0;
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
                                }
                                elseif($k->status=='RJ')
                                {

                                    echo 'Rejeitado';

                                }

                                    if(($k->status!='AP')&&($k->status!='RJ'))
                                {
                                ?>

                                     <a href="<?php echo base_url() . "medico/aprovarSolicitacao/" . $k->id . "/" . $k->agenda_id ?>"> aprovar </a>
                                     
                                     <a href="<?php echo base_url() . "medico/reprovarSolicitacao/" . $k->id ."/".$k->agenda_id ?>"> reprovar </a>
                                     <?php
                                        }
                                    if (empty($k->observacao) and $k->status == 'AP' or $k->status == 'RJ') {
                                         ?>  
                                        <a href="#" id="enviarObservacao" valor="<?=$k->id?>" value="<?=$k->id?>"> comentário da consulta </a>

                                        <input type="hidden"  id="idSolicitacao"<?=$cont?> value="<?=$k->id?>">

                                        <?php
                                        } else{
                                            echo "<br/> Consulta Fechada";
                                        }  

                                     ?>
                                </span>
                            </div>
                            <?php
                            //}
                            $cont++;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</section>

<script src="<?php echo base_url() ?>assets/js/observacaoConsulta.js" type="text/javascript" charset="utf-8" async defer></script>

</section>

