<?php
require __DIR__ . '/../source/php.php';
ClassName("Errors, conexão e execução");

/*
 * Para controle de erros
 */
ClassSession("controle de erros", __LINE__);

/*
 * Class para manipulação do banco de dados.
 */
ClassSession("php data object", __LINE__);

/*
 * Objeto PDO único.
 */
ClassSession("conexão com singleton", __LINE__);
