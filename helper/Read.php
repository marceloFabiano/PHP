<?php

require_once  ('Conexao.php');

class Read extends Conexao
{

    private $Select;
    private $Values;
    private $Resultado;
    private $Query;
    private $Conn;
    private $Item;


    public function exeRead($Tabela, $Termos = null, $ParseString = null)
    {     
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->exeInstrucao();
        return $this->Resultado;
    }

    public function buscaComTermos($Query,$item, $ParseString = null)
    {
        $this -> Item = (string) $item;
        $this->Select = (string) $Query;
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }  
        $this->exeInstrucaoItem();
    }

    public function buscaDisciplina($Query,$item, $ParseString = null)
    {
        $this -> Item = (string) $item;
        $this->Select = (string) $Query;
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }  
        $this->exeInstrucaoDisciplina();
    }

    private function exeInstrucao()
    {
        $this->conexao();
        try {
            $this->getIntrucao();
            $this->Query->execute();
            $this->Resultado = $this->Query->fetchAll();     
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }
    private function exeInstrucaoItem()
    {
        $this->conexao();
        try {
            $this->getIntrucao();
            $this->Query->execute();
            $this->Resultado = $this->Query->fetch();     
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }

    private function exeInstrucaoDisciplina()
    {
        $this->conexao();
        try {
            $this->getIntrucaoDisciplina();
            $this->Query->execute();
            $this->Resultado = $this->Query->fetchAll();     
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }

    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Select);
        $this->Query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getIntrucao()
    {
        $this->Query->bindValue(':email',$this->Item);
    }

    
    private function getIntrucaoDisciplina()
    {
        $this->Query->bindValue(':disciplina',$this->Item);
    }

}
