<?php 
session_start();
require "database/querybuilder.php";
require "Components/Auth.php";
$auth = new Auth(new QueryBuilder);

$auth->logout();

header("Location: /");
exit;
