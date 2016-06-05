<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Lista de Agendas </h2>
                    <div class="containerItensSolicitacao">

                        <!--<a href="<?php echo base_url() ?>agenda/"> Inserir Agenda </a><br/> <br /> -->

                        <div class="cabecalhoListaSolicitacoes">
                            <span class="nomePaciente">Medico</span>
                            <span class="horarioSugerido">Data Emissão</span>
                            <span class="saldo">Telefone</span>
                        </div>

                        <div class="containerItensSolicitacao">
                            <?php
                            foreach ($query as $k) {
                                ?>
                                <div class="itemSolicitacao">
                                    <?php
                                    //echo' <span class="nomePaciente">'.($k->nome).'</span>';
                                    echo' <span class="nomePaciente">' . $k->nome_medico . '</span>';
                                    echo'<span class="horarioSugerido">' . date('d/m/Y', strtotime($k->data_emissao)) . "<br/>" . '</span>';
                                    echo '<span class="saldo">' . ($k->telefone . "<br/>");
                                    ?>			
                                    <a href="<?php echo base_url() . "solicitacao/solicitarConsulta/" . $k->id ?>"> Solicitar Consulta </a>
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

