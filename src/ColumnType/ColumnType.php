<?php
namespace Migrate\ColumnType;

class ColumnType
{
    /**
     * @var string The name of the column as it would appear inside the database.
     */
    protected ?string $name = NULL;

    /**
     * @var string The type of the column e.g: VARCHAR, INTEGER etc.
     */
    protected ?string $type = NULL;

    /**
     * @var string The maximum size for the column.
     */
    protected ?int $size = NULL;

    /**
     * @var string Whether the id of this column should auto-increment.
     */
    protected bool $auto_increment = false;

    /**
     * @var string Whether this column is the primary key or not.
     */
    protected bool $primary_key = false;

    /**
     * @var string The name of the table that acts as the foreign key for this column.
     */
    protected ?string $foreign_key = NULL;

    
    public function __construct(string $name, 
                                string $type, 
                                int $size = 255, 
                                bool $auto_increment = false,
                                bool $primary_key = false,
                                string $foreign_key = NULL
                                )
    {
        $this->name = strtolower($name);
        $this->type = strtolower($type);
        $this->size = $size;
        $this->primary_key = $primary_key;
        $this->foreign_key = $foreign_key;
    }

    /**
     * Getter for the name property.
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Getter for the type property.
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * Getter for the size property.
     * @return int
     */
    public function getSize() : int
    {
        return $this->size;
    }

    /**
     * Getter for the primary key property.
     * @return bool
     */
    public function getPrimaryKey() : bool
    {
        return $this->primary_key;
    }

    /**
     * Getter for the foreign key property.
     * @return string
     */
    public function getForeignKey() : string
    {
        return $this->foreign_key;
    }

    /**
     * Getter for the auto increment property.
     * @return bool
     */
    public function getAutoIncrement() : bool
    {
        return $this->auto_increment;
    }

    public function __toString()
    {
        $str = get_class() . " | ";

        foreach(get_object_vars($this) as $key => $value)
        {
            // Convert the bool value to a string
            if($key == 'primary_key') $value = $value ? 'true' : 'false';

            // Convert the foreign key property to a string if NULL
            if($key == 'foreign_key') $value = $value ? $value : "NULL";

            // Convert the foreign key property to a string if NULL
            if($key == 'auto_increment') $value = $value ? $value : "false";

            $str .= ucfirst($key) . ": " . ucfirst($value) . " | ";
        }

        return $str .= "<br/>";
    }


}
