<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Estilizando Formulários</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
  </head>
  <body>
    <header>
      <div style="margin-top: 0.3%">
        <!-- Menu de Acessibilidade -->
        <?php 
          require_once("menu-acessibilidade.php");
        ?>
        <!-- Fim menu de acessibilidade -->
      </div>
    </header>
    <div id="container" style="padding-top: 2%">
      <img src="images/perfil.png">

      <form action="controllers/login-controller.php" method="post">
        <div>
          <input type="email" class="email" name="email" id="email" placeholder="Digite seu e-mail">
        </div>
        <div>
          <input type="password" class="senha" name="senha" id="senha" placeholder="Digite sua senha">
        </div>
        <div>
          <input type="submit" class="submit" value="Logar">
        </div>

        <div>
          <a href="cad_doador.html">Ainda não tenho cadastro!</a>
        </div>
      </form>
    </div>
    
    <!-- Início VLibras -->
      <?php 
        require_once("vlibras.php");
      ?>
    <!-- Fim VLibras -->
  </body>
</html>