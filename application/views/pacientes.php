    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
    <section class="mainContent">
        <section class="containerSolicitacoes">
            <div class="containerCenter fullSiteSize">
                <div class="halfSize">
                    <div class="containerListaSolicitacoes">
                        <h2>Lista de Pacientes </h2>
                        <!-- <a href="<?php echo base_url() ?>paciente/"> Inserir Paciente </a> -->
                        <div class="containerItensSolicitacao">
                            <div class="cabecalhoListaSolicitacoes">
                                <span class="nomePacienteLista">Paciente</span>
                                <span class="enderecoLista">Endereço</span>
                                <span class="telefoneLista">Telefone</span>
                            </div>
                            <?php
                            foreach ($query as $k) {
                                ?>
                                <div class="itemSolicitacao">
                                    <?php
                                    //echo($k->cpf . "<br/>" );
                                    echo '<span class="nomePacienteLista">'.($k->nome_paciente . "<br/>").'</span>';
                                    echo '<span class="enderecoLista">'.($k->endereco." ");
                                    echo ', ' . ($k->end_numero . " ");
                                    echo '- ' .($k->complemento . " ") . "<br/>" ;
                                    echo ($k->bairro ).  "<br/>";
                                    echo ($k->cidade . " ");
                                    echo "- " . ($k->uf . "<br/>");
                                    echo (mascara_string("#####-###",$k->cep) . "<br/>")  . '</span>';
                                    echo '<span class="telefoneLista"> ' .(mascara_string("##-####-####",$k->telefone) . "<br/>");
                                    ?>
                                    <a href="<?php echo base_url() . "paciente/editarPaciente/" . $k->id ?>"> editar </a>
                                    <a href="<?php echo base_url() . "paciente/deletarPaciente/" . $k->id ?>"> excluir </a>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>