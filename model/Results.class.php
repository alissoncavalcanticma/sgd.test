<?php

/*Teste*/

//require '../autoload.php';

//$pdo = new Conexao();

/*Teste*/

class Results{

    public $pdo;

    public function __construct($pdo){

		$this->pdo = $pdo;
		$this->pdo->exec('SET NAMES utf8');

	}

    public function qtdAcessos($d){
        $dc = $d;
        $sql = "SELECT COUNT(*) FROM acessos WHERE dc = :dc";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":dc", $dc);
        $sql->execute();
		//$qtd = (int)$sql->execute();
        
        if($sql->rowCount() > 0){
            
            foreach($sql->fetch() as $qtd){
                return $qtd;
            }
        }else{
            $qtd = 0;
        }

        return $qtd;
        //return 300;
    }
}


//echo "oi";


//$totalCount = new Results($pdo);
//echo $qtdfca = $totalCount->qtdAcessos("fca");
//echo "<br>";
//echo $qtdsp = $totalCount->qtdAcessos("sp");
//echo "<br>";
//echo $qtdsp = $totalCount->qtdAcessos("tr");

?>