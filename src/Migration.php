<?php
namespace Migrate;

use Migrate\Table\Table;

/**
 * The main migration class that will create migrations etc.
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
        // Generae SQL syntax form the Table and ColumnType classes,
        // then run that SQL as a query.
    }

    /**
     * Generate the SQL string for a specific ColumnType.
     *
     * @param ColumnType $column The ColumnType to stringify.
     *
     * @return string The string result
     */
    public function genType($column) : string
    {
        // TODO The counter logic is horrible and needs to be changed.
        static $counter = 0;
        $str = "";
        $str .= $column->getName() . " ";
        $str .= $column->getType() . "(";
        $str .= $column->getSize();

        if($counter >= count($this->tables) + 1)
        {
            $str .= ")";
        }else {

            $str .= ")";
            foreach($column->getTypeOptions() as $option)
            {
                $str .= $option . " ";
            }

            $str .= ",";
        }

        $counter++;

        return $str;
    }

    public function addTable(Table $table) : void
    {
        array_push($this->tables, $table);
    }

    /**
     * Getter for the Tables array.
     *
     * @return array The list of Tables.
     */
    public function getTables() : array
    {
        return $this->tables;
    }

}
