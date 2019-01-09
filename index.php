<?php

require_once("config.php");

//$user = new Usuario();
//$user->loadById(2);
//echo $user;

//carrega lista de usuarios
//$usuario = Usuario::getList();
//echo json_encode($usuario);

//procura logins
//$search = Usuario::search('jo');
//echo json_encode($search);

//procura login e senha iguais
$usuario = new Usuario();
$usuario->login('joao','1234567');
echo $usuario;

?>