<?php
namespace Migrate;

use Migrate\Table\Table;
use Migrate\ColumnType\ColumnType;

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
        // TODO This is just a test.
        foreach($this->tables as $table)
        {
            $sql = "CREATE TABLE $table->name (";

            foreach($table->getColumns() as $column)
            {
                $sql .= $this->genType($column);
            }

            $sql .= " )";

            dump($sql);

            $sql = "";
        }
    }

    /**
     * Generate the SQL string for a specific ColumnType.
     *
     * @param ColumnType $column The ColumnType to stringify.
     *
     * @return string The string result
     */
    private function genType($column) : string
    {
        $str = "";
        $str .= $column->getName() . " ";
        $str .= $column->getType() . "(";
        $str .= $column->getSize();
        $str .= ") ";

        $str .= $this->genTypeOptions($column, $str);

        return $str;
    }

    /**
     * Generate the SQL string for a specific the type options
     * defined on the current Column Type.
     *
     * @param ColumnType $column The ColumnType to stringify.
     *
     * @return string The string result
     */
    private function genTypeOptions(ColumnType $column, string $sqlString)
    {
        static $counter = 0;
        $options = $column->getTypeOptions();
        $optionsSize = count($options);

        if(empty($options)) return;

        foreach($options as $option)
        {
            $sqlString .= $option . " ";
            $counter++;

            if($counter >= $optionsSize)
            {
                $sqlString .= "," ;
            }
        }

        $counter = 0;

        return $sqlString;

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
