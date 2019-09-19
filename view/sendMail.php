<?php

#if(isset($_POST['nome']) && !empty($_POST['nome'])){

	#$nome = addslashes($_POST['nome']);
	#$email = addslashes($_POST['email']);
	#$msg = addslashes($_POST['msg']);
	
	$nome = 'Alisson C';
	$email = 'alisson@alstwo.com.br';
	$msg = addslashes($_POST['msg']);
	$dc = 'FCA';

	$para = "alissoncavalcanticma@gmail.com";
	$assunto = "Acesso ao DC ".$dc;
	$cabecalho = "From: alisson@alstwo.com.br"."\r\n".
				"Reply-To: ".$email."\r\n".
				"X-Mailer: PHP/".phpversion();
	// To send HTML mail, the Content-type header must be set
	$cabecalho .= 'MIME-Version: 1.0' . "\r\n";
	$cabecalho .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	#$corpo = "Nome: ".$nome." - E-mail: ".$email." - Mensagem: ".$msg;
	$corpo = "Prezado Davi, segue acesso ao DC ".$dc.'

	<table>
	<tr>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Assunto</th>	
	</tr>
	<tr>
		<td>'.$nome.'</td>
		<td>'.$email.'</td>
		<td>Teste de acesso ao DC</td>
	</tr>
</table>';

	mail($para, $assunto, $corpo, $cabecalho);
	echo "<h2>E-mail enviado com sucesso!</h2>";
	exit;
#}

?>
<table>
	<tr>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Assunto</th>	
	</tr>
	<tr>
		<td>$nome</td>
		<td>$email</td>
		<td>Teste de acesso ao DC</td>
	</tr>
	
</table>


?>