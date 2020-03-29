<?php

require_once ('helper/Delete.php');

$id ['idAluno']=  $_POST['idAluno'];
$tabela = 'alunos';

$excluir = new Delete();
$excluir -> executeDelete($tabela,"idAluno =:idAluno",$id);






?>