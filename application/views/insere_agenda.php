<html>
    <head></head>
    <body>
        <section class="formCadastroAgendas">
            <form method="post" action="<?php echo base_url() ?>Agenda/insereAgenda/">
                
                <div class="itemFormCadastroAgendas">
                    <label>Quantidade De Consultas</label>
                    <div class="campoCadastroAgenda">
                        <input type="text" name="quantidadeAgenda" />
                    </div>
                </div>
              
                <div class="itemFormCadastroAgendas">
                    <label>Clinica</label>
                    <div class="campoCadastroAgenda">
                        <select name="clinicas">
                            <option >Selecione</option>
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