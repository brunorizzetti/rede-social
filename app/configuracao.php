<?php
/*
 * Arquivo de configuração
 */

 const DB = [
     'HOST' => 'localhost',
     'USUARIO' => 'userdb',
     'SENHA' => 'passdb',
     'BANCO' => 'database',
     'PORTA' => '3306'
 ];

// __FILE__  — Constante Mágica. Retorna o caminho completo e o nome do arquivo
// dirname — Retorna o caminho/path do diretório pai

//define e const — Define uma constante. As constantes não podem ser alteradas depois de declaradas.
define('APP', dirname(__FILE__));

define('URL','http://localhost/projetos/rede-social');

define('APP_NOME','Curso de PHP7 Orientado a Objetos e MVC');

const APP_VERSAO = '1.0.0';
