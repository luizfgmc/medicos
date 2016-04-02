
<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1719839291584651',
      xfbml      : true,
      version    : 'v2.5'
    });

    FB.login(function(){
  // Note: The call will only work if you accept the permission request
  FB.api('/me/feed', 'post', {message: 'Hello, world!'});
}, {scope: 'publish_actions'});

        
    FB.ui({
        // 'method: 'feed',
        //link: 'http://www.mauro-facebook.com.br',
        //caption: 'An example caption',
    }, function(response){});

        FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        console.log('Logged in.');
      }
      else {
        FB.login();
      }
});


  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function checkLoginState()
{
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            // usuario logado no facebook e com o app aceito
 
        } else if (response.status === 'not_authorized') {
            // Usuario logado no facebook, mas nao aceitou o App
        } else {
            // Usuario nao logado no facebook
        }
    });
}

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
                            <div class="fb-like"
                              data-share="true"
                              data-width="450"
                              data-show-faces="true">
                            </div>

                            <fb:login-button
                                 scope="email,publish_actions" onlogin="checkLoginState();">
                            </fb:login-button>

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