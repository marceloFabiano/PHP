<?php

require_once ('Conexao.php');

class Update extends Conexao 
{
    private $Tabela;
    private $Dados;
    private $Termos;
    private $Conn;
    private $Query;
    

    public function executeUpdate($Tabela,$Dados, $Termos)
    {        
        //atribuição dos parâmetros recebidos aos atributos da classe
         $this->Tabela = (string) $Tabela;
         $this->Dados =  $Dados;   
         $this->Termos = (string) $Termos;
  
         //cria a Query
         $this->getIntrucao();

         //Executa as instruções
         $this->executarInstrucao();
    }

    private function getIntrucao()
    {  
        foreach ($this->Dados as $key => $Value) {
            $Values[] = $key . '=:' . $key;        
        }
         $Values = implode(', ', $Values);       
         $this->Query = "UPDATE {$this->Tabela} SET {$Values} {$this->Termos}";         
    }

    private function executarInstrucao()
    {
        try {
            
            //abre conexão com o banco
            $this-> conexao();
            //prepara a Query
            $stmt = $this->Conn->prepare($this->Query);
           //Executa passando como paâmetro os dados recebidos
            $stmt -> execute($this->Dados);
            $this->Resultado = true;

        } catch (Exception $ex) {

            $this->Resultado = false;
        }
       
    }

    private function conexao()
    {
        $this->Conn = parent::getConn();
    }
 
    function getResultado()
    {
        return $this->Resultado;
    }
}
  

?>