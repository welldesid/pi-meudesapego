<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Estilizando Formulários</title>

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
  </head>
  <body>

    <div id="container">
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
    

  </body>
</html>