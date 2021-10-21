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
                    <form action="controllers/adiciona-doacao.php" method="post">
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
                                    <textarea class="textarea-style" name="descricao" placeholder="testeDescrição do item à ser doado. Por exemplo: Cor, estado de conservação, etc."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Categoria</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="idcategoria" class="form-control">
                                        <option value="1">Móveis</option>
                                        <option value="2">Eletromésticos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Foto</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input-file" type="foto" name="foto" id="foto">
                                    <label class="label--file" for="foto">Selecione a foto</label>
                                    <span class="input-file__info">Sem arquivos selecionados</span>
                                </div>
                                <div class="label--desc">Selecione fotos nas extensões JPEG ou PNG. Tamanho máximo 50Mb</div>
                            </div>
                        </div>
                        

                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Doar!</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
