<?php

require "database/querybuilder.php";

$db = new QueryBuilder();

$id = $_GET['id'];

$db->delete("posts", $id);

header("Location: /");
exit;
