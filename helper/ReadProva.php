<?php

require_once  ('Conexao.php');


class ReadProva extends Conexao
{
    private $Conn;
    
    function buscarQuestoes($disciplina){

    $this -> Conn = parent::getConn();
    $Query = $this -> Conn -> prepare("SELECT * FROM questoes WHERE disciplina =:disciplina");
    $Query -> bindValue(":disciplina",$disciplina);
    $Query -> execute();
    
    return $resultado = $Query -> fetchAll(PDO::FETCH_OBJ);
  
   } 
}
