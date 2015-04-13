<?php
  // iniciamos session
  session_start();
  
  // archivos necesarios
  require_once 'includes/config.php';
  require_once 'includes/conexion.php';
  require_once 'includes/esUsuario.php';
    
  // obtengo puntero de conexion con la db
  $dbConn = conectar();
  
  // verificamos que no este conectado el usuario
  if(!empty($_SESSION['usuario']) && !empty($_SESSION['password'])){
    $arrUsuario = esUsuario($_SESSION['usuario'], $_SESSION['password'], $dbConn);
    header('Location: index.php');
    die;
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include("inc/inc_head.php"); ?>
    <title><?php echo $admin_name ?> · Login</title>
  </head>
  <body class="loginbg">
    <?php 
      if(isset($_GET['error'])){
        echo '<p class="infobubbles_center text-danger bg-danger"><span><i class="fa fa-times"></i></span> '. $_GET['error'] .'</p>';
      }
      if(isset($_GET['successmsg'])){
        echo '<p class="infobubbles_center text-success bg-success"><span><i class="fa fa-times"></i></span> '. $_GET['successmsg'] .'</p>';
      }
    ?>
    <div class="container">
      <div class="col-md-4 col-md-offset-4 loginbox">
        <div class="row">
          <img src="skin/img/adminlogo.png" alt=""/>
        </div>
        <div class="row">
          <form class="form-signin" method="post" action="login.check.php">
            <input id="admin_user_email" name="admin_user_email" type="text" class="form-control" placeholder="E-Mail" required autofocus>
            <input style="margin-top:10px;" id="admin_user_password" name="admin_user_password" type="password" class="form-control" placeholder="Password" required>
            <button style="margin-top:10px;" class="btn btn-lg btn-black btn-block" type="submit">login</>
          </form>
        </div>
        <div class="row">
          <hr>
        </div>
        <div class="row">
          <p>NUEVEDIEZ Admin (v2.1) © 2014. All rights reserved. </p>
        </div>
        <div class="row">
          <p>For help, updates, ideas or bugs report: <a href="mailto:support@nuevediez.com.ar">support@nuevediez.com.ar</a></p>
        </div>
      </div>
    </div>
  </body>
</html>