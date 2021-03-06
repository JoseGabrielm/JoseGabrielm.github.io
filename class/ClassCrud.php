<?php
include("{$_SERVER['DOCUMENT_ROOT']}/class/ClassConexao.php");

class ClassCrud extends ClassConexao{

    private $Crud;
    private $Contador;

    private function preparedStatements($Query , $Parametros)
    {

        $this->countParametros($Parametros);
        $this->Crud=$this->conectaDB()->prepare($Query);
        
        if($this->Contador > 0){
            for($I=1; $I <= $this->Contador; $I++){
                $this->Crud->bindValue($I,$Parametros[$I-1]);
            }
        }

        $this->Crud->execute();



    }

    private function countParametros($Parametros){

        $this->Contador=count($Parametros);

    }
    public function insertDB($Tabela , $Colunas ,$Values , $Parametros){
        $this->preparedStatements("INSERT INTO {$Tabela} ({$Colunas}) VALUES ({$Values})", $Parametros);
        return $this->Crud;
    }

    public function selectDB($Campos , $Tabela , $Condicao , $Parametros){
        $this->preparedStatements("SELECT {$Campos} FROM {$Tabela} {$Condicao}", $Parametros);
        return $this->Crud;
    }

    public function deleteDB($Tabela , $Condicao , $Parametros){
        $this->preparedStatements("DELETE FROM {$Tabela} WHERE {$Condicao}" , $Parametros);
        return $this->Crud;
    }

    public function updateDB($Tabela ,  $Set ,  $Condicao , $Parametros){
        $this->preparedStatements("UPDATE {$Tabela} SET {$Set} WHERE {$Condicao}", $Parametros);
        return $this->Crud;
    }

    public function searchDB($Campos , $Tabela , $Condicao, $Sort , $Parametros){
    $this->preparedStatements("SELECT {$Campos} FROM {$Tabela} {$Condicao} {$Sort}" , $Parametros);
            return $this->Crud;
    }

}
