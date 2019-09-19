<?php

class Conexao extends PDO{

	private $pdo;

	public function __construct(){
		
		try{
			parent::__construct("mysql:dbname=bd_npo_test;host=localhost; charset=utf8", "root", "root");

			$this->pdo = new PDO("mysql:dbname=bd_npo_test;host=localhost; charset=utf8", "root", "root");
			//$this->pdo->exec("SET CHARACTER SET utf8");

			return $this->pdo;

		}catch(PDOException $e){
			echo "ERRO ".$e->getMessage();
			exit;
		}	
	}
}

#var_dump(new Conexao);