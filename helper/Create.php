<?php

require_once ('Conexao.php');

class Create extends Conexao {

    private $Tabela;
    private $Dados;
    private $Query;
    private $Conn;

    public function exeCreate($Tabela, array $Dados)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        $this->getIntrucao();
        $this->executarInstrucao();
    }

    private function getIntrucao()
    {
        $colunas = implode(', ', array_keys($this->Dados));
        $valores = ':' . implode(', :', array_keys($this->Dados));
        $this->Query = "INSERT INTO {$this->Tabela} ({$colunas}) VALUES ({$valores})";
        echo ($this->Query);
    }

    private function executarInstrucao()
    {
        $this->conexao();

        try {
              $this->Query->execute($this->Dados);

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