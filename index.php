<?php
require "vendor/autoload.php";

use Migrate\ColumnType\ColumnType;
use Migrate\Table\Table;

$users = new ColumnType("Users", "varchar", 255);
$posts = new ColumnType("Posts", "varchar", 500);

echo $users;
echo $posts;

$table = new Table('users');

$table->addColumn($users);
$table->addColumn($posts);


