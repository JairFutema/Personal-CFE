<?php
$usuario_correcto = "Jair";
$palabra_secreta_correcta = "2312";
$usuario = $_POST["usuario"];
$palabra_secreta = $_POST["palabra_secreta"];

if ($usuario === $usuario_correcto && $palabra_secreta === $palabra_secreta_correcta) {
 
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: index.html"); #<--Aqui debe de ir el archivo que se va a mostrar en caso de que la contraseña este bien#
 
} else {
    echo "El usuario o la contraseña son incorrectos";
}
