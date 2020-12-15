<?php
namespace Migrate;

use Table\Table;

/**
 * The main migration class that will create migrations etc
 */
class Migration
{

    /**
     * @var All of the Table objects ready to be migrated.
     */
    private $tables = [];

    /**
     * Run the loaded migrations
     */
    public function run()
    {
        // TODO
    }

    public function addTable(Table $table) : void
    {
        array_push($this->tables, $table);
    }
}
