<?php 

  require_once ('helper/Update.php');

        $tabela = 'alunos';
        
        $Dados = $_POST;


        $update = new Update();
        $update -> executeUpdate( $tabela,$Dados,"WHERE idAluno =:idAluno");


?>