<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1719839291584651',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

</script>
  
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/medico/medico.css" />
<?php echo validation_errors(); ?>
<section class="mainContent">
    <section class="cadastro_medico">
        <div class="containerCenter fullSiteSize">
            <form action="<?php echo base_url() ?>medico/aprovarSolicitacaoSalvar" method="post" id="formAprovaSolicitacao">
                <div class="halfSize">
                    <div class="container_form_medico">
                        <h2>Aprovar Solicitação</h2>
                        <div class="form_cadastro_medico">

                            <div class="form_cadastro_medico">
                                <div class="container_item_form">
                                    <label> data da consulta: </label>
                                    <input type="text" class="default_text_input required" id="data_agendamento" name="data_agendamento" />
                                </div>
                                <div class="container_item_form">
                                    <label> hora da consulta: </label>
                                    <input type="text"  class="default_text_input required" id="hora_agendamento" name="hora_agendamento" />
                                </div>
                                <input type="hidden" name ="id" value="<?= $query[0]->id ?>"/>
                                <input type="hidden" name ="idAgenda" value="<?= $query[0]->agenda_id ?>"/>

                            </div>
                            <div class="container_submit">
                                <input type="submit" class="input_submit" tabIndex ="14" value="Aprovar" />
                                <a href="<?php echo base_url() ?>medico/solicitacoes/" class="input_cancel">Cancelar</a>
                            </div>

                            <br/>
                          
                            

                            <!-- Your share button code -->
                            <div class="fb-share-button" 
                              data-href="https://www.google.com.br" 
                              data-layout="button_count">
                            </div>

                        </div>

                    </div>
                </div>
            </form>
    </section>
</section>
<script>
$(document).on('submit', '#formAprovaSolicitacao', function(e) {
    verifica_campos('#formAprovaSolicitacao', e);
});
</script>