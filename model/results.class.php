<?php

class Results{

    public $pdo;

    public function __construct($pdo){
        $this->pdo = new $pdo;
		$this->pdo->exec('SET NAMES utf8');
    }

    public function qtdAcessos($dc){
        
    }
}




?>