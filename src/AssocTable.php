<?php
class AssocTable extends ArrayIterator {
    /**
     * @var array
     */
    protected $assocArray;

    /**
     * @param array $assocArray
     */
    public function __construct(array $assocArray)
    {
        if (empty($assocArray)) {
            throw new InvalidArgumentException('$assocArray must be an associative array and not empty');
        }

        $filter = array_filter($assocArray);
        if (empty($filter)) {
            throw new InvalidArgumentException('$assocArray must be an associative array and not empty');
        }


        $this->assocArray = $assocArray;
        parent::__construct($assocArray);
    }

    /**
     * Get length of the longest string in a column
     *
     * @param string $columnName
     * @return int
     */
    public function getColMaxSize($columnName)
    {
        $max = strlen($columnName);

        foreach ($this->assocArray as $row) {
            if (($rLength = strlen($row[$columnName])) > $max) {
                $max = $rLength;
            }
        }

        return $max;
    }

    /**
     * Get column names
     *
     * @return array
     */
    public function getColsNames()
    {
        $this->rewind();

        return array_keys($this->current());
    }
}