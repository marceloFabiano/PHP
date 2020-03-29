<?php

if(!defined('URL')){
    header("Location: ../formulario.html");
    exit();
 }
    require_once ('Conexao.php');

    class Delete extends Conexao
    {
            private $id;
            private $Tabela;
            private $Termos;
            private $Query;
            private $PDO;
   

                public function executeDelete($Tabela,$Termos,$id)
                {                   
                  //atribuição dos parâmetros recebidos aos atributos da classe
                   $this->Tabela = (string) $Tabela;
                   $this->Termos = $Termos;
                   $this->id = (array) $id;

                   //cria Query
                   $this->getIntrucao();              
                   $this->executarInstrucao();
                }

                private function getIntrucao()
                {
                    $this->Query = "DELETE FROM {$this->Tabela} WHERE {$this->Termos}";                
                }

                private function executarInstrucao()
                {
                     try {                      
                        $this->conexao();                       
                         $stmt = $this->PDO->prepare($this->Query);
                         $stmt -> execute($this->id);             
  
                    } catch (Exception $ex) {
                        echo "Não foi possível inserir a questão";
                    }

                }
                private function conexao()
                {
                    $this->PDO = parent::getConn();
                }
    }
