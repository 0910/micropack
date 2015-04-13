<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = "Contacto desde la web de Micropack";
$message .= "Nombre: " . $_POST['name'] . "\n\r";
$message .= "E-mail: " . $_POST['email'] . "\n\r";
$message .= "Cargo: " . $_POST['cargo'] . "\n\r";
$message .= "Teléfono: " . $_POST['phone'] . "\n\r";
$message .= "Empresa: " . $_POST['empresa'] . "\n\r";
$message .= "Tipo de Consulta: " . $_POST['consulta'] . "\n\r";
$message .= "Mensaje: " . $_POST['message'];

mail("ventas@micropack.com", $subject, $message, "From: ".$email);
header('Location:contacto.php');
?>