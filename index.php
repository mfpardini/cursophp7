<?php

require_once("config.php");

$user = new Usuario();

$user->loadById(2);

echo $user;

?>