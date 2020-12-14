<?php
namespace Migrate\Table;

use Migrate\ColumnType\ColumnType;

final class Table
{
    /**
     * @var string The name of the table.
     */
    public ?string $name = NULL;

    /**
     * @var string The name of the table.
     */
    private $columns = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addColumn(ColumnType $column)
    {
        $this->columns[] = $column;
    }

    public function getColumns()
    {
        return $this->columns;
    }
}
