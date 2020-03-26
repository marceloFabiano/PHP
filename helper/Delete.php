<?php

    require_once ('Conexao.php');

    class Delete extends Conexao
    {
            private $id;
            private $Tabela;
            private $Query;
            private $Conn;
            private $Termos;
            private $Values;
   

                public function exeDelete($Tabela, $id, $Termos=null, $ParseString = null)
                {
                    $this->Tabela = (string) $Tabela;
                    $this->id = $id;
                    $this-> $Termos =(string) $Termos;
                    parse_str($ParseString, $this->Values);
                    $this->getIntrucao();
                    $this->executarInstrucao();
                }

                private function getIntrucao()
                {
                    $this -> Values = 'id= :id';
                    $this->Query = "DELETE FROM {$this->Tabela} WHERE {$this->Values}";
                    echo "Query  : ". $this-> Query;
                }

                private function executarInstrucao()
                {
                        $this->conexao();

                    try { 

                        $this-> Query-> bindParam(':id', $this->id);                      
                        $this-> Query->execute();

                    } catch (Exception $ex) {
                        echo "Não foi possível inserir a questão";
                    }

                }

                private function conexao()
                {
                    $this->Conn = parent::getConn();
                    $this->Query = $this->Conn->prepare($this->Query);
                }
    }

?>