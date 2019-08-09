<?php

require "database/querybuilder.php";

$db = new QueryBuilder();

$id = $_GET['id'];
$data = [
    'id' => $_GET['id'],
    'title' => $_POST['title'],
    'text' => $_POST['text'],
];

$db->update("posts", $data);

header("Location: /");
exit;
