<?php 
    require_once("conecta.php");
    require_once("alertas.php");

    //Função para carregar/chamar minhas classes da pasta class/
    function carregaClasse($nomeDaClasse){
        require_once("class/".$nomeDaClasse.".php");
    }

    //Função nativa que registra a minha função acima, e a roda, chamando todas as classes.
    //Com a minha função, e essa nativa, não há necessidade de ficar chamando minhas classes em outros arquivos, já que está sendo carregadas no cabeçalho.
    spl_autoload_register("carregaClasse");

    $categoria = new Categoria();
    $categoria->setId(1);

    $doacao = new Doacao("", "", "", "Disponível", "0000-00-00", 1, $categoria, 1); //Passo os meu parâmetros vazios, são obrigatórios, segundo o que definimos na classe Produto, porém posso passar um valor vazio. Menos categoria, pois preciso trazer a listagem.

    $categoriaDao = new CategoriaDao($conexao);
    $categorias = $categoriaDao->listaCategorias();
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Responsivo -->

    <!-- Título-->
    <title>Meu Desapego</title>

    <!-- Fonte externa-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Referência arquivo.css-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="titulo">Registre uma doação</h2>
                </div>
                <div class="card-body">
                    <form action="controllers/adiciona-doacao.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Título</div>                                                           <!-- Defini a classe dos títulos dos campos como "name" para facilitar e padronizar a personalização através do css -->
                            <div class="value">
                                <input class="input-style" type="text" name="titulo" placeholder="O que você vai doar?">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Descrição da doação</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea-style" name="descricao" placeholder="Descrição do item à ser doado. Por exemplo: Cor, estado de conservação, etc."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Categoria</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="idcategoria" class="form-control">
                                        <?php 
                                            foreach ($categorias as $categoria):
                                                $essaEhACategoria = $doacao->getCategoria()->getId() == $categoria->getId(); //Verifico se os ids batem
                                                $selecao = $essaEhACategoria ? "selected='select'" : ""; //Se a condição acima for verdadeira, então ele atribui esse valor a minha option
                                         ?>
                                        <option value="<?= $categoria->getId()?>" <?= $selecao; ?>>
                                            <?= $categoria->getNome() ?>
                                        </option>
                                        <?php 
                                            endforeach;
                                         ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Foto</div>
                            <div class="value">
                                <input class="" type="file" name="foto" id="foto">
                                <div class="label--desc">Selecione fotos nas extensões JPEG ou PNG. Tamanho máximo 1MB</div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Doar!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
