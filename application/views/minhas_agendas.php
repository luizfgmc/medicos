<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Minhas Agendas </h2>
                    <div class="cabecalhoListaSolicitacoes">
                        <span class="nomePaciente">Clinica</span>
						<span class="horarioSugerido">Data Emissão</br>Dia Atendimento</span>
                        <span class="saldo">Saldo / Quantidade</span>
                    </div>
                    <div class="containerItensSolicitacao">
                        
                            <?php
                            foreach ($query as $k) {
                                ?>
                        
<div class="itemSolicitacao">
    <?php
                                echo'<span class="nomePaciente">' . ($k->nome) .'</span>';
                                //echo($k->nome_medico . "<br/>");
                                echo '<span class="horarioSugerido">'. date('d/m/Y', strtotime($k->data_emissao)) . "</br>" . $k->dia_semana . "</span>";
								echo '<span class="saldo">' . $k->saldo . "/" . $k->quantidade . ' </span>';
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

