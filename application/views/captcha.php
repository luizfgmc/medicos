<!DOCTYPE HTML>
	
	<html>	

		<head> 

		</head>

		<body>

			<form action="<?php echo base_url();?>acesso/validarCaptcha" method="post">
                <?php echo($image) ."<br/>" ?>	
                <label> Digite as letras acima</label><br/>
                <input type="text" name='captcha' id='captcha'/>
                <input type='submit' value='enviar'/><br/>
           </form>

		</body>



	</html>			


			