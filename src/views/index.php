<?php include "header.php";?>

  <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }
    </style>
  <body>
    <script src="static/js/jquery.js"></script>

    <form method="post" id="login" action="/">
      <img id="logo-cliente" class="w3-margin-top" src="static/imagens/logo_cliente.jpg"/>
      <?php if($invalidForm){echo"<p style='color:red'>$invalidForm </p>";} ?>
      <input name="user" class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário">
      <input name="pass" class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha">
      <input name="submit" type="submit" value="Logar" class="w3-button w3-theme w3-margin-top w3-block"></input>
      
      <a href="http://www.santri.com.br">
        <img id="logo-santri" class="w3-right w3-margin-top" src="static/imagens/logo_santri.svg"/>
      </a>
    </form>


  </body>
</html>