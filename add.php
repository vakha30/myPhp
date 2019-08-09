<?php

require "database/querybuilder.php";

$db = new QueryBuilder();

$data = $_POST;

$db->add("posts", $data);

header("Location: /");
exit;
