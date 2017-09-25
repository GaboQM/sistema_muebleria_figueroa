<?php

/**
* 
*/
class conexion 
{
    public $SERVER='127.0.0.1';
    public $DATABASE='bdmfigueroa';
    public $USER='root';
    public $PASSWORD='1234';
    
    public function get_conexion(){
               try {
                 $conexion = new PDO("mysql:host=$this->SERVER;dbname=$this->DATABASE", $this->USER      , $this->PASSWORD, array('charset' => 'utf8'));
                 

        } catch (PDOException $e) {
            echo 'no se puede conectar';
            echo '<br>' . $e;
            exit;
        }
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->query('SET CHARACTER SET utf8');

        return $conexion;


    }
}
?>