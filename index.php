<?php
require "vendor/autoload.php";

use Migrate\ColumnType\ColumnType;
use Migrate\Table\Table;
use Migrate\Migration;

$user_id = new ColumnType("id", "int", );
$username = new ColumnType("username", "varchar", 255);
$email = new ColumnType("email", "varchar", 255);
$password = new ColumnType("password", "varchar", 255);

dump($username);
dump($email);

$usersTable = new Table('users');
$usersTable->addColumn($username);
$usersTable->addColumn($email);
$usersTable->addColumn($password);

$postsTable = new Table('posts');
$postsTable->addColumn(new ColumnType('title', 'varchar', 100));
$postsTable->addColumn(new ColumnType('content', 'varchar', 500));
$postsTable->addColumn(new ColumnType('posted_on', 'date'));

dump($usersTable);
dump($postsTable);


$m = new Migration();
$m->addTable($usersTable);
$m->addTable($postsTable);

dump($m);


$str .= ($m->genType($user_id));
$str .= ($m->genType($username));
$str .= ($m->genType($email));
$str .= ($m->genType($password));

$sql = "create table $postsTable->name (" . $str .")";

dump($sql);
