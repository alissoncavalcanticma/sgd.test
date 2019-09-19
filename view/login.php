<?php
session_start();

require '../autoload.php';

if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
      if(isset($_POST['senha']) && !empty($_POST['senha'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $userController = new UsuarioController();
        $retorno = $userController->logar($usuario, $senha);
        //var_dump($retorno);die;
  }
}
?>

<link href="../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet">
<script src="../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="../assets/vendor/jquery.3.2.jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../assets/images/npo-sistemi.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="">
      <input type="text" id="login" class="fadeIn second" name="usuario" placeholder="login" autofocus>
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>