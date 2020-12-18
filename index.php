<?php
require "vendor/autoload.php";

use Migrate\ColumnType\ColumnType;
use Migrate\Table\Table;
use Migrate\Migration;

$usersTable = new Table('users');
$usersTable->addColumn(new ColumnType('id', 'integer', 100, ['AUTO_INCREMENT', 'NOT NULL', 'PRIMARY KEY']));
$usersTable->addColumn(new ColumnType('username', 'varchar', 100, ['NOT NULL']));
$usersTable->addColumn(new ColumnType('email', 'varchar', 500));
$usersTable->addColumn(new ColumnType('password', 'varchar', 25));

$postsTable = new Table('posts');
$postsTable->addColumn(new ColumnType('title', 'varchar', 100));
$postsTable->addColumn(new ColumnType('content', 'varchar', 500));
$postsTable->addColumn(new ColumnType('posted_on', 'date'));

$m = new Migration();
$m->addTable($usersTable);
$m->addTable($postsTable);

dump($m);
dump($m->getTables());

$m->run();


