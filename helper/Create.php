<?php

require_once ('Conexao.php');

class Create extends Conexao 
{

    private $Tabela;
    private $Dados;
    private $Query;
    private $Conn;

    public function exeCreate($Tabela, array $DadosRecebidos)
    {
        
        //recebe a informação com o nome da tabela e dos dados
        $this->Tabela = (string) $Tabela;
        $this->Dados = $DadosRecebidos;

        // //cria a instrução chmando o métod GET
        $this->getIntrucao();

        //executa a instrução
         $this->executarInstrucao();

    }

    private function getIntrucao()
    {
       //extrai, através dos índices do Array, os nomes das colunas da tabela.
       //importante: os índices do array precisam estar de acordo com os nomes das tabelas
        $colunas = implode(', ', array_keys($this->Dados));
            
        //criar os links do select para obedecer o padrão PDO concatenando com os ':' 
        $valores = ':' . implode(',:', array_keys($this->Dados));
        
        //cria a String com a query e atribui à variável global
        $this->Query = "INSERT INTO {$this->Tabela} ({$colunas}) VALUES ({$valores})";
        var_dump($this->Query);
    }

    private function executarInstrucao()
    {
        try {
              $this-> conexao();         
              if( !$this->Query->execute($this->Dados)){
                echo " <h1> OPS! Algo saiu errado e não foi possível inserir o registro </h1>";
              }     
            } catch (Exception $ex) {      
              
            }   
    }

    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }
}

?>