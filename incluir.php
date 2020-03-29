


<?php
// if(!defined('URL')){
//    header("Location: formulario.html");
//    exit();
// }

require_once ('helper/Create.php');

$tabela = 'alunos';
$Dados['nome'] = $_POST['nome'];
$Dados['turmaId'] = $_POST['turma'];

$inclusao = new Create();
$inclusao -> exeCreate($tabela,$Dados);   



?>