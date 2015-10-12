<html>
    <head></head>
    <body>

        <section class="formCadastroAgendas">
            <form method="post" action="<?php echo base_url() ?>Agenda/editarSalvarAgenda/<?=$query[0]->id ?>">
                
                <div class="itemFormCadastroAgendas">
                    <label>Quantidade De Consultas</label>
                    <div class="campoCadastroAgenda">
                        <input type="text" name="quantidadeAgenda" value="<?=$query[0]->quantidade ?>" />
                    </div>
                </div>
              
                <div class="itemFormCadastroAgendas">
                    <label>Clinica</label>
                    <div class="campoCadastroAgenda">
                        <select name="clinicas">
                            <option ><?=$query[0]->nome ?></option>
                           
                            <?php 

                                foreach($clinica as $c):
                            ?>
                            <option value="<?=$c->id ?>"><?=$c->nome ?></option>
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
    </body>
</html>