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
     * @var string The name of the table that acts as the foreign key for this column.
     */
    protected ?string $foreign_key = NULL;

    /**
     * @var array Options like AUTO_INCREMENT etc that apply to this column of the table.
     */
    protected $typeOptions;

    
    public function __construct(string $name, 
                                string $type, 
                                int $size = 255, 
                                $typeOptions = [],
                                string $foreign_key = NULL
                                )
    {
        $this->name = strtolower($name);
        $this->type = strtoupper($type);
        $this->size = $size;
        $this->typeOptions = $typeOptions;
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
     * Getter for the type options property.
     * @return array
     */
    public function getTypeOptions() : array
    {
        return $this->typeOptions;
    }

    /**
     * Getter for the foreign key property.
     * @return string
     */
    public function getForeignKey() : string
    {
        return $this->foreign_key;
    }

    public function __toString()
    {
        $str = get_class() . " | ";

        foreach(get_object_vars($this) as $key => $value)
        {
            // If the current property is an array ignore it.
            if(is_array($value)) break;

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
