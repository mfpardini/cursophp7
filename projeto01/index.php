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
//$usuario = new Usuario();
//$usuario->login('jorge','fsda56fsd');
//echo $usuario;

//insere um aluno no banco de dados
//$aluno = new Usuario("teste20", 'senhapadrao20');
//$aluno->setLogin('henri');
//$aluno->setSenha('senhaaluno');
//$aluno->insert();
//echo $aluno;


//update de um usuário
//$usuario = new Usuario();
//$usuario->loadById(6);
//$usuario->update('paulo', 'romanos');
//echo $usuario;

//delete de usuarios da tabela
$user = new Usuario();
$user->loadById(19);
$user->delete();
echo $user;


?>