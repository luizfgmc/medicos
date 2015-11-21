<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Minhas Agendas </h2>
                    <div class="infoMedicoLogado">
                        <p>Dr. Fábio CAPELO - PEDIATRIA</p>
                        <p> Clinica / Consultorio Particular</p>
                        <p>Endereço: Rua Juíz  de fora, 683 - Barro Preto</p>
                    </div>
                    <div class="cabecalhoListaSolicitacoes">
                        <span class="nomePaciente">Clinica</span>
                        <span class="horarioSugerido">Data Emissão</span>
                        <span class="saldo">Saldo</span>
                    </div>
                    <a href="<?php echo base_url() ?>agenda/"> Inserir Agenda </a>
                    <div class="containerItensSolicitacao">
                        
                            <?php
                            foreach ($query as $k) {
                                ?>
                        
<div class="itemSolicitacao">
    <?php
                                echo'<span class="nomePaciente">' . ($k->nome).'</span>';
                                //echo($k->nome_medico . "<br/>");
                                //echo($k->descricao . "<br/>");
                                echo '<span class="horarioSugerido">'.($k->data_emissao)."</span>";
                                  echo '<span class="saldo">' .($k->saldo . "<br/>");
                                echo($k->quantidade).' </span>';
                                //echo($k->crm . "<br/>");
                                
                                //echo($k->telefone . "<br/>");
                                //echo("id clinica" . $k->clinica_id . "<br/>");
                                //echo("nome clinica:" . " " . $k->nome . "<br/>");
                                //echo("telefone clinica:" . " " . $k->telefone . "<br/>");
                                //echo("endereco clinica:" . " " . $k->endereco . "<br/>");
                                //echo($k->end_numero . "<br/>");
                               // echo("solicitar" . $k->medico_id . "<br/>");
                                ?>			
                                
                                <!--<a href="<?php echo base_url() . "agenda/editarAgenda/" . $k->id ?>"> editar </a>-->
                                <!--<a href="<?php echo base_url() . "agenda/deletarAgenda/" . $k->id ?>"> excluir </a>-->

                                <?php
                                echo(" </div>");
                            }
                            ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

