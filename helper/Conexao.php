<?php

class Conexao {
    
   private static $Connect = null; 
    
   private static function Conectar() {
        try {
          
          if( self::$Connect == null){
            self::$Connect = new PDO ("mysql:host=localhost;dbname=conselho","root","");
          }
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            die;
        }       
        return self::$Connect;
    }
    
    public function getConn() {
        
         return  self::Conectar();
    }
    
}

?>